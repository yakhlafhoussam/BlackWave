<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.banned', [
            'user' => $request->user(),
        ]);
    }
}