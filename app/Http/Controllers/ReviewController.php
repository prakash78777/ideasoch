<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    // Website par approved reviews dikhaye
    public function index()
    {
        $reviews = Review::where('is_approved', true)
            ->latest()
            ->get();

        return view('reviews', compact('reviews'));
    }

    // Website se review submit kare
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['required', 'string', 'max:2000'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('reviews', 'public');
        }

        Review::create([
            'name' => $validated['name'],
            'city' => $validated['city'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'photo' => $photoPath,
            'is_approved' => false,
        ]);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Thank you! Your review has been submitted and is awaiting admin approval.');
    }


    
}
