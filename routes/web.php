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
