<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Marketplace;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function storeMarketplace(Request $request, Marketplace $product)
    {
        $buyer = Auth::user();
        $seller = $product->user;
        $order = Order::create([
            'buyer_id' => $buyer->id,
            'seller_id' => $seller->id,
            'marketplace_id' => $product->id,
            'service_id' => null,
            'price' => $product->price,
            'status' => 'pending',
        ]);
        // Send automatic chat message to seller
        \App\Models\Message::create([
            'sender_id' => $buyer->id,
            'receiver_id' => $seller->id,
            'content' => 'You have a new order for your product: ' . $product->title . '.',
        ]);
        return redirect()->route('marketplace')->with('success', 'Order placed successfully!');
    }

    public function storeService(Request $request, Service $service)
    {
        $buyer = Auth::user();
        $seller = $service->user;
        $order = Order::create([
            'buyer_id' => $buyer->id,
            'seller_id' => $seller->id,
            'marketplace_id' => null,
            'service_id' => $service->id,
            'price' => $service->price,
            'status' => 'pending',
        ]);
        // Send automatic chat message to seller
        \App\Models\Message::create([
            'sender_id' => $buyer->id,
            'receiver_id' => $seller->id,
            'content' => 'You have a new order for your service: ' . $service->title . '.',
        ]);
        return redirect()->route('service')->with('success', 'Order placed successfully!');
    }
}
