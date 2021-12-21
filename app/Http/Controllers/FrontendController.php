<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;

class FrontendController extends Controller {
    //
    public function index() {
        // Category
        if (Category::where('status', 'show')->count() == 0) {
            $categories =  Category::latest()->limit(3)->get();
        }
        else{
            $categories = Category::where('status', 'show')->get();
        }
        // Product
        $allproduct = Product::all();

        // Index Page
        return view("frontend.index", compact('categories','allproduct'));
    }

    // Product Details
    public function ProductDetails($slug) {


        // $wishlist_status = WishList::where('user_id', auth()->id())->where('product_id', Product::where('product_slug', $slug)->first()->id)->exists();
        $wishList_id = WishList::where('user_id', auth()->id())->where('product_id', Product::where('product_slug', $slug)->first()->id)->first();

        return view("frontend.singleproduct",[
            'single_product_info' => Product::where('product_slug', $slug)->firstOrFail(),
            'related_products' => Product::where('product_slug', '!=' , $slug)->where('category_id', Product::where('product_slug', $slug)->firstOrFail()->category_id)->get(),
            // 'wishlist_status' => $wishlist_status,
            'wishList_id' => $wishList_id,
        ]);

    }

    // Category Wise Product Details
    public function CategoryWiseProduct($category_id) {

        return view('frontend.categorywiseproduct',[
            'all_product' => Product::all(),
            'category_info' => Category::find($category_id),
            'product_list' => Product::where('category_id', $category_id)->get(),
        ]);
    }


    // Category Wise Product Details
    public function shop() {

        return view('frontend.shop',[
            'shops' => Product::all(),
        ]);

    }



}
