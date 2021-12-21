@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Add Coupon
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Coupon Name</label>
                                <input type="text" class="form-control" name="coupon_name">
                            </div>
                            <div class="form-group">
                                <label>Coupon Validity</label>
                                <input type="date" class="form-control" name="validity">
                            </div>
                            <div class="form-group">
                                <label>Coupon Percentage</label>
                                <input type="text" class="form-control" name="discount_percentage">
                            </div>
                            <div class="form-group">
                                <label>Coupon Limit</label>
                                <input type="text" class="form-control" name="limit">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
<!-- content -->

@endsection

