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
                                <h2 class="page-header-title">All Products</h2>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing 09 Results</h5>
                        </div>
                    </div>
                </div>
            </section>
            <div class="shop-top-bar-area">
                <div class="container">
                    <div class="shop-top-bar">
                        <select class="select-shoing">
                            <option data-display="Trending">Trending</option>
                            <option value="1">Featured</option>
                            <option value="2">Best Selling</option>
                            <option value="3">Alphabetically, A-Z</option>
                            <option value="4">Alphabetically, Z-A</option>
                            <option value="5">Price, low to high</option>
                            <option value="6">Price, high to low</option>
                            <option value="7">Date, new to old</option>
                            <option value="8">Date, old to new</option>
                        </select>

                        <div class="select-on-sale d-flex d-md-none">
                            <span>On Sale :</span>
                            <select class="select-on-sale-form">
                                <option selected>Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>

                        <div class="select-price-range">
                            <h4 class="title">Pricing</h4>
                            <div class="select-price-range-slider">
                                <div class="slider-range" id="slider-range"></div>
                                <div class="slider-labels">
                                    <span id="slider-range-value1"></span>
                                    <span>-</span>
                                    <span id="slider-range-value2"></span>
                                </div>
                            </div>
                        </div>

                        <div class="select-on-sale d-none d-md-flex">
                            <span>On Sale :</span>
                            <select class="select-on-sale-form">
                                <option selected>Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
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
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                            <!--== Start Product Category Item ==-->
                            <a href="product.html" class="product-category-item" data-bg-color="#FFDAE0">
                                <img class="icon" src="assets/images/shop/category/MakeUp.webp" width="80" height="80" alt="Image-HasTech">
                                <h3 class="title">MakeUp</h3>
                            </a>
                            <!--== End Product Category Item ==-->
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
                    <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                        @foreach($products as $product)
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
                </div>
                        <div class="col-12">

                                <div class="pagination justify-content-center me-auto ms-auto mt-5 mb-0 mb-sm-10">
                                {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                        </div>

            </section>
            <section>
                <div class="container">
                    <a href="/Shop" class="product-banner-item">
                        <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
                    </a>
                </div>
            </section>
@endsection

