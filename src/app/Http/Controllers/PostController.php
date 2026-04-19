<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return back()->with('error', 'You do not have permission to delete this post.');
        }
        $post->delete();
        return back()->with('success', 'Post deleted successfully.');
    }

    public function destroyComment(\App\Models\Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'You do not have permission to delete this comment.');
        }
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);
        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return back();
    }

    public function like(Post $post)
    {
        $user = Auth::user();
        if (!$post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->create(['user_id' => $user->id]);
        }
        return back();
    }

    public function unlike(Post $post)
    {
        $user = Auth::user();
        $post->likes()->where('user_id', $user->id)->delete();
        return back();
    }

    public function index()
    {
        $posts = Post::with(['likes', 'comments.user'])->latest()->get();

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
