<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function ProductAdmin()
    {
       $products = Product::with('category')->get();

       $categories = Category::all();
       return view('admin.product.viewproduct', compact('products','categories'));
    }

    public function CategoryAdmin()
    {
        $categories = Category::all();
        return view('admin.category.viewcategory', compact('categories'));
    }
    public function VoucherAdmin()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.viewvoucher', compact('vouchers'));
    }
    public function UserAdmin()
    {
        $users = user::all();
        return view('admin.user.viewuser', compact('users'));
    }




    public function addProduct(Request $request)
    {
        $request->validate([
            'product_name'       => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',

        ]);
        $imageName = null;
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $uploadPath = public_path('assets/images/shop');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
                    $image->move($uploadPath, $imageName);
                }
               $product = Product::create([
                'product_name'=> $request->product_name,
                'price'       => $request->price,
                'description' => $request->description,
                'image'       => $imageName,
                'category_id' => $request->category_id,
            ]);
        return redirect()->route('ProductAdmin')->with('success', 'Product added successfully!');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category = Category::create([
                'name'=> $request->name,
                'description' => $request->description,
        ]);
        return redirect()->route('CategoryAdmin')->with('success', 'Category added successfully!');
    }
    public function addVoucher(Request $request)
    {
        $request->validate([
        'code' => 'required|unique:vouchers,code',
        'discount_type' => 'required|in:percent,amount',
        'discount_value' => 'required|numeric|min:0',
        'min_order_amount' => 'nullable|numeric|min:0',
        'start_date' => 'required|date',
        'expiry_date' => 'required|date|after_or_equal:start_date',
    ]);
    $newvoucher = new voucher();
    $newvoucher->code = $request->code;
    $newvoucher->discount_type = $request->discount_type;
    $newvoucher->discount_value = $request->discount_value;
    $newvoucher->min_order_amount = $request->min_order_amount;
    $newvoucher->start_date = $request->start_date;
    $newvoucher->expiry_date = $request->expiry_date;
    $newvoucher->save();
    return redirect()->back()->with('success', 'Voucher đã được thêm!');
    }



    public function editVoucher(Request $request,$id)
{
    $voucher = voucher::findOrFail($id);
    $request->validate([
        'code' => [
            'required',
            Rule::unique('vouchers')->ignore($voucher->id),
        ],
        'discount_type' => 'required|in:percent,amount',
        'discount_value' => 'required|numeric|min:0',
        'min_order_amount' => 'nullable|numeric|min:0',
        'start_date' => 'required|date',
        'expiry_date' => 'required|date|after_or_equal:start_date',
    ]);
    $voucher->code = $request->code;
    $voucher->discount_type = $request->discount_type;
    $voucher->discount_value = $request->discount_value;
    $voucher->min_order_amount = $request->min_order_amount;
    $voucher->start_date = $request->start_date;
    $voucher->expiry_date = $request->expiry_date;
    $voucher->save();
    return redirect()->back()->with('success', 'The Voucher has been updated.');
}
public function editProduct(Request $request,$id)
{
    $product = product::findOrFail($id);
    $request->validate([
        'product_name'       => 'required|string|max:255',
        'price'       => 'required|numeric',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);
    $product->product_name = $request->product_name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->image = $request->image;
    $product->category_id = $request->category_id;
    $product->save();
    return redirect()->back()->with('success', 'The Product has been updated.');
}
public function editCategory(Request $request,$id)
{
    $category = category::findOrFail($id);
    $request->validate([
        'name'       => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();
    return redirect()->back()->with('success', 'The Category has been updated.');
}








    public function destroyVoucher($id)
    {
    $voucher = voucher::findOrFail($id);
    $voucher->delete();
    return redirect()->route('VoucherAdmin')->with('success', 'Deleted successfully!');
    }
    public function destroyProduct($id)
    {
    $product = product::findOrFail($id);
    $product->delete();
    return redirect()->route('ProductAdmin')->with('success', 'Deleted successfully!');
    }

    public function destroyCategory($id)
    {
    $category = category::findOrFail($id);
    $category->delete();
    return redirect()->route('CategoryAdmin')->with('success', 'Deleted successfully!');
    }

}
