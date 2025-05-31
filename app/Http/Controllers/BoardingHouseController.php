<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Category;
use App\Models\City;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardingHouseController extends Controller
{
    public function index()
    {
        $boardingHouses = BoardingHouse::with(['categories', 'rooms'])
            ->latest()
            ->paginate(9);

        return view('pages.boarding-houses.index', compact('boardingHouses'));
    }

    public function detail(BoardingHouse $boardingHouse)
    {
        $boardingHouse->load(['categories', 'rooms.images', 'bonuses', 'testimonials']);

        return view('pages.boarding-houses.detail', compact('boardingHouse'));
    }

    public function search(Request $request)
    {
        // Get all categories
        $categories = Category::all();

        // Get all cities
        $cities = City::all();

        $query = BoardingHouse::query();

        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        if ($request->filled('type')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->type);
            });
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('address', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $boardingHouses = $query->with(['categories', 'rooms', 'city'])
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('pages.search', compact('boardingHouses', 'categories', 'cities'));
    }

    public function payment(BoardingHouse $boardingHouse, Room $room)
    {
        if (!$room->is_available) {
            return redirect()->back()->with('error', 'Kamar tidak tersedia');
        }

        // Ensure the room belongs to the boarding house (optional but good practice)
        if ($room->boarding_house_id !== $boardingHouse->id) {
            abort(404); // Or redirect with an error
        }

        return view('pages.boarding-houses.payment', compact('boardingHouse', 'room'));
    }

    public function processPayment(Request $request, BoardingHouse $boardingHouse, Room $room)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'duration' => 'required|integer|min:1',
            'payment_method' => 'required|in:full_payment,down_payment',
        ]);

        // Calculate total amount
        $totalAmount = $room->price_per_month * $request->duration;

        // If down payment, calculate 50% of total amount
        if ($request->payment_method === 'down_payment') {
            $totalAmount = $totalAmount * 0.5;
        }

        // Generate transaction code
        $code = 'KOSME' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

        // Create transaction record
        $transaction = Transaction::create([
            'code' => $code,
            'boarding_house_id' => $room->boarding_house_id,
            'room_id' => $room->id,
            'user_id' => auth()->id(),
            'payment_method' => $request->payment_method,
            'payment_status' => null, // Will be set by Midtrans
            'start_date' => $request->start_date,
            'duration' => $request->duration,
            'total_amount' => $totalAmount,
            'transaction_date' => now(),
        ]);

        // TODO: Integrate with Midtrans
        // For now, just redirect to a success page
        return redirect()->route('booking.success', $transaction);
    }

    public function success(Transaction $transaction)
    {
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        return view('pages.boarding-houses.success', compact('transaction'));
    }
}
