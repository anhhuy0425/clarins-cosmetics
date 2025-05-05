<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted',
        ], [
            'terms.accepted' => 'Bạn phải đồng ý với điều khoản.',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Auth::login($user);
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }



    public function showLoginForm()
    {
        return view('login');
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
                return redirect('/')->with('success', 'Đăng nhập thành công!');
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->withInput();
    }
}
