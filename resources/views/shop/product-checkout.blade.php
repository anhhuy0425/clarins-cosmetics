@extends('layouts')
@section('content')
@if (!$user)
<!-- Modal chọn hành động -->
<div class="modal fade" id="guestCheckoutModal" tabindex="-1" aria-labelledby="guestCheckoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="guestCheckoutModalLabel">Welcome!</h5>
      </div>
      <div class="modal-body">
        <p>You are not logged in. How would you like to proceed?</p>
        <div class="d-grid gap-2">
          <a href="{{ route('login')}}" class="btn btn-primary">Log In</a>
          <button class="btn btn-secondary" onclick="continueAsGuest()">Continue as Guest</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
            <!--== Start Page Header Area Wrapper ==-->
            <nav aria-label="breadcrumb" class="breadcrumb-style1">
                <div class="container">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/l">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div>
            </nav>
            <section class="shopping-checkout-wrap section-space">
                <div class="container">
                    <div class="checkout-page-coupon-wrap">
                        <!--== Start Checkout Coupon Accordion ==-->
                        <div class="coupon-accordion" id="CouponAccordion">
                            <div class="card">
                                <h3>
                                    <i class="fa fa-info-circle"></i>
                                    Have a Coupon?
                                    <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click here to enter your code</a>
                                </h3>
                                <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                                    <div class="card-body">
                                        <div class="apply-coupon-wrap">
                                            <p>If you have a coupon code, please apply it below.</p>
                                            <form id="couponForm" action="{{ route('cart.applyVoucher') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="voucher_code" name="voucher_code" placeholder="Coupon code">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn-coupon">Apply coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Checkout Coupon Accordion ==-->
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout-billing-details-wrap">
                                <h2 class="title">Billing details</h2>
                                <div class="billing-form-wrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Full name <abbr class="required" title="required">*</abbr></label>
                                                    <input id="name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address">Address:<abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" id="address" class="form-control" placeholder="Enter your address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone <abbr class="required" title="required">*</abbr></label>
                                                    <input id="phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input id="email" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-order-details-wrap">
                                <div class="order-details-table-wrap table-responsive">
                                    <h2 class="title mb-25">Your order</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @forelse($cartItems as $item)
                                                <tr class="cart-item">
                                                    <td class="product-name">{{ $item->product->name ?? 'Product' }}<span class="product-quantity"> × {{ $item->quantity }}</span></td>
                                                    <td class="product-total">${{$item->product->price}}</td>
                                                </tr>
                                            @empty
                                                <p>cart is empty</p>
                                            @endforelse
                                        </tbody>
                                        <tfoot class="table-foot">
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td>${{$subtotal}}</td>
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
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul class="shipping-list">
                                                        <li class="radio">
                                                            <input type="radio" name="shipping" id="radio2" value="0" onclick="updateShipping()">
                                                            <label for="radio2">TPHCM (Free)</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" name="shipping" id="radio1" value="30" onclick="updateShipping()">
                                                            <label for="radio1">Other Address<span> $30</span></label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <span id="totalAfterDiscount" data-value="{{ $totalAfterDiscount }}"></span>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <span id="total" name="totalAfterDiscount" class="amount">${{ number_format($totalAfterDiscount, 2) }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="shop-payment-method">
                                        <div id="PaymentMethodAccordion">
                                            <div class="card">
                                                <div class="card-header" id="check_payments3">
                                                    <input data-bs-toggle="collapse" data-bs-target="#itemcod" type="radio" name="payment_method" value="cod" id="cod">
                                                    <label for="cod">Cash on Delivery</label>
                                                </div>
                                                <div id="itemcod" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                                    <div class="card-body">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="PaymentMethodAccordion">
                                            <div class="card">
                                                <div class="card-header" id="check_payments3">
                                                    <input data-bs-toggle="collapse" data-bs-target="#itemThree" type="radio" name="payment_method" value="transfer" id="transfer">
                                                    <label for="transfer">Payment Transfer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="p-text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#/">privacy policy.</a></p>
                                        <div class="agree-policy">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                                <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions <span class="required">*</span></label>
                                            </div>
                                        </div>
                                        <form id="orderForm" action="{{ route('place.order') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="name" id="formName">
                                            <input type="hidden" name="address" id="formAddress">
                                            <input type="hidden" name="phone" id="formPhone">
                                            <input type="hidden" name="email" id="formEmail">
                                            {{-- <input type="hidden" name="shipping" id="formShipping"> --}}

                                            <input type="hidden" name="totalAfterDiscount" id="formtotal" value="{{ $totalAfterDiscount }}">
                                            <input type="hidden" name="payment_method" id="formPaymentMethod">
                                            <a href="javascript:void(0);" id="submitLink" class="btn-place-order">Place order</a>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
<script>
    window.userIsLoggedIn = @json(auth()->check());
</script>
