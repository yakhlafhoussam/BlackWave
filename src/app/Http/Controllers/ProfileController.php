<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->load(['posts', 'services', 'receivedRatings.fromUser']);

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = User::find(Auth::id());

        return view('profile.edit', compact('user'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Get the authenticated user directly from the database
        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Store the new image
            $path = $request->file('profile_image')->store('profile-images', 'public');

            // Update user profile image using update method
            $user->update([
                'profile_image' => $path
            ]);
        }
        
        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(storage_path('app/public/' . $user->profile_image))) {
                unlink(storage_path('app/public/' . $user->profile_image));
            }

            $user->profile_image = $request->file('profile_image')->store('profiles', 'public');
        }

        $user->username = $validated['username'];
        $user->gender = $validated['gender'] ?? null;
        $user->save();

        return redirect()->route('profile.show', $user)->with('success', 'Profile updated successfully.');
    }

    public function showCompleteForm()
    {
        $user = Auth::user();

        return view('profile.complete', compact('user'));
    }

    public function storeCompleteForm(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'profile_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(storage_path('app/public/' . $user->profile_image))) {
                unlink(storage_path('app/public/' . $user->profile_image));
            }

            $user->profile_image = $request->file('profile_image')->store('profiles', 'public');
        }

        $user->username = $validated['username'];
        $user->gender = $validated['gender'];
        $user->save();

        return redirect()->route('home')->with('success', 'Profile completed successfully.');
    }
}
