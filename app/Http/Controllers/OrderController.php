<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function create()
    {
        $cart = Auth::user()->cart()->firstOrCreate([]); // Предполагается, что пользователь авторизован
        $cartItems = $cart->cartItems;
        return view('order.create', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            $cart = Auth::user()->cart()->first();
            if (!$cart || $cart->cartItems->isEmpty()) {
                return redirect()->route('cart')->with('error', 'Ваша корзина пуста!');
            }

            $totalPrice = $cart->cartItems->sum(fn ($item) => $item->service->price * $item->quantity);

            $order = Order::create([
                'user_id' => Auth::id(),
                'description' => $request->description,
                'total_price' => $totalPrice,
            ]);

            foreach ($cart->cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'service_id' => $cartItem->service_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->service->price,
                ]);
            }

            $cart->cartItems()->delete();
            return redirect()->route('order.success')->with('success', 'Заказ успешно оформлен!');
        } catch (\Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Ошибка при оформлении заказа. Попробуйте еще раз.']);
        }
    }


    public function success()
    {
        return view('order.success');
    }
    public function history()
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {

            $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        } else {

            $orders = $user->orders()->orderBy('created_at', 'desc')->get();
        }

        return view('history', compact('orders'));
    }
}
