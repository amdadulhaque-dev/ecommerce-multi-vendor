<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view("product.index",[
            'products' => Product::where('vendor_id', Auth()->id())->get(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {
        //
        return view("product.create", [
            'active_categories' => Category::where('hide/show', 'show')->where('status', 1)->get(),
        ]);
    }















    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $slug = Str::slug($request->product_name)."-".Str::random(5)."-".Auth()->id();

        $request->validate([
            'product_category_id' => 'required',
        ]);


        //Upload New Photo
        $product_photo_images_extension = $request->file('product_photo')->getClientOriginalExtension();
        $product_photo_name = Str::replace(' ', '-', $request->product_name)."-".Str::random(5).".".$product_photo_images_extension;
        //Make Image
        $img = Image::make($request->file('product_photo'));
        //Save Image
        $img->resize(270, 310)->save(base_path('public/uploads/product_photos/main_photos/'. Str::lower($product_photo_name)));


        $product_id = Product::insertGetId([
            "vendor_id" => Auth()->id(),
            "category_id" => $request->product_category_id,
            "product_name" => $request->product_name,
            "product_price" => $request->product_price,
            "product_code" => $request->product_code,
            "product_short_description" => $request->product_short_description,
            "product_long_description" => $request->product_long_description,
            "product_photo" => Str::lower($product_photo_name),
            "product_slug" => $slug,
            "product_quantity" => $request->product_quantity,
            "created_at" => Carbon::now(),
        ]);

        // Product Images Uploaded

            foreach ($request->file('product_zoom_photos') as $product_zoom_photo) {

                $product_zoom_photo_extension = $product_zoom_photo->getClientOriginalExtension();
                $product_zoom_photo_photo_name = $product_id."-".Str::replace(' ', '-', $request->product_name)."-"."zoom"."-".Str::random(5).".".$product_zoom_photo_extension;

                //Make Image
                $img = Image::make($product_zoom_photo);
                //Save Image
                $img->resize(800, 800)->save(base_path('public/uploads/product_photos/product_zoom_photos/'. Str::lower($product_zoom_photo_photo_name)));



                ProductImage::insert([
                    'product_id' => $product_id,
                    'product_zoom_photo' => $product_zoom_photo_photo_name,
                    'created_at' => Carbon::now()
                ]);

            };



        return back();

    }






    /**
     * Display the specified resource.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        //
    }




    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        //
    }




    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Product $product) {
        //
    }






    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product) {
        //
    }




}
