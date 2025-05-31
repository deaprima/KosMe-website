<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('boardingHouse')
            ->latest()
            ->get();

        return view('components.testimonial', compact('testimonials'));
    }

    public function store(Request $request, BoardingHouse $boardingHouse)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimonial = new Testimonial();
        $testimonial->boarding_house_id = $boardingHouse->id;
        $testimonial->name = Auth::user()->name;
        $testimonial->photo = $request->file('photo')->store('testimonials', 'public');
        $testimonial->content = $request->content;
        $testimonial->rating = $request->rating;
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }
}
