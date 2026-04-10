<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $profileImagePath = null;

        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profiles', 'public');
        }

        $user = User::create([
            'username' => $validated['username'],
            'profile_image' => $profileImagePath,
            'gender' => $validated['gender'] ?? null,
            'points' => 500,
            'email' => $validated['email'] ?? null,
            'is_admin' => false,
            'is_banned' => false,
            'password' => $validated['password'],
            'google_id' => null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Account created successfully.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($validated['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([
            $field => $validated['login'],
            'password' => $validated['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Welcome back.');
        }

        return back()
            ->with([
                'login' => 'Invalid credentials.',
                'error' => 'Invalid credentials.'
            ])
            ->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')->withErrors([
                'error' => 'Google authentication failed. Please try again.',
            ]);
        }

        $user = User::where('google_id', $googleUser->getId())->first();

        if (! $user && $googleUser->getEmail()) {
            $user = User::where('email', $googleUser->getEmail())->first();
        }

        if ($user) {
            if (empty($user->google_id)) {
                $user->google_id = $googleUser->getId();
            }

            if (empty($user->email) && $googleUser->getEmail()) {
                $user->email = $googleUser->getEmail();
            }

            $user->save();
        } else {
            $user = User::create([
                'username' => null,
                'profile_image' => null,
                'gender' => null,
                'points' => 500,
                'email' => $googleUser->getEmail(),
                'is_admin' => false,
                'is_banned' => false,
                'password' => null,
                'google_id' => $googleUser->getId(),
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }
}