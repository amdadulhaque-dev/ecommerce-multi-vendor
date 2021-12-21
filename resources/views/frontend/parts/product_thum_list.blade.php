<div class="shop-list-wrapper">
    <div class="row">
        <div class="col-md-5 col-lg-5 col-xl-4">
            <div class="product">
                <div class="thumb">
                    <a href="single-product.html" class="image">
                        <img src="{{ asset('uploads/product_photos/main_photos/') }}/{{ $product->product_photo }}" alt="Product" />
                    </a>
                    <span class="badges">
                        <span class="new">New</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-7 col-xl-8">
            <div class="content-desc-wrap">
                <div class="content">
                    <span class="ratings">
                        <span class="rating-wrap">
                            <span class="star" style="width: 100%"></span>
                        </span>
                        <span class="rating-num">( 5 Review )</span>
                    </span>
                    <h5 class="title">
                        <a href="{{ url('product/details') }}/{{ $product->product_slug }}">{{ $product->product_name }}</a>
                    </h5>
                    <p>
                        More room to move.With 80GB or 160GB of storage and up to
                        40 hours of battery life, the new iPod classic lets you
                        enjoy up to 40,000 songs or..
                    </p>
                </div>
                <div class="box-inner">
                    <span class="price">
                        <span class="new">$ {{ $product->product_price }}</span>
                    </span>
                    <div class="actions">
                        @auth
                            @if (wishlist_status($product->id))
                                <a href="{{ route('wishlist.remove', $product->id) }}" class="action wishlist" title="Wishlist">
                                    <i class="fa fa-heart text-danger"></i>
                                </a>
                            @else
                                <a href="{{ route('wishlist.add', $product->id) }}" class="action wishlist" title="Wishlist">
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


                    @auth
                        <form class="d-contents" action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="pro-details-cart">
                                <button type="submit"  class="add-to-cart">
                                    Add To Cart
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="pro-details-cart">
                            <button type="submit" title="Add To Cart" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#loginActive">
                                Add To Cart
                            </button>
                        </div>
                    @endauth

                    {{-- <button title="Add To Cart" class="add-to-cart">
                        Add To Cart
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
