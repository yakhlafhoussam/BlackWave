<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::with('posts', 'services', 'receivedRatings')->where('id', Auth::id())->first();

        return view('pages.home', compact('user'));
    }
}
