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
            if (Auth::check()) {
                $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
            } else {
                $sessionCart = session()->get('cart', []);
                $cartItems = collect();

                foreach ($sessionCart as $item) {
                    $cartItems->push((object)[
                        'product' => (object)[
                        'name' => $item['name'] ?? 'Sản phẩm',
                        'price' => $item['price'] ?? 0,
                        'image' => $item['image'] ?? null,
                        ],
                        'quantity' => $item['quantity'] ?? 1,
                    ]);
                }
            }
            $view->with('products', Product::paginate(9));
            $view->with('cartItems', $cartItems);
        });
    }
}
