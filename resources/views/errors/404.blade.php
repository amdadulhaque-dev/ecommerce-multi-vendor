@extends('layouts.appfrontend')

@section("content")



    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Products</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->





    <!-- Blank area start -->
    <div class="blank-page-area pb-100px pt-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="blank-content-header ">
                        <h1>The page you are looking for was not found.</h1>
                    </div>
                    <div class="page-not-found text-center">
                        <h4>Sorry For The Inconvenience.</h4>
                        <p>Search again what you are looking for</p>
                        <a href="index.html">Go To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank area end -->
    @endsection
