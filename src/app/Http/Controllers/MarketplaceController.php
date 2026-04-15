<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    public function index()
    {
        $products = Marketplace::with(['user', 'category'])->get();
        return view('pages.marketplace', compact('products'));
    }

    public function create()
    {
        return view('marketplace.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_btc' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('marketplace', 'public');

        $product = Marketplace::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'price_btc' => $request->price_btc,
        ]);

        return redirect()->route('marketplace.show', $product);
    }

    public function show(Marketplace $product)
    {
        return view('marketplace.show', compact('product'));
    }

    public function edit(Marketplace $product)
    {
        return view('marketplace.edit', compact('product'));
    }

    public function update(Request $request, Marketplace $product)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_btc' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('marketplace', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price_btc' => $request->price_btc,
        ]);

        return redirect()->route('marketplace.show', $product);
    }

    public function destroy(Marketplace $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('marketplace.index');
    }
}
