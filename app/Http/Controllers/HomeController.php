<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $boardingHouses = BoardingHouse::with(['categories', 'rooms'])
            ->latest()
            ->take(6)
            ->get();

        $testimonials = Testimonial::with('boardingHouse')
            ->latest()
            ->get();

        return view('pages.home', compact('boardingHouses', 'testimonials'));
    }
}
