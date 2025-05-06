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
    public function showRegisterForm()
    {
        return view('account_login');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),

        ]);
        Auth::login($user);
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }



    public function showLoginForm()
    {
        return view('account_login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(auth()->user()->is_admin == true)
                return redirect('/admin')->with('success', 'Đăng nhập thành công!');
            else
                return redirect('/home')->with('success', 'Đăng nhập thành công!');
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->withInput();
    }

}
