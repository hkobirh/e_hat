<div id="sidebar-wrapper" class="bg-theme bg-theme4" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="#">
            <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Bulona Admin</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse"
             data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img"
                                     src="{{asset('storage/uploads/users/'.auth()->user()->photo)}}" alt="user avatar">
            </div>
            <div class="media-body">
                <h6 class="side-user-name">{{auth()->user()->name}}</h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="icon-settings"></i> Setting</a></li>
                <li><a href="#"><i class="icon-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="{{route('staff.dashboard')}}" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{route('staff.sliders.index')}}" class="waves-effect">
                <i class="fa fa-list"></i><span>Sliders</span>
            </a>
        </li>
        @if(is_permitted('Users','true'))
        <li>
            <a href="{{route('staff.users.index')}}" class="waves-effect">
                <i class="fa fa-list"></i><span>Users</span>
            </a>
        </li>
        @endif

        <li>
            <a href="{{route('staff.brands.index')}}" class="waves-effect">
                <i class="fa fa-list"></i><span>Brands</span>
            </a>
        </li>

        <li>
            <a href="{{route('staff.categories.index')}}" class="waves-effect">
                <i class="fa fa-list"></i><span>Categories</span>
            </a>
        </li>
        <li>
            <a href="{{route('staff.products.index')}}" class="waves-effect">
                <i class="fa fa-list"></i><span>Products</span>
            </a>
        </li>
        @if(is_permitted('Orders','true'))
            <li>
                <a href="{{route('orders.index')}}" class="waves-effect">
                    <i class="fa fa-list"></i><span>Orders</span>
                </a>
            </li>
        @endif
        <li>
            <a href="#" class="waves-effect">
                <i class="fa fa-users"></i> <span>Product</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{route('staff.products.index')}}"><i class="zmdi zmdi-long-arrow-right"></i> Manage product</a></li>
            </ul>
            <ul class="sidebar-submenu">
                <li><a href="{{route('staff.product.reviews')}}"><i class="zmdi zmdi-long-arrow-right"></i> Product Review</a></li>
            </ul>
        </li>
    </ul>
</div>

