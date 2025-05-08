<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        return view('shop.shop', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-details', compact('product'));
    }

    public function addWishlist(Request $request)
{
    // Kiểm tra người dùng đã đăng nhập hay chưa
    if (!Auth::check()) {
        return redirect()->route('/login')->with('error', 'You need to login first.');
    }

    $user = Auth::user();
    $productId = $request->product_id;

    // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích chưa
    $exists = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->exists();

    if ($exists) {
        return response()->json(['success' => false, 'message' => 'Product is already in your wishlist']);
    }

    // Thêm sản phẩm vào danh sách yêu thích
    $wishlist = new Wishlist();
    $wishlist->user_id = $user->id;
    $wishlist->product_id = $productId;
    $wishlist->save();

    // Trả về phản hồi để UI cập nhật
    return response()->json(['success' => true, 'message' => 'Product added to wishlist', 'product_id' => $productId]);
}


}
