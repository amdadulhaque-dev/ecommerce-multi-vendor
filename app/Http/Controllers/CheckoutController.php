<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Order_summery;
use Carbon\Carbon;
use App\Models\Billing_details;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function checkout() {
        if (strpos(url()->previous(), "cart") || strpos(url()->previous() ,"checkout") ) {
            return view("frontend.checkout",[
                'countries' => Country::where('service_status', "Active")->get(['id','name','service_status']),
            ]);
        }else{
            return view("errors.404");
        }
    }



    public function getcitylist(Request $request) {
        $city_info = City::where('country_id', $request->country_id)->where('service_status','Active')->get(['id','name']);

        $full_data = "<option>--Select a City--</option>";
        foreach ($city_info as $key => $city) {
            $full_data .= "<option value='$city->id'>$city->name</option>";
        }
        return $full_data;
    }



    public function place_checkout(Request $request) {
        $request->validate([
            "*" => "required",
            "order_notes" => "nullable",
        ]);

        $order_summery_id = Order_summery::insertGetId([
            'user_id' => Auth()->id(),
            'cart_total' => session('s_cart_total'),
            'coupon_name' => session('s_coupon_name'),
            'discount_total' => session('s_discount_total'),
            'sub_total' => round(session('s_cart_total')-session('s_discount_total')),
            'shipping' => 30,
            'grand_total' => round(session('s_cart_total')-session('s_discount_total'))+30,
            'payment_option' => $request->payment_method,
            'payment_status' => 0,
            'created_at' => Carbon::now(),
        ]);


        Billing_details::insert([
            'order_summery_id' => $order_summery_id,
            'name' => $request->name,
            'email' => $request->name,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_name,
            'city_id' => $request->city_name,
            'address' => $request->street_address,
            'postcode' => $request->postcode,
            'notes' => $request->order_notes,
            'created_at' => Carbon::now(),
        ]);

        foreach (cartlist() as $cart) {
            Order_detail::insert([
                'order_summery_id' => $order_summery_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'product_quantity' => $cart->quantity,
            ]);

            Product::find($cart->product_id)->decrement('product_quantity', $cart->quantity);
            Cart::find($cart->id)->delete();

        }

        if (session('s_coupon_name')) {
            Coupon::where('coupon_name', session('s_coupon_name'))->decrement('limit', 1);
        }
        return redirect('cart')->with('final_succss', 'Purchase Completed succssfully');

        if ($request->payment_method == 1) {

        }else{
            echo "online";
        }


    }





}

