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
                <li class="active"><a>Checkout</a></li>
                <li><a>Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="coupon-toggle">
                Have a coupon? <a href="#"
                                  class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                    code</a>
            </div>
            <div class="coupon-content mb-4">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2"
                           placeholder="Coupon code" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon"
                            value="Apply coupon">Apply Coupon
                    </button>
                </div>
            </div>


            <form class="form checkout-form" action="{{route('checkout')}}" method="post">
                @csrf
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-md" name="firstname"
                                           required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Last name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-md" name="lastname"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Country <span style="color:red;">*</span></label>
                            <select name="country" class="form-control form-control-md">
                                <option value="bn" selected="selected">Bangledesh</option>
                                <option value="us">United States</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Street address <span style="color:red;">*</span></label>
                            <input type="text" placeholder="House number and street name"
                                   class="form-control form-control-md mb-2" name="address" required>
                        </div>
                        <div class="form-group">
                            <label>Phone <span style="color:red;">*</span></label>
                            <input type="text" placeholder="Phone number"
                                   class="form-control form-control-md mb-2" name="mobile" required>
                        </div>

                        <div class="form-group checkbox-toggle pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                   name="shipping-toggle">
                            <label for="shipping-toggle">Ship to a different address?</label>
                        </div>
                        <div class="checkbox-content">
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-md" name="s_firstname"
                                        >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-md" name="s_lastname"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Country <span style="color:red;">*</span></label>
                                <select name="s_country" class="form-control form-control-md">
                                    <option value="bn" selected="selected">Bangledesh</option>
                                    <option value="us">United States</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Street address <span style="color:red;">*</span></label>
                                <input type="text" placeholder="House number and street name"
                                       class="form-control form-control-md mb-2" name="s_address">
                            </div>
                            <div class="form-group">
                                <label>Phone <span style="color:red;">*</span></label>
                                <input type="text" placeholder="Phone number"
                                       class="form-control form-control-md mb-2" name="s_mobile">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="order-notes">Order notes (optional)</label>
                            <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30"
                                      rows="4"
                                      placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            <b>Product</b>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr class="bb-no">
                                            <td class="product-name">{{$item->name}} <i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{$item->quantity}}</span></td>
                                            <td class="product-total">&#2547; {{$item->price * $item->quantity}}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="cart-subtotal bb-no">
                                        <td>
                                            <b>Subtotal</b>
                                        </td>
                                        <td>
                                            <b> {{Cart::getSubtotal()}} &#2547;</b>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="shipping-methods">
                                        <td colspan="2" class="text-left">
                                            <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping method
                                            </h4>
                                            <ul id="shipping-method" class="mb-4">
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="local-pick"
                                                               class="custom-control-input" name="shipping_type"
                                                               value="1" required>
                                                        <label for="local-pick"
                                                               class="custom-control-label color-dark">Local
                                                            pickup</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="free-shipping"
                                                               class="custom-control-input" name="shipping_type"
                                                               value="2" required>
                                                        <label for="free-shipping"
                                                               class="custom-control-label color-dark">Free
                                                            shipping</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="flate-rate"
                                                               class="custom-control-input" name="shipping_type"
                                                               value="3" required>
                                                        <label for="flate-rate"
                                                               class="custom-control-label color-dark">Flat rate: 50
                                                            Taka</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>
                                            <b>Total</b>
                                        </th>
                                        <td>
                                            <b>{{Cart::getSubtotal()}} &#2547;</b>
                                        </td>
                                    </tr>

                                    <tr class="shipping-methods">
                                        <td colspan="2" class="text-left">
                                            <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Payment method
                                            </h4>
                                            <ul id="shipping-method" class="mb-4">
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="cash"
                                                               class="custom-control-input" value="1" name="pay_method"
                                                               required>
                                                        <label for="cash"
                                                               class="custom-control-label color-dark">Cash on
                                                            delivery</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="online"
                                                               class="custom-control-input" value="2" name="pay_method"
                                                               required>
                                                        <label for="online"
                                                               class="custom-control-label color-dark">Bkash</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                    </tfoot>
                                </table>
                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <!-- End of PageContent -->
@endsection
