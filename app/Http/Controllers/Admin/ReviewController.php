<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    // All reviews show in admin
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    // Approve review
    public function approve(Review $review): RedirectResponse
    {
        $review->is_approved = true;
        $review->save();

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review approved successfully.');
    }

    // Reject review
    public function reject(Review $review): RedirectResponse
    {
        $review->is_approved = false;
        $review->save();

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review rejected successfully.');
    }

    // Delete review
    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
