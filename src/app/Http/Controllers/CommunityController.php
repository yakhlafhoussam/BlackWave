<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->withCount('comments')
            ->latest()
            ->paginate(12);

        $categories = Category::latest()->get();

        $users = User::latest()
            ->take(8)
            ->get();

        return view('community.index', compact('posts', 'categories', 'users'));
    }
}