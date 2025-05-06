<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function shop()
    {
        return view('shop.shop');
    }
    public function product_cart()
    {
        return view('shop.product-cart');
    }
    public function contact()
    {
        return view('contact');
    }
    public function Faq()
    {
        return view('Faq');
    }
    public function Account_Login()
    {
        return view('Account_Login');
    }


}
