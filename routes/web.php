<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/About', [AuthController::class, 'about'])->name('about');
Route::get('/Shop', [AuthController::class, 'shop'])->name('shop');
Route::get('/Product-Cart', [AuthController::class, 'product_cart'])->name('product_cart');
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
Route::get('/Faq', [AuthController::class, 'Faq'])->name('Faq');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
