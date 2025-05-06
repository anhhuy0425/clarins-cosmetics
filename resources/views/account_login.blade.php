@extends('layouts')
@section('content')
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Account</li>
                                </ol>
                                <h2 class="page-header-title">Account</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-space">
                <div class="container">
                    <div class="row mb-n8">
                        <div class="col-lg-6 mb-8">
                            <div class="my-account-item-wrap">
                                <h3 class="title">Login</h3>
                                <div class="my-account-form">
                                    <form action="#" method="post">
                                        <div class="form-group mb-6">
                                            <label for="login_username">Email Address <sup>*</sup></label>
                                            <input type="email" id="login_username">
                                        </div>

                                        <div class="form-group mb-6">
                                            <label for="login_pwsd">Password <sup>*</sup></label>
                                            <input type="password" id="login_pwsd">
                                        </div>

                                        <div class="form-group d-flex align-items-center mb-14">
                                            <a class="btn" href="/Account_Login">Login</a>

                                            <div class="form-check ms-3">
                                                <input type="checkbox" class="form-check-input" id="remember_pwsd">
                                                <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                            </div>
                                        </div>
                                        <a class="lost-password" href="/Account_Login">Lost your Password?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <div class="my-account-item-wrap">
                                <h3 class="title">Register</h3>
                                <div class="my-account-form">
                                    <form action="#" method="post">
                                        <div class="form-group mb-6">
                                            <label for="register_username">Name<sup>*</sup></label>
                                            <input type="text" id="register_username">
                                        </div>
                                        <div class="form-group mb-6">
                                            <label for="register_username">Email Address<sup>*</sup></label>
                                            <input type="email" id="register_username">
                                        </div>
                                        <div class="form-group mb-6">
                                            <label for="register_username">Address</label>
                                            <input type="text" id="register_username">
                                        </div>
                                        <div class="form-group mb-6">
                                            <label for="register_username">Phone</label>
                                            <input type="text" id="register_username">
                                        </div>
                                        <div class="form-group mb-6">
                                            <label for="register_pwsd">Password <sup>*</sup></label>
                                            <input type="password" id="register_pwsd">
                                        </div>

                                        <div class="form-group">
                                            <p class="desc mb-4">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                                            <a class="btn" href="/Account_Login">Register</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
