<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Service;

class MarketplaceController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->withCount('comments')
            ->latest()
            ->take(8)
            ->get();

        $services = Service::with(['user', 'category'])
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::latest()->get();

        return view('marketplace.index', compact('posts', 'services', 'categories'));
    }
}