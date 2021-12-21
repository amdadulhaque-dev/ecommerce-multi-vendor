<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponForm;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */
    public function index() {

    }




    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {
        return view("coupon.create");
    }







    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(CouponForm $request) {

        Coupon::insert($request->except('_token')+[
            'created_at' => Carbon::now(),
        ]);
        return back();
    }








    /**
     * Display the specified resource.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
    */
    public function show(Coupon $coupon) {

    }








    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
    */
    public function edit(Coupon $coupon) {

    }







    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Coupon $coupon) {

    }





    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
    */
    public function destroy(Coupon $coupon) {

    }




}
