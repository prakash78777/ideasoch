<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Business;
use App\Models\SavedIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MobileAuthController extends Controller
{
    // Flutter Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
            ], 401);
        }

        $token = $user->createToken('ideasoch-mobile')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }

    // Flutter Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful.',
        ]);
    }

    // Save Business Idea
    public function saveIdea(Request $request, $id)
    {
        $business = Business::findOrFail($id);

        $saved = SavedIdea::firstOrCreate([
            'user_id' => $request->user()->id,
            'business_id' => $business->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => $saved->wasRecentlyCreated
                ? 'Business idea saved successfully.'
                : 'This idea is already saved.',
            'saved' => true,
        ]);
    }

    // My Saved Ideas
    public function savedIdeas(Request $request)
    {
        $savedIdeas = SavedIdea::with('business')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $savedIdeas->map(function ($saved) {
                $business = $saved->business;

                if (!$business) {
                    return null;
                }

                return [
                    'saved_id' => $saved->id,
                    'business_id' => $business->id,
                    'name' => $business->name,
                    'category' => $business->category,
                    'location' => $business->location,
                    'business_type' => $business->business_type,
                    'investment_min' => $business->investment_min,
                    'investment_max' => $business->investment_max,
                    'profit' => $business->profit,
                    'description' => $business->description,
                    'image' => $business->image,
                    'how_to_start' => $business->how_to_start,
                    'required_things' => $business->required_things,
                    'planning_steps' => $business->planning_steps,
                ];
            })->filter()->values(),
        ]);
    }

    // Remove Saved Idea
    public function removeIdea(Request $request, $id)
    {
        $deleted = SavedIdea::where('user_id', $request->user()->id)
            ->where('business_id', $id)
            ->delete();

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Saved idea not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Saved idea removed successfully.',
        ]);
    }
}
