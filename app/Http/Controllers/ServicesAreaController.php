<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class ServicesAreaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */
    public function index() {
        //
    }








    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view("servicesarea.create",[
            "country_name" => Country::all(),
            "cities" => City::where("country_id", "19")->get(),
        ]);

    }






    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {}







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
        //
    }









    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatearea(Request $request) {



        Country::where('service_status','Active')->update([
            "service_status" => "dective"
        ]);


        foreach ($request->countries as $key => $country_id) {
            Country::find($country_id)->update([
                "service_status" => "Active"
            ]);
        }

        City::where('service_status','Active')->update([
            "service_status" => "dective"
        ]);

        foreach ($request->cities as $key => $city_id) {
            City::find($city_id)->update([
                "service_status" => "Active"
            ]);
        }

        return back();
    }








    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }




}
