<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $products = Marketplace::with(['user', 'category'])->get();

        return view('pages.marketplace', compact('products', 'user'));
    }

    public function create()
    {
        return view('shop.create');
    }
}
