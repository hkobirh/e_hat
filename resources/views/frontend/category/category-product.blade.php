@extends("frontend.includes.app")

@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.min.css') }}">
@endsection

@section('main-content')

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li>Fullwidth</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content mb-10">
    <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
         style="background-image: url(#); background-color: #FFC74E;">
        <div class="container banner-content">
            <h4 class="banner-subtitle font-weight-bold">{{$root_category->name}}</h4>
            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">{{$category->name}}</h3>
            <a href="#" class="btn btn-dark btn-rounded btn-icon-right">Discover
                Now<i class="w-icon-long-arrow-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Start of Shop Content -->
        <div class="shop-content">
            <!-- Start of Shop Main Content -->
            <div class="main-content">
                <nav class="toolbox sticky-toolbox sticky-content fix-top cat-product-filter-bar">
                    <div class="toolbox-left">
                        <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left"><i class="w-icon-category"></i><span>Filters</span></a>
                        <div class="toolbox-item toolbox-sort select-box text-dark">
                            <label>Sort By :</label>
                            <select class="form-control order-by">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price-low">Sort by pric: low to high</option>
                                <option value="price-high">Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show select-box">
                            <select name="limit" class="form-control product-limit">
                                <option value="3">Show 3</option>
                                <option value="4">Show 4</option>
                                <option value="6">Show 6</option>
                                <option value="12">Show 12</option>
                                <option value="18" selected>Show 18</option>
                                <option value="24">Show 24</option>
                                <option value="36">Show 36</option>
                            </select>
                        </div>
                        <div class="toolbox-item toolbox-layout">
                            <a href="#" class="icon-mode-grid btn-layout active">
                                <i class="w-icon-grid"></i>
                            </a>
                            <a href="#" class="icon-mode-list btn-layout">
                                <i class="w-icon-list"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="product-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2" id="frontend-product" data-url="{{route('category.products',[$root_category->slug,$category->slug])}}">
                    @include('frontend.category.data')
                </div>
            </div>
            <!-- End of Shop Main Content -->

            <!-- Start of Sidebar, Shop Sidebar -->

            <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
                <!-- Start of Sidebar Overlay -->
                <div class="sidebar-overlay"></div>
                <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                <!-- Start of Sidebar Content -->
                <div class="sidebar-content scrollable">
                    <div class="filter-actions">
                        <label>Filter :</label>
                        <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                    </div>
                    <!-- Start of Collapsible widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>All Categories</span><span class="toggle-btn"></span></h3>
                        <ul class="widget-body filter-items search-ul">
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Babies</a></li>
                            <li><a href="#">Beauty</a></li>
                            <li><a href="#">Decoration</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Furniture</a></li>
                            <li><a href="#">Kitchen</a></li>
                            <li><a href="#">Medical</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Watches</a></li>
                        </ul>
                    </div>
                    <!-- End of Collapsible Widget -->

                    <!-- Start of Collapsible Widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Price</span><span class="toggle-btn"></span></h3>
                        <div class="widget-body">
                            <form class="price-range">
                                <input type="number" class="min_price text-center" placeholder="&#2547; - min">
                                <span class="delimiter">-</span>
                                <input type="number" class="max_price text-center" placeholder="&#2547; - max">
                                <button type="submit" class="btn btn-primary btn-rounded" id="priceFilter">Go</button>
                            </form>
                        </div>
                    </div>
                    <!-- End of Collapsible Widget -->

                    <!-- Start of Collapsible Widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Size</span><span class="toggle-btn"></span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                            <li><a href="#">Extra Large</a></li>
                            <li><a href="#">Large</a></li>
                            <li><a href="#">Medium</a></li>
                            <li><a href="#">Small</a></li>
                        </ul>
                    </div>
                    <!-- End of Collapsible Widget -->

                    <!-- Start of Collapsible Widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Brand</span><span class="toggle-btn"></span></h3>
                        <ul class="widget-body filter-items item-check mt-1 brand-filter">
                            @foreach($brands as $brand)
                                <li data-brand="{{$brand->id}}"><a href="#">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End of Collapsible Widget -->

                    <!-- Start of Collapsible Widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Color</span><span class="toggle-btn"></span></h3>
                        <ul class="widget-body filter-items item-check">
                            <li><a href="#">Black</a></li>
                            <li><a href="#">Blue</a></li>
                            <li><a href="#">Brown</a></li>
                            <li><a href="#">Green</a></li>
                            <li><a href="#">Grey</a></li>
                            <li><a href="#">Orange</a></li>
                            <li><a href="#">Yellow</a></li>
                        </ul>
                    </div>
                    <!-- End of Collapsible Widget -->
                </div>
                <!-- End of Sidebar Content -->
            </aside>

            <!-- End of Shop Sidebar -->
        </div>
        <!-- End of Shop Content -->
    </div>


    <!--End of Catainer -->
   </div>

@endsection
