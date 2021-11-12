@extends('backend.includes.app')
@section('title','Dashboard')
@section('main-content')
<h3>{{ __('my-alert.message') }}</h3>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-deepblue">
                <div class="card-body">
                    <h5 class="text-white mb-0">9526 <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-orange">
                <div class="card-body">
                    <h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <h5 class="text-white mb-0">6200 <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ibiza">
                <div class="card-body">
                    <h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header border-0">Recent Order Tables
                    <div class="card-action">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                <i class="icon-options"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Completion</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/01.png')}}" class="product-img">
                            </td>
                            <td>Headphone GL</td>
                            <td>$1,840 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-danger"></i> pending
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 60%"></div>
                                </div>
                            </td>
                            <td>10 July 2018</td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/02.png')}}" class="product-img">
                            </td>
                            <td>Clasic Shoes</td>
                            <td>$1,520 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-success"></i> completed
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                                </div>
                            </td>
                            <td>12 July 2018</td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/03.png')}}" class="product-img">
                            </td>
                            <td>Hand Watch</td>
                            <td>$1,620 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-warning"></i> delayed
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-orange" role="progressbar" style="width: 70%"></div>
                                </div>
                            </td>
                            <td>14 July 2018</td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/04.png')}}" class="product-img">
                            </td>
                            <td>Hand Camera</td>
                            <td>$2,220 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-info"></i> on schedule
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-scooter" role="progressbar" style="width: 85%"></div>
                                </div>
                            </td>
                            <td>16 July 2018</td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/05.png')}}" class="product-img">
                            </td>
                            <td>Iphone-X Pro</td>
                            <td>$9,890 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-success"></i> completed
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                                </div>
                            </td>
                            <td>17 July 2018</td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="Image placeholder" src="{{asset('backend/assets/images/products/06.png')}}" class="product-img">
                            </td>
                            <td>Ladies Purse</td>
                            <td>$3,420 USD</td>
                            <td>
                      <span class="badge-dot">
                        <i class="bg-danger"></i> pending
                      </span>
                            </td>
                            <td>
                                <div class="progress shadow" style="height: 4px;">
                                    <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 80%"></div>
                                </div>
                            </td>
                            <td>18 July 2018</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div><!--End Row-->
@endsection
