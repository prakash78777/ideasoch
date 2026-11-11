<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'id_token' => 'required|string',
        ]);

        $response = Http::get(
            'https://oauth2.googleapis.com/tokeninfo',
            ['id_token' => $request->id_token]
        );

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Google token',
            ], 401);
        }

        $google = $response->json();

        if (
            ($google['aud'] ?? '') !== config('services.google.client_id') ||
            ($google['email_verified'] ?? '') !== 'true' ||
            empty($google['email'])
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Google account verification failed',
            ], 401);
        }

        $user = User::where('email', $google['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $google['name'] ?? Str::before($google['email'], '@'),
                'email' => $google['email'],
                'password' => bcrypt(Str::random(40)),
                'email_verified_at' => now(),
            ]);
        } elseif (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        $token = $user->createToken('ideasoch-google-mobile')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }
}
