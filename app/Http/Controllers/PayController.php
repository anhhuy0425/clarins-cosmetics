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

        // Nếu người dùng đã đăng nhập
        if (Auth::check()) {
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            // Nếu người dùng chưa đăng nhập, lấy từ session
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

        // Tính tổng giỏ hàng
        foreach ($cartItems as $item) {
            $subtotal += $item->quantity * ($item->product->price ?? 0);
        }
        return $subtotal;
    }
    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code'); // Nhận mã giảm giá từ form

        // Tìm voucher trong cơ sở dữ liệu
        $voucher = Voucher::where('code', $voucherCode)->first();

        // Kiểm tra xem voucher có hợp lệ không
        if (!$voucher) {
            return back()->with('error', 'Mã giảm giá không hợp lệ.');
        }

        // Kiểm tra điều kiện áp dụng voucher (ví dụ: min_order_amount, ngày hết hạn)
        $subtotal = $this->getCartSubtotal(); // Giả sử bạn có hàm tính tổng giỏ hàng
        if ($subtotal < $voucher->min_order_amount) {
            return back()->with('error', 'Giá trị đơn hàng không đủ điều kiện áp dụng mã giảm giá.');
        }

        // Kiểm tra ngày hết hạn của voucher
        $currentDate = now();
        if ($currentDate->lt($voucher->start_date) || $currentDate->gt($voucher->expiry_date)) {
            return back()->with('error', 'Mã giảm giá đã hết hạn.');
        }

        // Tính giá trị giảm giá
        $discount = 0;
        if ($voucher->discount_type == 'percent') {
            // Nếu voucher là phần trăm
            $discount = ($voucher->discount_value / 100) * $subtotal;
        } elseif ($voucher->discount_type == 'amount') {
            // Nếu voucher là giá trị cố định
            $discount = $voucher->discount_value;
        }

        // Kiểm tra nếu giá trị giảm giá vượt quá giá trị giỏ hàng
        if ($discount > $subtotal) {
            $discount = $subtotal;
        }

        // Lưu voucher vào session (hoặc bạn có thể lưu vào database cho đơn hàng sau này)
        // session()->put('voucher', $voucher);
        // session()->put('discount', $discount);

        session()->flash('success', 'Mã giảm giá đã được áp dụng thành công.');
        session()->put('discount', $discount);
        // session()->put('voucher', $voucher);
        session()->put('voucher_code', $voucher->code);
        // Sau đó redirect lại trang giỏ hàng
        // return redirect()->back();
        return redirect()->route('product_cart');
    }
}
