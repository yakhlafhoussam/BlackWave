<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderPageController extends Controller
{
    public function index()
    {
        $orders = Order::with(['marketplace', 'service'])
            ->where('buyer_id', Auth::id())
            ->orWhere('seller_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();
        return view('orders.index', compact('orders'));
    }
}
