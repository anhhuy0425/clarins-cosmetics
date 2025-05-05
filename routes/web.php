<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/About', [AuthController::class, 'about'])->name('about');
Route::get('/Shop', [AuthController::class, 'shop'])->name('shop');
Route::get('/Product-Cart', [AuthController::class, 'product_cart'])->name('product_cart');
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
Route::get('/Faq', [AuthController::class, 'Faq'])->name('Faq');
Route::get('/Account_Login', [AuthController::class, 'Account_Login'])->name('Account_Login');
