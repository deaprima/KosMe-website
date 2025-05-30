<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;

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
}
