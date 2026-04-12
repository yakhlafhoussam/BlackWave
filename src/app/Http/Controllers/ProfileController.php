<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = User::find(Auth::id());

        return view('profile.edit', compact('user'));
    }

    public function updateImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'profile_image.required' => 'Please upload an image!',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if ($request->hasFile('profile_image')) {

            // Delete old image
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Store new image
            $path = $request->file('profile_image')->store('profiles', 'public');

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
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
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

    public function deleteImage(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $user->update([
            'profile_image' => false
        ]);

        return redirect()->back()->with('success', 'Profile picture delete successfully!');
    }
}
