@extends('layouts')
@php use Illuminate\Support\Str; @endphp
@section('content')
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Products</li>
                                </ol>
                                <h2 class="page-header-title">Search results for: "{{$query}}"</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-space pb-0">
                <div class="container">
                    <div class="row g-3 g-sm-6">
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                            <a href="product.html" class="product-category-item">
                                <img class="icon" src="assets/images/shop/category/face.webp" width="70" height="80" alt="Image-HasTech">
                                <h3 class="title">Face</h3>
                                <span class="flag-new">new</span>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                            <a href="product.html" class="product-category-item" data-bg-color="#FFEDB4">
                                <img class="icon" src="assets/images/shop/category/body.png" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">Body</h3>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-lg-0 mt-sm-6 mt-4">
                            <a href="product.html" class="product-category-item" data-bg-color="#DFE4FF">
                                <img class="icon" src="assets/images/shop/category/Sunscreen.webp" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">Sunscreen</h3>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-lg-0 mt-sm-6 mt-4">
                            <a href="product.html" class="product-category-item" data-bg-color="#DFE4FF">
                                <img class="icon" src="assets/images/shop/category/hair.png" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">Hair</h3>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">->
                            <a href="product.html" class="product-category-item" data-bg-color="#FFDAE0">
                                <img class="icon" src="assets/images/shop/category/MakeUp.webp" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">MakeUp</h3>
                            </a>
                        </div>
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                            <a href="product.html" class="product-category-item" data-bg-color="#FFF3DA">
                                <img class="icon" src="assets/images/shop/category/Ferfumes.png" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">Ferfumes</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-space">
                <div class="container">
                    @if ($product_search->isEmpty())
                        <p>Không tìm thấy sản phẩm nào.</p>
                    @else
                    <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                        @foreach($product_search as $product)
                            @php
                            $imagePath = Str::startsWith($product->image, 'http')
                                ? $product->image
                                : asset('assets/images/shop/' . $product->image);
                            $isWished = Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->exists();
                            @endphp
                        <div class="col-6 col-lg-4 mb-4 mb-sm-8">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a class="d-block" href="{{ route('product_details', $product->id) }}">
                                        <img src="{{ $imagePath }}" width="370" height="450" alt="{{ $product->product_name }}">
                                    </a>
                                    <span class="flag-new">new</span>
                                    <div class="product-action">
                                        <button type="button" class="product-action-btn action-btn-cart" data-product-id="{{ $product->id }}">
                                            <span>Add to cart</span>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-wishlist" data-product-id="{{ $product->id }}">
                                            <i class="fa {{ $isWished ? 'fa-heart' : 'fa-heart-o' }}"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="reviews">150 reviews</div>
                                    </div>
                                    <h4 class="title">
                                        <a href="{{ route('product_details', $product->id) }}">{{ $product->product_name}}</a>
                                    </h4>
                                    <div class="prices">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @endif
                </div>
            </section>
            <section>
                <div class="container">
                    <a href="/Shop" class="product-banner-item">
                        <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
                    </a>>
                </div>
            </section>
@endsection

