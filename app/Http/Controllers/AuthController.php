<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


use Illuminate\Validation\Rules\Password;

use App\Models\SavedIdea;

class AuthController extends Controller
{



public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback(Request $request)
{
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName()
                    ?: $googleUser->getNickname()
                    ?: 'Google User',
                'email' => $googleUser->getEmail(),
                'password' => Str::random(32),
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            // ->route('dashboard')
             ->intended(route('dashboard'))
            ->with('success', 'Google login successful! Welcome to IdeaSoch.');

    } catch (\Exception $e) {

        return redirect()
            ->route('login', ['tab' => 'login'])
            ->with('login_error', 'Google login failed. Please try again.');
    }
}

    /*
    |--------------------------------------------------------------------------
    | Login / Register Page
    |--------------------------------------------------------------------------
    */

    public function showAuth(Request $request)
    {
        $tab = $request->get('tab', 'login');

        return view('auth', compact('tab'));
    }


    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => [
    //             'required',
    //             'email',
    //         ],

    //         'password' => [
    //             'required',
    //             'string',
    //         ],
    //     ], [
    //         'email.required' => 'Email address डालना जरूरी है।',
    //         'email.email' => 'Valid email address डालें।',
    //         'password.required' => 'Password डालना जरूरी है।',
    //     ]);


    //     if (Auth::attempt($credentials, $request->boolean('remember'))) {

    //         $request->session()->regenerate();

    //         return redirect()
    //             ->route('dashboard')
    //             ->with('success', 'Login successful! Welcome back.');
    //     }


    //     return back()
    //         ->withInput($request->only('email', 'remember'))
    //         ->with('login_error', 'Email या password गलत है।');
    // }



    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ], [
        'email.required' => 'Email address डालना जरूरी है।',
        'email.email' => 'Valid email address डालें।',
        'password.required' => 'Password डालना जरूरी है।',
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        return redirect()
            ->intended(route('dashboard'))
            ->with('success', 'Login successful! Welcome back.');
    }

    return back()
        ->withInput($request->only('email', 'remember'))
        ->with('login_error', 'Email या password गलत है।');
}

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ], [
            'name.required' => 'Full Name डालना जरूरी है।',
            'email.required' => 'Email address डालना जरूरी है।',
            'email.email' => 'Valid email address डालें।',
            'email.unique' => 'यह email पहले से registered है।',
            'password.required' => 'Password डालना जरूरी है।',
            'password.min' => 'Password कम से कम 6 characters का होना चाहिए।',
            'password.confirmed' => 'Password और Confirm Password match नहीं कर रहे।',
        ]);


        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),
        ]);


        Auth::login($user);

        $request->session()->regenerate();


        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Account successfully created! Welcome to IdeaSoch.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */


public function dashboard()
{
    $user = Auth::user();

    $savedIdeas = \App\Models\SavedIdea::with('business')
        ->where('user_id', $user->id)
        ->latest()
        ->get();

    $savedIdeasCount = $savedIdeas->count();

    $totalViews = \App\Models\Business::sum('views');

    return view('dashboard', compact(
        'user',
        'savedIdeas',
        'savedIdeasCount',
        'totalViews'
    ));
}





// public function profile()
// {
//     $user = auth()->user();

//     return view('profile', compact('user'));
// }

// public function updateProfile(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'required|string|max:100',
//         'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
//     ]);

//     $user = auth()->user();
//     $user->name = $validated['name'];
//     $user->email = $validated['email'];
//     $user->save();

//     return redirect()
//         ->route('profile')
//         ->with('success', 'Profile updated successfully!');
// }




// Show logged-in user's profile
public function profile()
{
    $user = auth()->user();

    return view('profile', compact('user'));
}

// Update logged-in user's profile
public function updateProfile(Request $request)
{
    $user = auth()->user();

    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($validated);

    return redirect()
        ->route('profile')
        ->with('success', 'Profile updated successfully!');
}









public function settings()
{
    $user = auth()->user();

    return view('settings', compact('user'));
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'password' => [
            'required',
            'confirmed',
            Password::min(8),
        ],
    ]);

    $user = auth()->user();
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()
        ->route('settings')
        ->with('success', 'Password updated successfully!');
}





    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

  public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()
        ->route('login')
        ->with('success', 'You have been logged out successfully.');
}


}