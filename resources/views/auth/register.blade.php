@extends('layouts.appauth')

@section('auth_comtent')

<div class="account-box">

    <div class="card-box p-5">
        <h2 class="text-uppercase text-center pb-4">
            <a href="index.html" class="text-success">
                <span>
                    <img src="{{ asset('dashboard') }}/assets/images/logo.png" alt="" height="26">
                </span>
            </a>
        </h2>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row m-b-20">
                <div class="col-12">
                    <label for="username">Full Name <span class="text-danger">*</span> </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-b-20">
                <div class="col-12">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-b-20">
                <div class="col-12">
                    <label for="emailaddress">Email address<span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-b-20">
                <div class="col-12">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row m-b-20">
                <div class="col-12">
                    <label for="password">Confirm Password<span class="text-danger">*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>


            <div class="form-group row text-center m-t-10">
                <div class="col-12">
                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up
                        Free</button>
                </div>
            </div>

        </form>

        <div class="row m-t-50">
            <div class="col-sm-12 text-center">
                <p class="text-muted">Already have an account?
                    <a href="{{ route('login') }}" class="text-dark m-l-5">
                        <b>Sign In</b>
                    </a>
                </p>
            </div>
        </div>

    </div>
</div>

@endsection
