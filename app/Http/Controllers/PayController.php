<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderDetail;
class PayController extends Controller
{
     public function getCartSubtotal()
    {
        $subtotal = 0;
        if (Auth::check()) {
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            $sessionCart = session()->get('cart', []);
            $cartItems = collect();

            foreach ($sessionCart as $productId => $item) {
                $cartItems->push((object)[
                    'product' => (object)[
                        'id' => $productId,
                        'name' => $item['name'] ?? 'Sản phẩm',
                        'price' => $item['price'] ?? 0,
                        'image' => $item['image'] ?? null,
                    ],
                    'quantity' => $item['quantity'] ?? 1,
                ]);
            }
        }
        foreach ($cartItems as $item) {
            $subtotal += $item->quantity * ($item->product->price ?? 0);
        }
        return $subtotal;
    }
    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');

        $voucher = Voucher::where('code', $voucherCode)->first();

        if (!$voucher) {
            session()->forget('discount');
            return back()->with('error', 'Invalid coupon code');
        }
        $subtotal = $this->getCartSubtotal();
        if ($subtotal < $voucher->min_order_amount) {
            session()->forget('discount');
            return back()->with('error', 'Order value does not qualify for discount code');
        }

        $currentDate = now();
        if ($currentDate->lt($voucher->start_date) || $currentDate->gt($voucher->expiry_date)) {
            session()->forget('discount');
            return back()->with('error', 'Coupon code has expired');
        }
        $discount = 0;
        if ($voucher->discount_type == 'percent') {
            $discount = ($voucher->discount_value / 100) * $subtotal;
        } elseif ($voucher->discount_type == 'amount') {

            $discount = $voucher->discount_value;
        }
        if ($discount > $subtotal) {
            $discount = $subtotal;
        }
        session()->flash('success', 'Coupon code has been applied successfully.');
        session()->put('discount', $discount);
        session()->put('voucher_code', $voucher->code);
        return redirect()->back();
    }


    public function placeOrder(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : null;
        // $shipping = $request->input('shipping', 0);
        $totalAfterDiscount = $request->input('totalAfterDiscount');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $paymentMethod = $request->input('payment_method');
        $cartItems = session('cart', []); // Nếu bạn dùng session
        if ($userId) {
            $cartItems = Cart::where('user_id', $userId)->get();
        }

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }
        $order = Order::create([
            'user_id' => $userId,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            // 'shipping' => $shipping,
            'total_amount' => $totalAfterDiscount,
            'order_detail' => 'Pending',  // Trạng thái mặc định
            'payment_method' => $paymentMethod,
        ]);

        // Lưu từng sản phẩm vào bảng order_details
        foreach ($cartItems as $item) {
            $productId = is_object($item) ? $item->product_id : $item['product_id'];
            $quantity = is_object($item) ? $item->quantity : $item['quantity'];
            $price = is_object($item) ? $item->price : $item['price'];
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'status' => 'Pending',
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $quantity * $price,
            ]);
        }

        // Xóa giỏ hàng nếu là người dùng đã đăng nhập
        if ($userId) {
            Cart::where('user_id', $userId)->delete();
        } else {
            session()->forget('cart');
        }

        return redirect('/')->with('success', 'Order placed successfully!');
    }






}
