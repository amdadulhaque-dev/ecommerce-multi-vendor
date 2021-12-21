<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;



class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */

    public function index() {
        return view("category.index", [
            "categories" => Category::all(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {
        //
        return view("category.create");
    }



    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required',
            'category_tagline' => 'required',
            'category_photo' => 'required|image',
        ]);

        $category_photo_images_extension = $request->file('category_photo')->getClientOriginalExtension();

        $category_photo_name = Str::replace(' ', '-', $request->category_name)."-".Str::random(5).".".$category_photo_images_extension;

        //Make Image
        $img = Image::make($request->file('category_photo'));
        //Save Image
        $img->resize(600, 328)->save(base_path('public/uploads/category_photo/' . Str::lower($category_photo_name)));

        Category::insert([
            'category_name' => $request->category_name,
            'category_tagline' => $request->category_tagline,
            'category_photo' => Str::lower($category_photo_name),
            'created_at' => Carbon::now(),
        ]);

        return back();
    }



    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        //
    }



    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        return view("category.edit",[
            "categories" => Category::find($id),
        ]);
    }



    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {


        if ($request->hasFile('new_category_photo')) {
            //Delete Old Photo
            unlink(base_path('public/uploads/category_photo/'.Category::find($id)->category_photo));
            //Upload New Photo
            $category_photo_images_extension = $request->file('new_category_photo')->getClientOriginalExtension();
            $category_photo_name = Str::replace(' ', '-', $request->category_name)."-".Str::random(5).".".$category_photo_images_extension;
            //Make Image
            $img = Image::make($request->file('new_category_photo'));
            //Save Image
            $img->resize(600, 328)->save(base_path('public/uploads/category_photo/'. Str::lower($category_photo_name)));

            Category::find($id)->update([
                'category_photo' => Str::lower($category_photo_name)
            ]);
        }
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'category_tagline' => $request->category_tagline,
            'status' => $request->category_status,
        ]);

        return back();
    }



    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $category = Category::find($id);
        unlink(base_path('public/uploads/category_photo/'.$category->category_photo));
        $category->delete();
        return back();
    }


}
