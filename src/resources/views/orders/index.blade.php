{{-- resources/views/orders/index.blade.php --}}
@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">My Orders</h1>
    <div class="bg-black/50 border border-white/10 rounded-2xl p-6 mb-4 flex flex-col gap-3">
        @forelse ($orders as $order)
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 p-3 rounded-lg bg-white/5">
                <div>
                    <div class="font-semibold text-white">
                        {{ $order->marketplace ? $order->marketplace->title : $order->service->title }}
                    </div>
                    <div class="text-xs text-gray-400">
                        {{ $order->created_at->format('M d, Y H:i') }}
                        &bull; Status: <span class="font-medium">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-yellow-400 font-bold">₿ {{ $order->price }}</div>
                </div>
            </div>
        @empty
            <div class="text-gray-400 text-center py-8">No orders found.</div>
        @endforelse
    </div>
</div>
@endsection
