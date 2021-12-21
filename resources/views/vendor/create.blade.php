@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Add Vendor
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendor.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="text" class="form-control" name="vendor_name">
                            </div>
                            <div class="form-group">
                                <label>Vendor Email</label>
                                <input type="text" class="form-control" name="vendor_email">
                            </div>
                            <div class="form-group">
                                <label>Vendor Phone</label>
                                <input type="text" class="form-control" name="vendor_phone">
                            </div>
                            <div class="form-group">
                                <label>Vendor Address</label>
                                <input type="text" class="form-control" name="vendor_address">
                            </div>
                            {{-- <div class="form-group">
                                <label>Vendor Logo</label>
                                <input type="file" class="form-control" name="vendor_logo">
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Add New Vendor</button>
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

