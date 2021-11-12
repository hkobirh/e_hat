<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Wolmart eCommmerce Marketplace HTML Template</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/icons/favicon.png')}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}"
          as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}"
          as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}"
          as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend/assets/fonts/wolmart87d5.ttf?png09e')}}" as="font" type="font/ttf"
          crossorigin="anonymous">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

    <!-- Toaster CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/mycss.css')}}">
    @yield('special-css')

</head>

<body>
<div class="page-wrapper">
    <!-- Start of Header -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
                </div>
                <div class="header-right">
                    <div class="dropdown">
                        <a href="#currency">USD</a>
                        <div class="dropdown-box">
                            <a href="#USD">USD</a>
                            <a href="#EUR">EUR</a>
                        </div>
                    </div>
                    <!-- End of DropDown Menu -->

                    <div class="dropdown">
                        <a href="#language"><img src="{{asset('frontend/assets/images/flags/eng.png')}}" alt="ENG Flag"
                                                 width="14"
                                                 height="8" class="dropdown-image"/> ENG</a>
                        <div class="dropdown-box">
                            <a href="#ENG">
                                <img src="{{asset('frontend/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14"
                                     height="8"
                                     class="dropdown-image"/>
                                ENG
                            </a>
                            <a href="#FRA">
                                <img src="{{asset('frontend/assets/images/flags/fra.png')}}" alt="FRA Flag" width="14"
                                     height="8"
                                     class="dropdown-image"/>
                                FRA
                            </a>
                        </div>
                    </div>
                    <!-- End of Dropdown Menu -->
                    <span class="divider d-lg-show"></span>
                    <a href="#" class="d-lg-show">Blog</a>
                    <a href="#" class="d-lg-show">Contact Us</a>
                    <a href="#" class="d-lg-show">My Account</a>
                    <a href="{{ route('staff.login') }}" class="d-lg-show login"><i
                            class="w-icon-account"></i>Sign
                        In</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{ route('staff.register') }}" class="ml-0 d-lg-show login">Register</a>

                    @if(session('customer_id'))
                        <span class="delimiter d-lg-show">/</span>
                        {{session('customer_name')}}

                        <span class="delimiter d-lg-show">/</span>
                        <a href="{{ route('logout') }}" class="ml-0 d-lg-show logout">Logout</a>
                    @else
                        <span class="delimiter d-lg-show">/</span>
                        <a href="{{ route('register') }}" class="ml-0 d-lg-show login">Customer register</a>
                    @endif

                </div>
            </div>
        </div>
        <!-- End of Header Top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="{{route('index')}}" class="mobile-menu-toggle  w-icon-hamburger">
                    </a>
                    <a href="{{route('index')}}" class="logo ml-lg-0">
                        <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo" width="144" height="45"/>
                    </a>

                    <form method="POST" action="{{route('home.search')}}"
                          class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                        <div class="select-box">
                            <select id="category" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."/>
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>

                    <div class="searchProduct">
                    </div>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-lg-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                            <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                        </div>
                    </div>
                    <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                    <a class="compare label-down link d-xs-show" href="compare.html">
                        <i class="w-icon-compare"></i>
                        <span class="compare-label d-lg-show">Compare</span>
                    </a>
                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route('cart.info')}}" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <span class="cart-count">{{Cart::getContent()->count()}}</span>
                            </i>
                            <span class="cart-label">Cart</span>
                        </a>
                        <div class="dropdown-box side-cart-toggle" style="max-width:15%">

                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Middle -->
        <div class="sticky-content-wrapper" style="">
            <div class="header-bottom sticky-content fix-top sticky-header" style="">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="true" data-display="static"
                                   title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span style="text-align:center;font-size: 18px; font-weight:bold">Categories</span>
                                </a>


                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('category.products', $category->slug) }}"
                                                   onclick="return false;" style="pointer-events: none;">
                                                    <i class="w-icon-ruby"></i>{{ $category->name }}
                                                </a>
                                                @if (count($category->sub_cats) > 0)
                                                    <ul class="submenu">
                                                        @foreach ($category->sub_cats as $sub_category)
                                                            <li>
                                                                <a
                                                                    href="{{ route('category.products', [$category->slug, $sub_category->slug]) }}"><i
                                                                        class="w-icon-ruby"></i>{{ $sub_category->name }}
                                                                </a>
                                                                @if (count($sub_category->sub_cats) > 0)
                                                                    <ul>
                                                                        @foreach ($sub_category->sub_cats as $sub_sub_category)
                                                                            <li><a
                                                                                    href="{{ route('category.products', [$category->slug, $sub_category->slug, $sub_sub_category->slug]) }}"><i
                                                                                        class="w-icon-ruby"></i>{{ $sub_sub_category->name }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="demo1.html">Home</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="{{route('track.order')}}" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track
                                Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->

    <!-- Start of Main-->
    <main class="main">
        @yield('main-content')
    </main>
    <!-- End of Main -->

    <!-- Start of Footer -->
    <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
        <div class="footer-newsletter bg-primary">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="icon-box icon-box-side text-white">
                            <div class="icon-box-icon d-inline-flex">
                                <i class="w-icon-envelop3"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                    Our Newsletter</h4>
                                <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                        <form action="#" method="get"
                              class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                   placeholder="Your E-mail Address"/>
                            <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                    class="w-icon-long-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget widget-about">
                            <a href="demo1.html" class="logo-footer">
                                <img src="{{asset('frontend/assets/images/logo_footer.png')}}" alt="logo-footer"
                                     width="144"
                                     height="45"/>
                            </a>
                            <div class="widget-body">
                                <p class="widget-about-title">Got Question? Call us 24/7</p>
                                <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                                <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                    & coupons ster now toon.
                                </p>

                                <div class="social-icons social-icons-colored">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                    <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">Company</h3>
                            <ul class="widget-body">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="#">Team Member</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="#">Affilate</a></li>
                                <li><a href="#">Order History</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="widget-body">
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="cart.html">View Cart</a></li>
                                <li><a href="login.html">Sign In</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="wishlist.html">My Wishlist</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4>
                            <ul class="widget-body">
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back guarantee!</a></li>
                                <li><a href="#">Product Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Term and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-left">
                    <p class="copyright">Copyright © 2021 Wolmart Store. All Rights Reserved.</p>
                </div>
                <div class="footer-right">
                    <span class="payment-label mr-lg-8">We're using safe payment for</span>
                    <figure class="payment">
                        <img src="{{asset('frontend/assets/images/payment.png')}}" alt="payment" width="159"
                             height="25"/>
                    </figure>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Page-wrapper-->

<!-- Stiky footer place-->

<!-- Start of Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required/>
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">Shop</a>
                        <ul>
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul>
                                    <li><a href="#">Banner With Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Shop Layouts</a>
                                <ul>
                                    <li><a href="#">3 Columns Mode</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Pages</a>
                                <ul>
                                    <li><a href="#">Variable Product</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layouts</a>
                                <ul>
                                    <li><a href="#">Default<span
                                                class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="#">Vertical Thumbs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Vendor</a>
                        <ul>
                            <li>
                                <a href="#">Store Listing</a>
                                <ul>
                                    <li><a href="W">Store listing 1</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Vendor Store</a>
                                <ul>
                                    <li><a href="#">Vendor Store 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                        <ul>
                            <li><a href="#">Classic</a></li>
                            <li><a href="#">Listing</a></li>
                            <li>
                                <a href="https://www.portotheme.com/html/wolmart/blog-grid.html">Grid</a>
                                <ul>
                                    <li><a href="#">Grid 2 columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="#">Masonry 2 columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="#">Blog mask grid</a></li>
                                    <li><a href="#">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>

                            <li><a href="#">About Us</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Elements</a>
                        <ul>
                            <li><a href="#">Products</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="#">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <li>
                                <a href="#">Women</a>
                                <ul>
                                    <li><a href="#">New Arrivals</a>
                                    </li>
                                    <li><a href="#">Best Sellers</a>
                                    </li>
                                    <li><a href="#">Trending</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Accessories</a>
                                    </li>
                                    <li><a href="#">Jewlery &
                                            Watches</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men</a>
                                <ul>
                                    <li><a href="#">New Arrivals</a>
                                    </li>
                                    <li><a href="#">Best Sellers</a>
                                    </li>
                                    <li><a href="#">Trending</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Accessories</a>
                                    </li>
                                    <li><a href="#">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                        <ul>
                            <li>
                                <a href="#">Bedroom</a>
                                <ul>
                                    <li><a href="#">Beds, Frames &
                                            Bases</a></li>
                                    <li><a href="#">Dressers</a></li>
                                    <li><a href="#">Nightstands</a>
                                    </li>
                                    <li><a href="#">Kid's Beds &
                                            Headboards</a></li>
                                    <li><a href="#">Armoires</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Living Room</a>
                                <ul>
                                    <li><a href="#">Coffee Tables</a>
                                    </li>
                                    <li><a href="#">Chairs</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li><a href="#">Futons & Sofa
                                            Beds</a></li>
                                    <li><a href="#">Cabinets &
                                            Chests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office</a>
                                <ul>
                                    <li><a href="#">Office Chairs</a>
                                    </li>
                                    <li><a href="#">Desks</a></li>
                                    <li><a href="#">Bookcases</a></li>
                                    <li><a href="#">File Cabinets</a>
                                    </li>
                                    <li><a href="#">Breakroom
                                            Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kitchen & Dining</a>
                                <ul>
                                    <li><a href="#">Dining Sets</a>
                                    </li>
                                    <li><a href="#">Kitchen Storage
                                            Cabinets</a></li>
                                    <li><a href="#">Bashers Racks</a>
                                    </li>
                                    <li><a href="#">Dining Chairs</a>
                                    </li>
                                    <li><a href="#">Dining Room
                                            Tables</a></li>
                                    <li><a href="#">Bar Stools</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <li>
                                <a href="#">Laptops &amp; Computers</a>
                                <ul>
                                    <li><a href="#">Desktop
                                            Computers</a></li>
                                    <li><a href="#">Monitors</a></li>
                                    <li><a href="#">Laptops</a></li>
                                    <li><a href="#">Hard Drives &amp;
                                            Storage</a></li>
                                    <li><a href="#">Computer
                                            Accessories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">TV &amp; Video</a>
                                <ul>
                                    <li><a href="#">TVs</a></li>
                                    <li><a href="#">Home Audio
                                            Speakers</a></li>
                                    <li><a href="#">Projectors</a></li>
                                    <li><a href="#">Media Streaming
                                            Devices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Cameras</a>
                                <ul>
                                    <li><a href="#">Digital SLR
                                            Cameras</a></li>
                                    <li><a href="#">Sports & Action
                                            Cameras</a></li>
                                    <li><a href="#">Camera Lenses</a>
                                    </li>
                                    <li><a href="#">Photo Printer</a>
                                    </li>
                                    <li><a href="#">Digital Memory
                                            Cards</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Cell Phones</a>
                                <ul>
                                    <li><a href="#">Carrier Phones</a>
                                    </li>
                                    <li><a href="#">Unlocked Phones</a>
                                    </li>
                                    <li><a href="#">Phone & Cellphone
                                            Cases</a></li>
                                    <li><a href="#">Cellphone
                                            Chargers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-furniture"></i>Furniture
                        </a>
                        <ul>
                            <li>
                                <a href="#">Furniture</a>
                                <ul>
                                    <li><a href="#">Sofas & Couches</a>
                                    </li>
                                    <li><a href="#">Armchairs</a></li>
                                    <li><a href="#">Bed Frames</a></li>
                                    <li><a href="#">Beside Tables</a>
                                    </li>
                                    <li><a href="#">Dressing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="#">Lighting</a>
                                <ul>
                                    <li><a href="#">Light Bulbs</a>
                                    </li>
                                    <li><a href="#">Lamps</a></li>
                                    <li><a href="#">Celling Lights</a>
                                    </li>
                                    <li><a href="#">Wall Lights</a>
                                    </li>
                                    <li><a href="#">Bathroom
                                            Lighting</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="#">Home Accessories</a>
                                <ul>
                                    <li><a href="#">Decorative
                                            Accessories</a></li>
                                    <li><a href="#">Candals &
                                            Holders</a></li>
                                    <li><a href="#">Home Fragrance</a>
                                    </li>
                                    <li><a href="#">Mirrors</a></li>
                                    <li><a href="#">Clocks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="#">Garden & Outdoors</a>
                                <ul>
                                    <li><a href="#">Garden
                                            Furniture</a></li>
                                    <li><a href="#">Lawn Mowers</a>
                                    </li>
                                    <li><a href="#">Pressure
                                            Washers</a></li>
                                    <li><a href="#">All Garden
                                            Tools</a></li>
                                    <li><a href="#">Outdoor Dining</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-heartbeat"></i>Healthy & Beauty
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-gift"></i>Gift Ideas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-gamepad"></i>Toy & Games
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-ice-cream"></i>Cooking
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-ios"></i>Smart Phones
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-camera"></i>Cameras & Photo
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="w-icon-ruby"></i>Accessories
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->
<!-- Start of Quick View -->
<div class="product product-single product-popup" id="productPopup">

</div>
<!-- End of Quick view -->

<!-- Plugin JS File -->
<script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/zoom/jquery.zoom.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/skrollr/skrollr.min.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/app.js')}}"></script>
<script src="{{asset('frontend/assets/js/toastr.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.min.js')}}"></script>
</body>
</html>
