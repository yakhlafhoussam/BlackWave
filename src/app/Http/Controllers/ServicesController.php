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
        $categories = Category::latest()->get();

        return view('services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Service::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        $service->load(['user', 'category']);

        return view('services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        if ($service->user_id !== Auth::id()) {
            abort(403);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
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