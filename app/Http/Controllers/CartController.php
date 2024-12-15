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
        $cart = Auth::user()->cart()->firstOrCreate([]);

        // Запись для каждого добавления товара.
        $cart->cartItems()->create([
            'service_id' => $serviceId,
            'quantity' => 1,
        ]);

        return response()->json(['success' => true, 'message' => 'Товар добавлен в корзину!'], 200);
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
        return response()->json(['success' => true, 'message' => 'Товар удален из корзины!'], 200);
    }
}
