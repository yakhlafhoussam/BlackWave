<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('pages.post', compact('posts'));
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => ['required', 'string', 'max:2000'],
            'media' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,mp4,mov,avi', 'max:51200'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $user = User::where('id', Auth::id())->first();

        $file = $request->file('media');

        $mediaType = str_starts_with($file->getMimeType(), 'video') ? 'video' : 'image';

        $path = $file->store('posts', 'public');

        Post::create([
            'user_id' => $user->id,
            'categorie_id' => $request->category_id,
            'caption' => $request->caption,
            'media_path' => $path,
            'media_type' => $mediaType,
        ]);

        return redirect()
            ->route('posts')
            ->with('success', 'Post created successfully!');
    }
}
