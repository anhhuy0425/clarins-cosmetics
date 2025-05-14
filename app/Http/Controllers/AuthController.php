<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
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
    public function product_checkout()
    {
            if (auth()->check()) {
            $user = auth()->user();
            return view('shop.product-checkout', [
                'user' => $user,
            ]);
        } else {
            return view('shop.product-checkout', [
                'user' => null
            ]);
        }
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
        // dd($request->all());
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
            'password' => Hash::make($request->password)
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

        // ✅ Sau khi đăng nhập, chuyển session cart vào DB
            if (session()->has('cart')) {
                foreach (session('cart') as $productId => $details) {
                    \App\Models\Cart::updateOrCreate(
                        [
                            'user_id' => auth()->id(),
                            'product_id' => $productId
                        ],
                        [
                            'quantity' => $details['quantity']
                        ]
                    );
                }
                session()->forget('cart');
            }

            // ✅ Chuyển trang theo vai trò
            if (auth()->user()->is_admin == true)
                return redirect('/admin')->with('success', 'Đăng nhập thành công!');
            else
                return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Bạn đã đăng xuất.');
    }




}

