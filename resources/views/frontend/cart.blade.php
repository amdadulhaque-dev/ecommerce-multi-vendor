@extends('layouts.appfrontend')

@section("content")
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

<div class="cart-main-area pt-100px pb-100px">
    <div class="container">

        @if (session("final_succss"))
            <div class="alert alert-success mt-2">
                {{ session("final_succss") }}
            </div>
        @endif

        @if (session("stock_out"))
            <div class="alert alert-danger mt-2">
                {{ session("stock_out") }}
            </div>
        @endif
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>

                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $cart_total = 0;
                                $flag = false;
                            @endphp

                            @if (count(cartlist()) > 0)
                            <tbody>
                                @foreach (cartlist() as $key => $cartitem)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img class="img-responsive ml-15px" src="{{ asset('uploads/product_photos/main_photos/')."/".$cartitem->relationtoproduct->product_photo }}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">
                                            {{ $cartitem->relationtoproduct->product_name }}
                                        </a>
                                        <br>
                                        <a href="#">
                                            Vendor Name:
                                            {{ vendor_name($cartitem->relationtoproduct->vendor_id) }}
                                        </a>
                                        <br>
                                        <a href="#" class="">
                                            Status:
                                            @if ($cartitem->quantity > product_stock($cartitem->relationtoproduct->id))
                                                @php
                                                    $flag = true;
                                                @endphp
                                                <span class="{{ $cartitem->quantity > product_stock($cartitem->relationtoproduct->id) ? "text-danger" : ""}}">
                                                        Stock Out
                                                </span>
                                            @else
                                                Available
                                            @endif
                                        </a>
                                    </td>
                                    <td class="product-price-cart">
                                        <span class="amount">
                                            $ {{ $cartitem->relationtoproduct->product_price }}
                                        </span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                                <input class="test cart-plus-minus-box" type="text" name="product_quantity[{{ $cartitem->id }}]" value="{{ $cartitem->quantity }}">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        $ {{ $cartitem->relationtoproduct->product_price*$cartitem->quantity }}

                                        @php
                                            $cart_total += $cartitem->relationtoproduct->product_price*$cartitem->quantity;
                                        @endphp

                                    </td>
                                    <td class="product-remove">
                                        <a href="{{ route('cart.remove', $cartitem->relationtoproduct->id) }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>

                    @if (count(cartlist()) > 0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{ route('shop') }}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit">Update Shopping Cart</button>
                                        <a href="{{ route('clearshopping.cart') }}">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </form>

                @if (count(cartlist()) > 0)

                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-lm-30px">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" name="coupon_name" value="{{ $coupon_name? "$coupon_name" : ""}}">
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>

                                        @if (session("coupon_err"))
                                            <div class="alert alert-danger mt-2">
                                                {{ session("coupon_err") }}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mt-md-30px">
                                @php
                                    if ($coupon_name) {
                                        Session::put('s_coupon_name', $coupon_name);
                                    }else{
                                        Session::put('s_coupon_name', '');
                                    }
                                    Session::put('s_cart_total', $cart_total);
                                    Session::put('s_discount_total', $discount_total);
                                @endphp
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>
                                        Cart Total
                                        <span>$ {{ $cart_total }}</span>
                                    </h5>
                                    <h5>
                                        Discount Total ({{ $coupon_name? "$coupon_name" : "N/A"}})
                                        <span>$ {{ $discount_total }}</span>
                                    </h5>
                                    <h5>
                                        Sub Total (Approx.)
                                        <span>$<span id="sub_total">{{ round($cart_total-$discount_total) }}</span></span>
                                    </h5>
                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li>
                                                <input id="standard_shipping" type="radio" name="shipping">
                                                Standard
                                                <span>$ <span id="standard_shipping_price">20.00</span></span>
                                            </li>
                                            <li>
                                                <input id="express_shipping" type="radio" name="shipping">
                                                Express
                                                <span>$ <span id="express_shipping_price">30.00</span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">
                                        Grand Total <span>$<span id="grand_totall">
                                            {{ round($cart_total-$discount_total) }}
                                        </span></span>
                                    </h4>

                                    @if ($flag)
                                        <div class="alert alert-danger">
                                            Please remove stock out product first
                                        </div>
                                    @else
                                        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                @else
                    <div class="foot mt-5">
                        <div class="button text-center">
                            <a href="{{ route('shop') }}" class="btn-hover-primary add_list">Add to Cart</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
@section("script_content")
    <script>

        var sub_total = document.getElementById("sub_total").innerHTML;
        document.getElementById("standard_shipping").addEventListener('click', function (event) {
            var standard_shipping = document.getElementById("standard_shipping_price").innerHTML;
            var grand_total_standard = parseInt(sub_total) + parseInt(standard_shipping);
            document.getElementById("grand_totall").innerHTML = grand_total_standard;
        })
        document.getElementById("express_shipping").addEventListener('click', function (event) {
            var express_shipping = document.getElementById("express_shipping_price").innerHTML;
            var grand_total_express = parseInt(sub_total) + parseInt(express_shipping);
            document.getElementById("grand_totall").innerHTML = grand_total_express;
        })


    </script>
@endsection
