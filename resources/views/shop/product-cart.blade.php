@extends('layouts')
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-style1">
    <div class="container">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </div>
</nav>
<section class="section-space">
    <div class="container">
        <div class="shopping-cart-form table-responsive">
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cartItems as $item)
                        @php
                            $imagePath = Str::startsWith($item->product->image, 'http')? $item->product->image: asset('assets/images/shop/' . $item->product->image);
                        @endphp
                        <tr class="tbody-item">
                            <td class="product-remove">
                                <a href="javascript:void(0);" class="remove"data-product-id="{{ $item->product->id ?? 0 }}">×</a>
                            </td>
                            <td class="product-thumbnail">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ $imagePath }}"
                                            width="68" height="84" alt="{{ $item->product->name ?? 'Product' }}">
                                    </a>
                                </div>
                            </td>
                            <td class="product-name">
                                <a class="title" href="#"><span class="product-title">{{ $item->product->name ?? 'Product' }}</span></a>
                            </td>
                            <td class="product-price">
                                <span class="price">$ {{$item->product->price}}</span>
                            </td>
                            <td class="product-quantity">
                                <div class="pro-qty">
                                    <input type="text" class="quantity" name="quantities[{{ $item->product->id }}]" value="{{ $item->quantity }}" value="{{$item->quantity}}">
                                </div>
                            </td>

                            <td class="product-subtotal">
                                <span class="price">{{ $item->quantity * ($item->product->price ?? 0)}}</span>
                            </td>
                        </tr>
                        @empty
                            <p>cart is empty</p>
                        @endforelse
                         <tr class="tbody-item-actions">
                            <td colspan="6">
                                <button type="submit" class="btn-update-cart ">Update cart</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                @php
                $discount = session('discount', 0);
                @endphp
                <div class="coupon-wrap">
                    <h4 class="title">Coupon</h4>
                    <p class="desc">Enter your coupon code if you have one.</p>
                    <form id="couponForm" action="{{ route('cart.applyVoucher') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="voucher_code" name="voucher_code" placeholder="Coupon code">
                        <button type="submit" class="btn-coupon">Apply coupon</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="cart-totals-wrap">
                    <h2 class="title">Cart totals</h2>
                    <table>
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td>
                                    <span class="amount">${{$subtotal}}</span>
                                </td>
                            </tr>
                                @if(session('success'))
                                    <script>
                                        alert("{{ session('success') }}");
                                    </script>
                                @endif
                                @if(session('error'))
                                    <script>
                                        alert("{{ session('error') }}");
                                    </script>
                                @endif
                            @if($discount > 0)
                                <tr class="cart-discount">
                                    <th>Discount</th>
                                    <td><span class="amount">- ${{ number_format($discount, 2) }}</span></td>
                                </tr>
                            @endif

                            <tr class="shipping-totals">
                                <th>Shipping</th>
                                <td>
                                    <ul class="shipping-list">
                                        <li class="radio">
                                            <input type="radio" name="shipping" id="radio2" value="0" onclick="updateShipping()">
                                            <label for="radio2">TPHCM (Free)</label>
                                        </li>
                                        <li class="radio">
                                            <input type="radio" name="shipping" id="radio1" value="30" onclick="updateShipping()">
                                            <label for="radio1">Other Address<span>$30</span></label>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <span id="totalAfterDiscount" data-value="{{ $totalAfterDiscount }}"></span>
                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                    <span id="total" class="amount">${{ number_format($totalAfterDiscount, 2) }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end">
                        <a href="/Product-Checkout" class="checkout-button" id="proceedBtn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
