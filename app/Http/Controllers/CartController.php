<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);
        } else {
            // Для гостей можно использовать сессии
            $sessionId = session()->getId();
            $cart = Cart::firstOrCreate(['session_id' => $sessionId]);
        }

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return back()->with('success', 'Товар добавлен в корзину!');
    }

    public function getCartItems()
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart;
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        if (!$cart) {
            return response()->json(['items' => []]);
        }

        $items = $cart->items()->with('product')->get();

        return response()->json(['items' => $items]);
    }

    public function deleteCartItem($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return response()->json(['message' => 'Товар удален из корзины!']);
    }

    public function updateCartItemQuantity(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $quantity = $request->input('quantity', 1);

        if ($quantity <= 0) {
            return response()->json(['message' => 'Количество должно быть больше 0'], 400);
        }

        $cartItem->update(['quantity' => $quantity]);

        return response()->json(['message' => 'Количество обновлено!', 'new_quantity' => $quantity]);
    }
}