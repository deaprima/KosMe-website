<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('boardingHouse')
            ->latest()
            ->get();

        return view('components.testimonial', compact('testimonials'));
    }
}
