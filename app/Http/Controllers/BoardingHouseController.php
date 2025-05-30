<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Category;
use App\Models\City;
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
}
