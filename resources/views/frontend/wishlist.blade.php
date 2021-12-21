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
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Wishlist Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your Wishlist items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive cart-table-content">

                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Add To Cart</th>
                                    </tr>
                                </thead>
                                @if (count(wishlist()) > 0)
                                    <tbody>
                                        @foreach (wishlist() as $wish)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img class="img-responsive ml-15px" src="{{ asset('uploads/product_photos/main_photos')."/".$wish->relationtoproduct->product_photo }}" alt="" />
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="#">{{ $wish->relationtoproduct->product_name }}</a>
                                                </td>
                                                <td class="product-price-cart">
                                                    <span class="amount">$ {{ $wish->relationtoproduct->product_price }}</span>
                                                </td>
                                                <td class="product-wishlist-cart">
                                                    <form action="{{ route('cart.add', $wish->relationtoproduct->id ) }}" method="POST">
                                                        @csrf
                                                        {{-- <input class="cart-plus-minus-box" type="text" name="product_quantity" value="1" /> --}}
                                                        <button type="submit">add to cart</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                @endif
                            </table>

                            @if (count(wishlist()) <= 0)
                                <div class="foot mt-5">
                                    <div class="button text-center">
                                        <a href="{{ route('shop') }}" class="btn-hover-primary add_list">Add Wishlist</a>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Area End -->

    @endsection
