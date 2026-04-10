<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categorie_id' => ['nullable', 'exists:categories,id'],
            'caption' => ['nullable', 'string'],
            'media' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm', 'max:51200'],
        ]);

        $file = $request->file('media');

        $mediaType = str_starts_with($file->getMimeType(), 'image/') ? 'image' : 'video';
        $mediaPath = $file->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'categorie_id' => $validated['categorie_id'] ?? null,
            'caption' => $validated['caption'] ?? null,
            'media_path' => $mediaPath,
            'media_type' => $mediaType,
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'category', 'comments.user']);

        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        if ($post->media_path && file_exists(storage_path('app/public/' . $post->media_path))) {
            unlink(storage_path('app/public/' . $post->media_path));
        }

        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }
}