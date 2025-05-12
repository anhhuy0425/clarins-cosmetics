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
        session()->flash('success', 'Mã giảm giá đã được áp dụng thành công.');
        session()->put('discount', $discount);
        session()->put('voucher_code', $voucher->code);
        return redirect()->back();
    }


    public function placeOrder(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : null;
        $shippingFee = $request->input('shipping', 0);
        $totalAfterDiscount = $request->input('totalAfterDiscount');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $paymentMethod = $request->input('payment_method');
        // $shippingRuleId = $request->input('shipping_rule_id');

        // Lấy dữ liệu giỏ hàng (nếu là guest hoặc đã đăng nhập)
        $cartItems = session('cart', []); // Nếu bạn dùng session
        if ($userId) {
            $cartItems = Cart::where('user_id', $userId)->get();
        }

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        // $total = 0;
        // foreach ($cartItems as $item) {
        //     $total += $item['price'] * $item['quantity'];
        // }
        // $total += $shippingFee;

        // Lưu vào bảng orders
        $order = Order::create([
            'user_id' => $userId,
            'voucher_id' => null, // Nếu có voucher, bạn cần xử lý thêm
            'phone' => $phone,
            'email' => $email,
            'shipping_time' => now(), // Thời gian giao hàng (hoặc nhập từ form)
            'address' => $address,
            'total_amount' => $total,
            'order_detail' => 'Pending',  // Trạng thái mặc định
            'payment_method' => $paymentMethod,
            'shipping_rule_id' => $shippingRuleId,  // Nếu có quy tắc giao hàng
        ]);

        // Lưu từng sản phẩm vào bảng order_details
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'status' => 'Pending',  // Trạng thái đơn hàng, có thể là 'Pending', 'Shipped', v.v.
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],  // Tính subtotal cho từng sản phẩm
            ]);
        }

        // Xóa giỏ hàng nếu là người dùng đã đăng nhập
        if ($userId) {
            Cart::where('user_id', $userId)->delete();
        } else {
            session()->forget('cart');
        }

        return redirect()->route('thank.you')->with('success', 'Order placed successfully!');
    }






}
