<?php
function wishlist () {
   return App\Models\WishList::where('user_id', auth()->id())->get();
};

function cartlist () {
    return App\Models\Cart::where('user_id', auth()->id())->get();
 };


function wishlist_status($product_id) {
    return App\Models\WishList::where('user_id', auth()->id())->where('product_id', $product_id)->exists();
}

function vendor_name($vendor_id) {
    return App\Models\User::where('id', $vendor_id)->first()->name;
}

function product_stock($product_id) {
    return App\Models\Product::where('id', $product_id)->first()->product_quantity;
}

