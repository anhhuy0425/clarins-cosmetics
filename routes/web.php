<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PayController;
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/About', [AuthController::class, 'about'])->name('about');
Route::get('/Product-Cart', [AuthController::class, 'product_cart'])->name('product_cart');
Route::get('/Product-Checkout', [AuthController::class, 'product_checkout'])->name('product_checkout');
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
Route::get('/Faq', [AuthController::class, 'Faq'])->name('Faq');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/Shop', [ProductController::class, 'index'])->name('shop.index');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product_details');
Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');

Route::post('/wishlist', [WishlistController::class, 'toggleWishlist']);
Route::post('/cart/add/{id}', [CartsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartsController::class, 'showCart']);
Route::delete('/cart/remove/{productId}', [CartsController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartsController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/apply-voucher', [PayController::class, 'applyVoucher'])->name('cart.applyVoucher');
Route::post('/place-order', [PayController::class, 'placeOrder'])->name('place.order');

