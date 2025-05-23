@extends('layouts')
@section('content')
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Product Detail</li>
                                </ol>
                                <h2 class="page-header-title">Product Detail</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-space">
                <div class="container">
                    <div class="row product-details">
                        <div class="col-lg-6">
                                @php
                                $imagePath = Str::startsWith($product->image, 'http')
                                    ? $product->image
                                    : asset('assets/images/shop/' . $product->image);
                                $isWished = Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->exists();
                                @endphp
                            <div class="product-details-thumb">
                                <img src="{{$imagePath}}" width="570" height="693" alt="Image">
                                <span class="flag-new">new</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h3 class="product-details-title">{{$product->product_name}}</h3>
                                <div class="product-details-review mb-7">
                                    <div class="product-review-icon">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <button type="button" class="product-review-show">150 reviews</button>
                                </div>
                                <p class="mb-7">{{$product->description}}</p>
                                <div class="product-details-action">
                                    <h4 class="price">${{$product->price}}</h4>
                                    <div class="product-details-cart-wishlist">
                                        <button type="button" class="btn-wishlist action-btn-wishlist" data-product-id="{{ $product->id }}">
                                            <i class="fa {{ $isWished ? 'fa-heart' : 'fa-heart-o' }}"></i>
                                        </button>
                                        <button type="button" class="btn ps-5 action-btn-cart" data-product-id="{{ $product->id }}" >Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="nav product-details-nav" id="product-details-nav-tab" role="tablist">
                                <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
                            </div>
                            <div class="tab-content" id="product-details-nav-tabContent">
                                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">

                                    <div class="product-review-item">
                                        <div class="product-review-top">
                                            <div class="product-review-thumb">
                                                <img src="assets/images/shop/product-details/comment1.webp" alt="Images">
                                            </div>
                                            <div class="product-review-content">
                                                <span class="product-review-name">Tomas Doe</span>
                                                <span class="product-review-designation">Delveloper</span>
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                        <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="product-reviews-form-wrap">
                                <h4 class="product-form-title">Leave a replay</h4>
                                <div class="product-reviews-form">
                                    <form action="#">
                                        <div class="form-input-item">
                                            <textarea class="form-control" placeholder="Enter you feedback"></textarea>
                                        </div>
                                        <div class="form-input-item">
                                            <input class="form-control" type="text" placeholder="Full Name">
                                        </div>
                                        <div class="form-input-item">
                                            <input class="form-control" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-input-item">
                                            <div class="form-ratings-item">
                                                <select id="product-review-form-rating-select" class="select-ratings">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                </select>
                                                <span class="title">Provide Your Ratings</span>
                                                <div class="product-ratingsform-form-wrap">
                                                    <div class="product-ratingsform-form-icon">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div id="product-review-form-rating" class="product-ratingsform-form-icon-fill">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reviews-form-checkbox">
                                                <input class="form-check-input" type="checkbox" value="" id="ReviewsFormCheckbox" checked>
                                                <label class="form-check-label" for="ReviewsFormCheckbox">Provide ratings anonymously.</label>
                                            </div>
                                        </div>
                                        <div class="form-input-item mb-0">
                                            <button type="submit" class="btn">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <!--== Start Product Category Item ==-->
                <a href="product.html" class="product-banner-item">
                    <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
                </a>
            </div>
@endsection

