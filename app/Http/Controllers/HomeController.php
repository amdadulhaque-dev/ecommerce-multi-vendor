<?php

namespace App\Http\Controllers;

use App\Mail\EmailOffer;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Ui\Presets\Vue;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index() {

        if (strpos(url()->previous(), "login")) {
            return view('home',[
                 "total_user" => User::count(),
                 "admin" => User::where('role', 2)->count(),
                 "customer" => User::where('role', 1)->count(),
            ]);
        }else{
           return redirect(url()->previous());
        }

        return view("home");

    }

    public function dashboard () {
        return view('home');
    }



    public function EmailOfferView () {
        return view('emailoffer',[
            "customers" => User::where('role', '!=', 2)->get(),
        ]);
    }




    public function EmailOfferSend ($id) {
        Mail::to(User::find($id)->email)->send(new EmailOffer());
        return back();
    }
    public function MultipulMailSend (Request $request) {
        foreach ($request->check as  $id) {
            Mail::to(User::find($id)->email)->send(new EmailOffer());
        }
        return back();
    }
}
