<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
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
    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.product-details', compact('product'));
    }

    public function toggleWishlist(Request $request)
{
    if (!Auth::check()) {
        // Nếu là request AJAX thì trả về lỗi 401
        if ($request->ajax()) {
            return response()->json(['not_logged_in' => true], 401);
        }
        // Nếu là request bình thường thì chuyển về login
        return redirect()->route('login')->with('error', 'You need to login first.');
    }

    $user = Auth::user();
    $productId = $request->product_id;

    $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();

    if ($wishlist) {
        $wishlist->delete();
        return response()->json(['success' => true, 'removed' => true, 'product_id' => $productId]);
    }

    Wishlist::create([
        'user_id' => $user->id,
        'product_id' => $productId,
    ]);

    return response()->json(['success' => true, 'added' => true, 'product_id' => $productId]);
    }



    public function search(Request $request)
{
    $query = $request->input('query');
    $product_search = Product::query();
    if ($query) {
        $product_search = $product_search->where('product_name', 'like', '%' . $query . '%');
    }

     $product_search = $product_search->get();
    return view('shop.product-search', [
        'product_search' => $product_search,
        'query' => $query,
    ]);
}

    public function trackOrder(Request $request)
    {
        $order = null;
        $error = null;

        if ($request->isMethod('post')) {
            $request->validate([
                'phone' => 'required|string',
            ]);

            $order = Order::where('phone', $request->phone)->first();

            if (!$order) {
                $error = 'Số điện thoại không tồn tại hoặc không hợp lệ';
            }
        }

        return view('shop.Order-tracking', compact('order', 'error'));
    }

    public function filterByCategory($categoryId)
    {
        $product_filter = Product::where('category_id', $categoryId)->get();
        $category = Category::find($categoryId);
        return view('shop.filterByCategory', compact('product_filter', 'category'));
    }
    public function filter(Request $request)
    {
        $categoryId = $request->category_id;
        $categories = Category::all();
        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $product_filter = $query->get();

        return view('shop.filterByCategory', compact('product_filter', 'categories'));
    }

}
