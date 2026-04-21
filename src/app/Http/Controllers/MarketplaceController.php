<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    public function destroy(Marketplace $product)
    {
        if (Auth::id() !== $product->user_id) {
            abort(403);
        }
        // Delete image if exists
        if ($product->market_image && Storage::disk('public')->exists($product->market_image)) {
            Storage::disk('public')->delete($product->market_image);
        }
        $product->delete();
        return redirect()->route('marketplace')->with('success', 'Product deleted successfully.');
    }

    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $products = Marketplace::with(['user', 'category'])->get();

        return view('pages.marketplace', compact('products', 'user'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('shop.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'price_btc' => ['required', 'numeric', 'min:0.00000001'],
            'delivery_days' => ['required', 'integer', 'min:1', 'max:30'],
            'description' => ['required', 'string', 'min:50'],
        ]);

        $marketImagePath = null;

        if ($request->hasFile('image')) {
            $marketImagePath = $request->file('image')->store('marketplace', 'public');
        }

        Marketplace::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'market_image' => $marketImagePath,
            'price' => $request->price_btc,
            'time' => $request->delivery_days,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('marketplace')
            ->with('success', 'Product listed successfully.');
    }

    public function show(Marketplace $product)
    {
        return view('shop.product', compact('product'));
    }
}
