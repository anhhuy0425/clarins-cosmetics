<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/About', function () {
    return view('about');
});
Route::get('/Shop', function () {
    return view('shop.shop');
});
Route::get('/Product-Cart', function () {
    return view('shop.product-cart');
});
Route::get('/Contact', function () {
    return view('contact');
});
Route::get('/Faq', function () {
    return view('faq');
});
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
