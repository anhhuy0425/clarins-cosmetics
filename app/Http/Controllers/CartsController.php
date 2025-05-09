<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())
                        ->where('product_id', $id)
                        ->first();

            if ($cart) {
                $cart->quantity++;
                $cart->total = $cart->quantity * $product->price;
                $cart->save();

                return response()->json([
                    'updated' => true,
                    'message' => 'Số lượng sản phẩm đã được cập nhật trong giỏ hàng.'
                ]);
            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $id,
                    'quantity' => 1,
                    'total' => $product->price,
                ]);

                return response()->json([
                    'added' => true,
                    'message' => 'Sản phẩm đã được thêm vào giỏ hàng.'
                ]);
            }
        } else {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                $cart[$id]['total'] = $cart[$id]['quantity'] * $product->price;

                session()->put('cart', $cart);

                return response()->json([
                    'updated' => true,
                    'message' => 'Sản phẩm trong giỏ hàng (session) đã được cập nhật.'
                ]);
            } else {
                $cart[$id] = [
                    'name' => $product->product_name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->image,
                    'total' => $product->price,
                ];

                session()->put('cart', $cart);

                return response()->json([
                    'added' => true,
                    'message' => 'Sản phẩm đã được thêm vào giỏ hàng (session).'
                ]);
            }
        }
    }
        public function showCart()
    {
        // Kiểm tra người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Nếu đã đăng nhập, lấy giỏ hàng từ bảng carts
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();
        } else {
            // Nếu chưa đăng nhập, lấy giỏ hàng từ session
            $cartItems = session()->get('cart', []);
        }

        // Tính tổng giá trị giỏ hàng
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Trả về view với giỏ hàng
        return view('layouts', compact('cartItems', 'subtotal'));
    }

            public function removeFromCart(Request $request, $productId)
    {
        if (Auth::check()) {
            // Nếu đã đăng nhập, xóa sản phẩm từ bảng carts
            $userId = Auth::id();
            Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();
        } else {
            // Nếu chưa đăng nhập, xóa sản phẩm từ session
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

}
