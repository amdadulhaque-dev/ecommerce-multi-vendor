<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */

    public function cart () {

        if (isset($_GET['coupon_name'])) {

            if ($_GET['coupon_name']) {

                $coupon_name = $_GET['coupon_name'];

                if (Coupon::where('coupon_name', $coupon_name)->exists()) {

                    $coupon_info = Coupon::where('coupon_name', $coupon_name)->first();

                    if ($coupon_info->limit != 0) {
                        if ($coupon_info->validity < Carbon::today()->format('Y-m-d')) {

                            $discount_total = 0;
                            return redirect('cart')->with('coupon_err', $coupon_name.' Coupon Validity over');

                        }
                        else{
                            $discount_total = (session('s_cart_total')*$coupon_info->discount_percentage)/100;
                        }
                    }else{
                        $discount_total = 0;
                        return redirect('cart')->with('coupon_err', $coupon_name.' Coupon limit is over');
                    }

                }else{
                    $discount_total = 0;
                    return redirect('cart')->with('coupon_err', $coupon_name.' Coupon is not in our records');
                }


            }else{
                $coupon_name = "";
                $discount_total = 0;
            }

        }else{
            $coupon_name = "";
            $discount_total = 0;
        }

        return view("frontend.cart", compact('discount_total','coupon_name'));

    }




    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
    */
    public function cartupdate(Request $request) {

        $number = $request->product_quantity;

        foreach ($number as $key => $product_quantity_number) {
            $product_id = Cart::where('id', $key)->first()->product_id;
            $available_stock = Product::where('id', $product_id)->first()->product_quantity;
            //Already have Quantity
            $already_have_quantity = Cart::where('id', $key)->first()->quantity;
            //Increase Quantity
            $increase_quantity = $product_quantity_number - $already_have_quantity ;


            if ($available_stock == 0) {
                return redirect('cart')->with('stock_out', ' available stock 0');
            }else{
                if ($available_stock < $already_have_quantity+$increase_quantity) {
                    return redirect('cart')->with('stock_out', 'available stock is low');
                }else{
                    Cart::find($key)->update([
                        'quantity' => $product_quantity_number,
                    ]);

                }
            }

        }
        return  back();

    }


    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
    */
    public function clearshoppingcart() {
        Cart::where('user_id', auth()->id())->delete();
        return back();
    }


    public function add (Request $request, $product_id) {

        $vendor_id = Product::where('id', $product_id)->first()->vendor_id;
        $available_stock = Product::find($product_id)->product_quantity;
        $input_quantity = $request->product_quantity? "$request->product_quantity" : "1";

        if ($available_stock < $input_quantity ) {
            return back()->with('stockout', 'Stock Out');
        }

        if (Cart::where('product_id', $product_id)->where('user_id', auth()->id())->exists()) {

            $available_stock_on_cartlist = Cart::where('product_id', $product_id)->where('user_id', auth()->id())->first()->quantity;

            if ($available_stock < $input_quantity + $available_stock_on_cartlist ) {
                return back()->with('already_in', 'Available for your cart : '.$available_stock-$available_stock_on_cartlist.'');
            }else{
                Cart::where('product_id', $product_id)->where('user_id', auth()->id())->increment('quantity', $input_quantity);
            }

        }
        else{
            Cart::insert([
                'user_id' => auth()->id(),
                'product_id' => $product_id,
                'vendor_id' => $vendor_id,
                'quantity' => $input_quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        if (WishList::where('product_id', $product_id)->where('user_id', auth()->id())->exists()) {
            WishList::where('product_id', $product_id)->where('user_id', auth()->id())->delete();
        }

        return back();

    }

    public function remove($product_id) {

        Cart::where('product_id', $product_id)->where('user_id', auth()->id())->delete();
        return back();

    }


}
