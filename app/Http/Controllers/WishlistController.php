<?php
namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
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
}
