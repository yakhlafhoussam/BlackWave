<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $service = Service::with(['user', 'category'])
            ->latest();

        return view('pages.service', compact('service', 'user'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function ddos()
    {
        $user = User::where('id', Auth::id())->first();

        return view('services.ddos', compact('user'));
    }

    public function password()
    {
        $user = User::where('id', Auth::id())->first();

        return view('services.password', compact('user'));
    }
}