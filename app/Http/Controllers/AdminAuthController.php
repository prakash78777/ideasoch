<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

  
    
public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    $adminEmail = config('admin.email');
    $adminPassword = config('admin.password');

    if (
        $adminEmail &&
        $adminPassword &&
        strtolower($request->email) === strtolower($adminEmail) &&
        hash_equals($adminPassword, $request->password)
    ) {
        $admin = \App\Models\User::where('is_admin', true)->first();

        if (!$admin) {
            return back()->withErrors([
                'email' => 'Admin user database mein nahi mila.',
            ])->onlyInput('email');
        }

        Auth::login($admin);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid admin email or password.',
    ])->onlyInput('email');
}




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
