<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\AdminController;
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
Route::match(['get', 'post'], '/track-order', [ProductController::class, 'trackOrder'])->name('order.track');

Route::get('/product/{id}', [ProductController::class, 'product_details'])->name('product_details');
Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');

Route::post('/wishlist', [WishlistController::class, 'toggleWishlist']);
Route::get('/wishlistShow', [WishlistController::class, 'wishlistShow']);

Route::post('/cart/add/{id}', [CartsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartsController::class, 'showCart']);
Route::delete('/cart/remove/{productId}', [CartsController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartsController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/apply-voucher', [PayController::class, 'applyVoucher'])->name('cart.applyVoucher');
Route::post('/place-order', [PayController::class, 'placeOrder'])->name('place.order');





Route::get('/ProductAdmin', [AdminController::class, 'ProductAdmin'])->name('ProductAdmin');
Route::get('/CategoryAdmin', [AdminController::class, 'CategoryAdmin'])->name('CategoryAdmin');
Route::get('/VoucherAdmin', [AdminController::class, 'VoucherAdmin'])->name('VoucherAdmin');
Route::get('/UserAdmin', [AdminController::class, 'UserAdmin'])->name('UserAdmin');

Route::post('/product/create', [AdminController::class, 'addProduct'])->name('addProduct');
Route::post('/category/create', [AdminController::class, 'addCategory'])->name('addCategory');
Route::post('/voucher/create', [AdminController::class, 'addVoucher'])->name('addVoucher');

Route::put('/product/{id}/edit', [AdminController::class, 'editProduct'])->name('editProduct');
Route::put('/voucher/{id}/edit', [AdminController::class, 'editVoucher'])->name('editVoucher');
Route::put('/category/{id}/edit', [AdminController::class, 'editCategory'])->name('editCategory');


Route::delete('/voucher/{id}', [AdminController::class, 'destroyVoucher'])->name('destroyVoucher');
Route::delete('/product/{id}', [AdminController::class, 'destroyProduct'])->name('destroyProduct');
Route::delete('/category/{id}', [AdminController::class, 'destroyCategory'])->name('destroyCategory');
