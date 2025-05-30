<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $boardingHouses = BoardingHouse::with(['categories', 'rooms'])
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact('boardingHouses'));
    }
}
