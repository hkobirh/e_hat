@extends('frontend.includes.app')
@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.min.css')}}">
@endsection

@section('main-content')
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                    <li class="passed"><a href="{{route('checkout')}}">Checkout</a></li>
                    <li class="active"><a>Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>{{$order->id}}</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>{{$order->order_status}}</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>{{date('F m, Y',strtotime($order->created_at))}}</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>{{$order->amount}}</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>{{$order->pay_method}}</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <a href="{{route('index')}}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To Home</a>
            </div>
        </div>
        <!-- End of PageContent -->

@endsection
