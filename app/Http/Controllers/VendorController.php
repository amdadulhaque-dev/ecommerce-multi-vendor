<?php

namespace App\Http\Controllers;

use App\Mail\VendorNotification;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VendorController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        return view("vendor.index",[
            "vendors" => Vendor::all(),
            "users" => User::all(),
        ]);
    }




    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
    */
    public function create() {
        //
        return view("vendor.create");
    }




    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        //
        $random_password = Str::random(8);
        $user_info = User::create([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'phone_number' => $request->vendor_phone,
            'role' => 3,
            'password' => bcrypt("melon"),
        ]);

        Vendor::insert([
            "user_id" => $user_info->id,
            "address" => $request->vendor_address,
            "created_at" => Carbon::now(),
        ]);


        // Mail::to($request->vendor_email)->send(new VendorNotification($random_password));
        // Mail::to(env($request->vendor_email))->send(new VendorNotification);

        return back();
    }




    /**
     * Display the specified resource.
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
    */
    public function show(Vendor $vendor) {
        //
    }





    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
    */
    public function edit(Vendor $vendor) {
        //
    }




    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Vendor $vendor) {
        //
    }




    /**
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
    */
    public function destroy(Vendor $vendor) {
        //
    }




}
