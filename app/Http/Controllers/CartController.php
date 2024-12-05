<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);

        // Находим или создаем корзину для пользователя
        $cart = Auth::check() ? Auth::user()->cart()->firstOrCreate([]) : Cart::firstOrCreate([]);

        // Находим или создаем товар в корзине
        $cartItem = $cart->cartItems()->firstOrCreate(['service_id' => $serviceId]);
        $cartItem->quantity++;
        $cartItem->save();

        return redirect()->route('cart')->with('success', 'Товар добавлен в корзину!');
    }

    public function showCart()
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart()->firstOrCreate([]);
            $cartItems = $cart->cartItems;
            return view('cart', compact('cartItems'));
        } else {
            return view('auth.need_auth');
        }
    }

    public function removeCartItem(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Товар удален из корзины!');
    }

    public function add(Request $request, Service $service)
    {
        try {
            $cart = Auth::user()->cart()->firstOrCreate([]);
            $cartItem = $cart->cartItems()->firstOrCreate([
                'service_id' => $service->id,
            ], [
                'quantity' => 1,
            ]);

            if ($cartItem->wasRecentlyCreated) {
                Log::info('Cart item created. Cart ID: ' . $cart->id . ', Service ID: ' . $service->id);
            } else {
                $cartItem->increment('quantity');
                Log::info('Cart item quantity incremented. Cart ID: ' . $cart->id . ', Service ID: ' . $service->id);
            }

            return redirect()->back()->with('success', 'Товар добавлен в корзину!');
        } catch (\Exception $e) {
            Log::error('Error adding item to cart: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Ошибка при добавлении товара в корзину.']);
        }
    }
}