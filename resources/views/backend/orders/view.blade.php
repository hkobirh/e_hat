@extends("backend.includes.app")

@section('title', 'Order details')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header border-0">Order info
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Payment method</th>
                            <th>Order status</th>
                            <th>Total amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>{{$data->pay_method == 1 ? 'Cash on delivery':'bCash'}}</th>
                            <th>{{$data->order_status}}</th>
                            <th>{{$data->amount}} &#2547;</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header border-0">Customer info
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>{{$data->customer->name}}</th>
                            <th>{{$data->customer->mobile}}</th>
                            <th>{{$data->customer->email}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header border-0">Billing info
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header border-0">Shipping info
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header border-0">Product info
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
                            <th>SL</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data->order_items as $item)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->product_price}}</td>
                                <td>
                                    {{$item->product_qty}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

