<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->load([
            'posts' => function ($query) {
                $query->latest();
            },
            'services' => function ($query) {
                $query->latest();
            },
            'receivedRatings.fromUser',
        ]);

        return view('pages.home', compact('user'));
    }
}
