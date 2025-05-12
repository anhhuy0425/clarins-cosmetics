<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $subtotal = 0;
            if (Auth::check()) {
                $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
                $subtotal = $cartItems->sum(function ($item) {
                    return $item->quantity * ($item->product->price ?? 0);
                });
            } else {
                $sessionCart = session()->get('cart', []);
                $cartItems = collect();

                foreach ($sessionCart as $productId => $item) {
                    $cartItems->push((object)[
                        'product' => (object)[
                            'id' => $productId,
                            'name' => $item['name'] ?? 'Sản phẩm',
                            'price' => $item['price'] ?? 0,
                            'image' => $item['image'] ?? null,
                        ],
                        'quantity' => $item['quantity'] ?? 1,
                    ]);
                    $subtotal += $item['quantity'] * ($item['price'] ?? 0);
                }

            }
            $discount = session('discount', 0);
            $totalAfterDiscount = $subtotal - $discount;
            $view->with([
                'products' => Product::paginate(9),
                'cartItems' => $cartItems,
                'subtotal' => $subtotal,
                'discount' => $discount,
                'totalAfterDiscount' => $totalAfterDiscount,
            ]);
        });
    }
}
