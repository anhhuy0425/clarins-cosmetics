@extends('layouts')
@section('content')
            <nav aria-label="breadcrumb" class="breadcrumb-style1">
                <div class="container">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div>
            </nav>
            <section class="section-space">
                <div class="container">
                    <div class="shopping-wishlist-form table-responsive">
                        <form action="#" method="post">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product name</th>
                                        <th class="product-price">Unit price</th>
                                        <th class="product-stock-status">Stock status</th>
                                        <th class="product-add-to-cart">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlists as $wishlist)
                                        @php
                                            $product = $wishlist->product;
                                            $imagePath = Str::startsWith($product->image, 'http')
                                                ? $product->image
                                                : asset('assets/images/shop/' . $product->image);
                                        @endphp
                                    <tr class="tbody-item">
                                        <td class="product-thumbnail">
                                            <div class="thumb">
                                                <a href="single-product.html">
                                                    <img src="{{$imagePath}}" width="68" height="84" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a class="title" href="single-product.html">{{$product->product_name}}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="price">${{$product->price}}</span>
                                        </td>
                                        <td class="product-stock-status">
                                            <span class="wishlist-in-stock">In Stock</span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <button type="button" class="btn-shop-cart action-btn-cart" data-product-id="{{ $product->id }}">
                                                <span>Add to cart</span>
                                            </button>
                                        </td>

                                    </tr>
                                @empty
                                    <p>You have no products in your wishlist.</p>
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </section>
@endsection
