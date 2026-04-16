<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
}