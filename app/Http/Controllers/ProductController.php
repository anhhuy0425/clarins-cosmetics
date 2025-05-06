<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

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
}
