<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Clarins Cosmetics</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="bootstrap, ecommerce, ecommerce html, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
    <meta name="author" content="codecarnival" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <header class="header-area sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-sm-6 col-lg-3">
                        <div class="header-logo">
                            <a href="/">
                                <img class="logo-main" src="assets/images/logo.webp" width="95" height="68" alt="Logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header-navigation">
                            <ul class="main-nav justify-content-start">
                                <li class="has-submenu"><a href="/">home</a></li>
                                <li><a href="/About">about</a></li>
                                <li class="has-submenu position-static">
                                    <a href="/Shop">shop</a>
                                    <ul class="submenu-nav-mega">
                                        <li><a href="#/" class="mega-title">Product</a>
                                            <ul>
                                                <li><a href="#">FACE</a></li>
                                                <li><a href="#">BODY</a></li>
                                                <li><a href="#">SUNSCREEN</a></li>
                                                <li><a href="#">HAIR</a></li>
                                                <li><a href="#">MAKEUP</a></li>
                                                <li><a href="#">PERFUMES</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#/" class="mega-title">Others Pages</a>
                                            <ul>
                                                <li><a href="/Product-Cart">Shopping Cart</a></li>
                                                <li><a href="/Product-Checkout">Checkout</a></li>
                                                <li><a href="/wishlistShow">Wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="/login">Pages</a>
                                    <ul class="submenu-nav">
                                        <li><a href="/login">My Account</a></li>
                                        <li><a href="/Faq">Frequently Questions</a></li>
                                    </ul>
                                </li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-7 col-sm-6 col-lg-3">
                        <div class="header-action justify-content-end">
                            <button class="header-action-btn ms-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                                <span class="icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)" />
                                        <defs>
                                            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_504:11" transform="scale(0.0333333)" />
                                            </pattern>
                                            <image id="image0_504:11" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC" />
                                        </defs>
                                    </svg>
                                </span>
                            </button>

                            <button class="header-action-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="AsideOffcanvasCart">
                                <span class="icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)" />
                                        <defs>
                                            <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_504:9" transform="scale(0.0333333)" />
                                            </pattern>
                                            <image id="image0_504:9" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg==" />
                                        </defs>
                                    </svg>
                                </span>
                            </button>

                            <div class="dropdown">
                                <button type="button" class="header-action-btn" data-bs-toggle="dropdown">
                                    <span class="icon">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)" />
                                            <defs>
                                                <pattern id="pattern3" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0_504:10" transform="scale(0.0333333)" />
                                                </pattern>
                                                <image id="image0_504:10" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC" />
                                            </defs>
                                        </svg>
                                    </span>
                                </button>
                                <ul class="dropdown-menu">
                                    @if(Auth::check())
                                        <p class="dropdown-item-icon mdi mdi-power text-primary me-2 text-center">Hello {{ Auth::user()->name }}</p>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit">Sign Out</button>
                                        </form>
                                    @else
                                        <a class="dropdown-item-icon mdi mdi-power text-primary me-2" href="{{ route('login') }}">LogIn</a>
                                        <a class="dropdown-item-icon mdi mdi-power text-primary me-2" href="{{ route('register') }}">register</a>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main-content">



            @yield('content')

        </main>

   <footer class="footer-area">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget-item">
                        <div class="widget-about">
                            <a class="widget-logo" href="/">
                                <img src="assets/images/logo.webp" width="95" height="68" alt="Logo">
                            </a>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                    <div class="widget-item">
                        <h4 class="widget-title">Information</h4>
                        <ul class="widget-nav">
                            <li><a href="/About">About us</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/Faq">Privacy</a></li>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/Shop">Shop</a></li>
                            <li><a href="/login">My Account</a></li>
                            <li><a href="/Faq">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                    <div class="widget-item">
                        <h4 class="widget-title">Social Info</h4>
                        <div class="widget-social">
                            <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container pt-0 pb-0">
            <div class="footer-bottom-content">
                <p class="copyright">© 2022 Brancy. Made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a></p>
            </div>
        </div>
    </div>
</footer>
<div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

@isset($product)
<aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-action-view-content">
                    @php
                            $imagePath = Str::startsWith($product->image, 'http')
                            ? $product->image
                            : asset('assets/images/shop/' . $product->image);
                    @endphp
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to cart successfully!
                    </div>
                    <div class="modal-action-product">
                        <div class="thumb">
                            <a class="d-block" href="{{ route('product_details', $product->id) }}">
                                <img src="{{ $imagePath }}" width="370" height="450" alt="{{ $product->product_name }}">
                            </a>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('product_details', $product->id) }}">{{ $product->product_name}}</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
@endisset
<aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
    </div>
    <div class="offcanvas-body">
        <div class="container pt--0 pb--0">
            <div class="search-box-form-wrap">
                <div class="search-note">
                    <p>Start typing and press Enter to search</p>
                </div>
                <form action="{{ route('products.search') }}" method="GET" target="_self">
                    <div class="aside-search-form position-relative">
                        <label for="query" class="visually-hidden">Search</label>
                        <input name="query" type="search" class="form-control" placeholder="Search entire store…"  value="{{ request('query') }}">
                        <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</aside>
<aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
        <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i class="fa fa-chevron-right"></i></button>
    </div>
    <div class="offcanvas-body">
        <ul class="aside-cart-product-list">
            @forelse($cartItems as $item)
                @php
                    $imagePath = Str::startsWith($item->product->image, 'http')? $item->product->image: asset('assets/images/shop/' .$item->product->image);
                @endphp
                <li class="aside-product-list-item">
                    <a href="javascript:void(0);" class="remove"data-product-id="{{ $item->product->id ?? 0 }}">
                        ×
                    </a>
                    <a href="#">
                        <img src="{{ $imagePath }}"
                            width="68" height="84" alt="{{ $item->product->name ?? 'Product' }}">
                        <span class="product-title">{{ $item->product->name ?? 'Sản phẩm' }}</span>
                    </a>
                    <span class="product-price">{{ $item->quantity }} × ${{ $item->product->price ?? 0 }}</span>
                </li>
            @empty
                <p>cart is empty</p>
            @endforelse
        </ul>
        <p class="cart-total">
            <span>Subtotal:</span>
            <span class="amount">${{$subtotal}}</span>
        </p>
        <a class="btn-total" href="/Product-Cart">View cart</a>
        <a class="btn-total" href="/Product-Checkout">Checkout</a>
    </div>
</aside>

<aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
        <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="fa fa-chevron-left"></i></button>
    </div>
    <div class="offcanvas-body">
        <div id="offcanvasNav" class="offcanvas-menu-nav">
            <ul>
                <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="/">home</a>
                </li>
                <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="/About">about</a></li>
                <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">shop</a>
                    <ul>
                        <li><a href="#" class="offcanvas-nav-item">Product</a>
                            <ul>
                                <li><a href="#">FACE</a></li>
                                <li><a href="#">BODY</a></li>
                                <li><a href="#">SUNSCREEN</a></li>
                                <li><a href="#">HAIR</a></li>
                                <li><a href="#">MAKEUP</a></li>
                                <li><a href="#">PERFUMES</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="offcanvas-nav-item">Others Pages</a>
                            <ul>
                                <li><a href="product-cart.html">Shopping Cart</a></li>
                                <li><a href="/Product-Checkout">Checkout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Pages</a>
                    <ul>
                        <li><a href="/login">My Account</a></li>
                        <li><a href="/Faq">Frequently Questions</a></li>
                    </ul>
                </li>
                <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</aside>
</div>
<script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
