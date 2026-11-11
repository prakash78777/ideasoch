<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessApiController extends Controller
{
    // GET ALL BUSINESS IDEAS
    public function index(Request $request)
    {
        $query = Business::query()
            ->where('status', 1);

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // CATEGORY FILTER
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // PAGINATION
        $businesses = $query
            ->latest()
            ->paginate(20);

        // IMAGE URL
        $businesses->getCollection()->transform(
            function ($business) {

$business->image_url = $business->image
    ? url(Storage::url($business->image))
    : null;

                return $business;
            }
        );

        // JSON RESPONSE
        return response()->json([
            'success' => true,
            'message' => 'Business Ideas fetched successfully',
            'data' => $businesses
        ]);
    }

    // GET BUSINESS IMAGE
    public function image($id)
    {
        $business = Business::findOrFail($id);

        if (!$business->image) {
            abort(404, 'Business image not found in database');
        }

        $disk = Storage::disk('public');

        if (!$disk->exists($business->image)) {
            abort(404, 'Business image file not found');
        }

        $path = $disk->path($business->image);

        $mimeType = mime_content_type($path);

        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
