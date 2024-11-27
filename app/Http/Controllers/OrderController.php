<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function create()
    {
        $cart = Auth::check() ? Auth::user()->cart()->firstOrCreate([]) : Cart::firstOrCreate([]);
        $cartItems = $cart->cartItems;
        return view('order.create', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'mp3_file' => 'required|file|mimes:mp3|max:10240',
        ]);

        $cart = Auth::check() ? Auth::user()->cart()->firstOrCreate([]) : Cart::firstOrCreate([]);
        $order = Order::create([
            'user_id' => Auth::id() ?? null, // Если аутентификация не используется, user_id будет null
            'description' => $request->description,
            'total_price' => $cart->cartItems->sum(fn($item) => $item->service->price * $item->quantity),
        ]);

        foreach ($cart->cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'service_id' => $cartItem->service_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->service->price,
            ]);
        }

        if ($request->hasFile('mp3_file')) {
            $path = $request->file('mp3_file')->store('orders');
            $order->update(['mp3_file_path' => $path]);
        }

        $cart->cartItems()->delete();

        return redirect()->route('order.success')->with('success', 'Заказ успешно оформлен!');

    }

    public function success()
    {
        return view('order.success');
    }
}

