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
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total' => $price * $quantity,
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
                    'product_id' => $product->id,
                    'name' => $product->product_name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->image,
                    'total' => $product->price,
                ];

                session()->put('cart', $cart);

                return response()->json([
                    'added' => true,
                    'message' => 'Sản phẩm đã được thêm vào giỏ hàng (session).',
                    'cart' => $cart
                ]);
            }
        }
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
            $cart = session()->get('cart', []);
            $productId = (string) $productId; // ⚠️ Sửa ở đây

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }
       return response()->json(['success' => true]);
    }



        public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $removeIds = $request->input('remove', []);

        if (Auth::check()) {
            $userId = Auth::id();
            if (!empty($removeIds)) {
                Cart::where('user_id', $userId)->whereIn('product_id', $removeIds)->delete();
            }
            foreach ($quantities as $productId => $quantity) {
                $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
                if ($cartItem) {
                    $price = $cartItem->product->price;
                    $cartItem->quantity = $quantity;
                    $cartItem->product->price = $price;
                    $cartItem->total = $quantity * $price;
                    $cartItem->save();
                }
            }
        } else {
            // Giỏ hàng lưu trong session
            $cart = session()->get('cart', []);

            // Xóa
            if (!empty($removeIds)) {
                foreach ($removeIds as $id) {
                    unset($cart[$id]);
                }
            }

            // Cập nhật số lượng
            foreach ($quantities as $productId => $quantity) {
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $quantity;
                    $cart[$productId]['total'] = $quantity * $cart[$productId]['price'];
                }
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật.');
    }



}
