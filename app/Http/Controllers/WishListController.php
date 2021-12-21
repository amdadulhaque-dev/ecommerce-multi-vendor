<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishListController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */
    public function index() {

        return view('frontend.wishlist');
    }



    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {
        //
        echo "create";
    }



    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        //
        echo "store";
    }



    /**
     * Display the specified resource.
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
    */
    public function show(WishList $wishList) {
        //
        echo "show";
    }


    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
    */
    public function edit(WishList $wishList) {
        //
        echo "edit";
    }




    /**
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, WishList $wishList) {
        //
        echo "update";
    }



    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
    */
    public function destroy(WishList  $wishList) {
        //
        // return $product_id;
    }

    public function add($product_id) {

        if (!WishList::where('product_id', $product_id)->exists()) {
            WishList::insert([
                'user_id' => auth()->id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }

    public function remove($product_id) {

        WishList::where('product_id', $product_id)->where('user_id', auth()->id())->delete();

        return back();
    }

}
