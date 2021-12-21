<style>
    .is-invalid{
        border: 1px solid red !important;
    }
</style>
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


    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">

            <form action="{{ route('place.checkout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>First Name</label>
                                        <input name="name" class="@error('name') is-invalid @enderror" type="text"  value="{{ auth()->user()->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input name="phone_number" class="@error('phone_number') is-invalid @enderror" type="number"  value="{{ auth()->user()->phone_number }}">
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>Country</label>
                                        <select name="country_name" id="drop_down" class="city_dropdown @error('country_name') is-invalid @enderror">
                                            <option>--Select a Country--</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>City Name</label>
                                        <select name="city_name" id="city_name" disabled class="@error('city_name') is-invalid @enderror">
                                            <option value="">--Please Select Country First--</option>
                                        </select>
                                        @error('city_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input name="street_address" class="billing-address @error('street_address') is-invalid @enderror" placeholder="street Address" type="text" >
                                        @error('street_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input name="postcode" type="number"  class="@error('postcode') is-invalid @enderror">
                                        @error('postcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email Address (Optional)</label>
                                        <input name="email" type="email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>

                            </div>

                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional-info">
                                    <label>Order notes</label>
                                    <textarea name="order_notes" placeholder="Notes about your order ... "></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach (cartlist() as $key => $cartitem)
                                                <li>
                                                    <span class="order-middle-left">{{ $cartitem->relationtoproduct->product_name }} X {{ $cartitem->quantity }}</span>
                                                    <span class="order-price">$ {{ $cartitem->relationtoproduct->product_price*$cartitem->quantity }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Cart Total</li>
                                            <li>$ {{ Session::get('s_cart_total') }}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Discount Total ({{ Session::get('s_coupon_name') }})</li>
                                            <li>$ {{ Session::get('s_discount_total') }}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Sub Total (Approx.)</li>
                                            <li>$ {{ round(Session::get('s_cart_total')-Session::get('s_discount_total')) }}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>Free Shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li>$ {{ round(Session::get('s_cart_total')-Session::get('s_discount_total')) }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">

                                            <select name="payment_method" class="form-control">
                                                <option>-- Please Select Country First --</option>
                                                <option value="1">Cash On Delivery</option>
                                                <option value="2">Online</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="Place-order mt-25">
                                <input class="btn btn-danger" type="submit" value="Place Order">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout area end -->


@endsection
@section("script_content")
    <script>
        $(document).ready(function() {
            $('#drop_down').change(function(){
                var country_id = $(this).val();
                $("#city_name").attr('disabled', false)


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'/get/city/list',
                    data: {country_id:country_id},
                    success: function(data){
                        $('#city_name').html(data);
                    }
                });


            })
        });
    </script>
@endsection
