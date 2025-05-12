<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Voucher;
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






    
}
