@extends('layouts.appfrontend')

@section("content")

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Products</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            <!-- product zoom image loop -->
                            @foreach (App\Models\ProductImage::where('product_id', $single_product_info->id)->get() as $product_zoom_photo)
                                <div class="swiper-slide zoom-image-hover">
                                    <img class="img-responsive m-auto" src="{{ asset('uploads/product_photos/product_zoom_photos') }}/{{ $product_zoom_photo->product_zoom_photo }}" alt="">
                                </div>
                             @endforeach
                            <!--/ product zoom image loop -->
                        </div>
                    </div>
                    <div class="swiper-container zoom-thumbs mt-3 mb-3">
                        <div class="swiper-wrapper">
                            <!-- product zoom thumbs image loop -->
                            @foreach (App\Models\ProductImage::where('product_id', $single_product_info->id)->get() as $product_thumbnail_photo)
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{ asset('uploads/product_photos/product_thumbnail_photos') }}/{{ $product_thumbnail_photo->product_thumbnail_photo }}" alt="">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $single_product_info->product_name }}</h2>
                        <h5>Available Stock: <span class="{{ session('stockout')? "text-danger":"" }}">{{ session('stockout')? session('stockout') : $single_product_info->product_quantity }}</span> </h5>
                        <h6 class="{{ session('already_in')? "text-danger":"" }}">{{ session('already_in')? session('already_in') : "" }}</h6>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">${{ $single_product_info->product_price }}</li>
                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="read-review">
                                <a class="reviews" href="#">( 5 Customer Review )</a>
                            </span>
                        </div>
                        <p class="mt-30px mb-0">
                           {{ $single_product_info->product_short_description }}
                        </p>


                        <div class="pro-details-quality">
                            @auth
                                <form class="d-contents" action="{{ route('cart.add', $single_product_info->id) }}" method="POST">
                                    @csrf
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="product_quantity" value="1" />
                                    </div>
                                    <div class="pro-details-cart">
                                        <button type="submit" class="add-cart">
                                            Add To Cart
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="product_quantity" value="1" />
                                </div>
                                <div class="pro-details-cart">
                                    <button type="submit" class="add-cart" data-bs-toggle="modal" data-bs-target="#loginActive">
                                        Add To Cart
                                    </button>
                                </div>
                            @endauth

                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                @auth
                                    @if (wishlist_status($single_product_info->id))
                                        <a href="{{ route('wishlist.remove', $single_product_info->id) }}" class="action wishlist" title="Wishlist">
                                            <i class="fa fa-heart text-danger"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('wishlist.add', $single_product_info->id) }}" class="action wishlist" title="Wishlist">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    @endif
                                @endauth
                                @guest
                                    <a href="" class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#loginActive">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                @endguest
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-compare">
                                <a href="compare.html">
                                    <i class="pe-7s-refresh-2"></i>
                                </a>
                            </div>

                        </div>
                        <div class="pro-details-sku-info pro-details-same-style  d-flex">
                            <span>SKU: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $single_product_info->product_code }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Categories: </span>
                            <ul class="d-flex">
                                <li>
                                    {{-- <a target="_blank" class="upwork_btn" href="https://www.upwork.com/freelancers/~01d189ad8440c5dcdd?viewMode=1" target="_blank">Upwork</a> --}}
                                    <a href="{{ route('categorywiseproducts', $single_product_info->category_id) }}">
                                       {{ $single_product_info->relationtocategory->category_name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u={{ url()->full() }}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details2">Information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper text-start">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>

                                Lorem ipsum dolor sit amet, consectetur adipisi elit, incididunt ut labore et. Ut enim
                                ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commol
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste
                                natus error sit voluptatem accusantiulo doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                explicabo. Nemo enim ipsam voluptat quia voluptas sit aspernatur aut odit aut fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                                quia non numquam eius modi tempora incidunt ut labore

                            </p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="{{ asset('frontend') }}/assets/images/review-image/1.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review child-review">
                                        <div class="review-img">
                                            <img src="{{ asset('frontend') }}/assets/images/review-image/2.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Email" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="Message"></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->


    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">

                    @foreach ($related_products as $related_product)
                        <div class="new-product-item swiper-slide">
                            <!-- Single Prodect -->
                            <div class="product">
                                <div class="thumb">
                                    <a href="single-product.html" class="image">
                                        <img src="{{ asset('frontend') }}/assets/images/product-image/10.jpg" alt="Product" />
                                        <img class="hover-image" src="{{ asset('frontend') }}/assets/images/product-image/6.jpg" alt="Product" />
                                    </a>
                                    <span class="badges">
                                        <span class="new">New</span>
                                    </span>
                                    <div class="actions">

                                        @auth
                                            @if (wishlist_status($single_product_info->id))
                                                <a href="{{ route('wishlist.remove', $wishList_id) }}" class="action wishlist" title="Wishlist">
                                                    <i class="fa fa-heart text-danger"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('wishlist.add', $single_product_info->id) }}" class="action wishlist" title="Wishlist">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            @endif
                                        @endauth
                                        @guest
                                            <a href="" class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#loginActive">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        @endguest
                                        <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                        <a href="compare.html" class="action compare" title="Compare">
                                            <i class="pe-7s-refresh-2"></i>
                                        </a>
                                    </div>
                                    <button title="Add To Cart" class=" add-to-cart">
                                        Add To Cart
                                    </button>
                                </div>
                                <div class="content">
                                    <span class="ratings">
                                        <span class="rating-wrap">
                                            <span class="star" style="width: 100%"></span>
                                        </span>
                                        <span class="rating-num">( 5 Review )</span>
                                    </span>
                                    <h5 class="title">
                                        <a href="{{ url('product/details') }}/{{ $related_product->product_slug }}">
                                            {{ $related_product->product_name }}
                                        </a>
                                    </h5>
                                    <span class="price">
                                        <span class="new">${{ $related_product->product_price }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related product Area End -->

    @endsection
