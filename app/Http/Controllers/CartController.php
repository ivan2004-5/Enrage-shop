<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $cart = Auth::check() ? Auth::user()->cart()->firstOrCreate([]) : Cart::firstOrCreate([]);
        $cartItems = $cart->cartItems;
        return view('cart', compact('cartItems'));
    }


    public function removeCartItem(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Товар удален из корзины!');
    }
}
