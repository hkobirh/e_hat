@extends('frontend.includes.app')
@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.min.css')}}">
@endsection

@section('main-content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                <li><a href="{{route('checkout')}}">Checkout</a></li>
                <li><a>Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-12 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-quantity"><span>Quantity</span></th>
                            <th class="product-subtotal"><span>Subtotal</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (Cart::getContent() as $item)

                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{route('single.product', $item->attributes->slug)}}" target="_blank">
                                            <figure>
                                                <img src="{{$item->attributes->image}}" alt="product"
                                                     width="300" height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" class="btn btn-close" id="btnClose"
                                                data-url="{{route('cart.remove',$item->id)}}"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{route('single.product', $item->attributes->slug)}}" target="_blank">
                                        {{$item->name}}
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">&#2547; {{$item->price}}</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input class="form-control" value="{{$item->quantity}}" type="number" min="1"
                                               max="100000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">&#2547; {{$item->price * $item->quantity}}</span>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>



                    <div class="cart-action mb-6 justify-content-between d-flex mt-2">
                            <div><h3>Total price :</h3></div>
                            <div class="mr-10"><h3> = {{Cart::getSubtotal()}} &#2547;</h3></div>
                    </div>
                    <div class="cart-action mb-6 justify-content-between d-flex mt-2">
                        <div>
                            <a href="{{ route('index') }}"
                               class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear"
                                    data-url="{{route('cart.clear')}}">Clear Cart
                            </button>
                            <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart"
                                    value="Update Cart">Update Cart
                            </button>
                            <a href="{{ route('checkout') }}"
                               class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto">Checkout <i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->

@endsection
