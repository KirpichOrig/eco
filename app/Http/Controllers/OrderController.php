<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Получаем текущего пользователя
        $user = Auth::user();

        // Создаем новый заказ
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => session()->get('cart.totalPrice', 0),
            'status' => 'new',
        ]);

        // Получаем товары из корзины
        $cartItems = CartItem::where('cart_id', $user->cart->id)->get();

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->cost,
            ]);
        }

        // Очищаем корзину после оформления заказа
        $user->cart->items()->delete();

        return redirect()->route('profile')->with('success', 'Заказ успешно оформлен!');
    }
}