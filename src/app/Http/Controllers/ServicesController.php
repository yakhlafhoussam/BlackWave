<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $service = Service::get();

        return view('pages.service', compact('service', 'user'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'price_btc' => ['required', 'numeric', 'min:0.00000001'],
            'delivery_days' => ['required', 'integer', 'min:1', 'max:30'],
            'description' => ['required', 'string', 'min:50'],
        ]);

        $serviceImagePath = null;

        if ($request->hasFile('image')) {
            $serviceImagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'service_image' => $serviceImagePath,
            'price' => $request->price_btc,
            'time' => $request->delivery_days,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('service')
            ->with('success', 'Service created successfully.');
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

    public function show(Service $service)
    {
        return view('services.service', compact('service'));
    }
}
