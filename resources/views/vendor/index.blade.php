@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    @if ($vendors->count() == 0)
                        <h1 class="not_found">No Data Found</h1>
                    @else
                        <div class="card-header">
                            Vendor List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Vendor Address</th>
                                        <th>Vendor Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->vendor_name }}</td>
                                            <td>{{ $vendor->address }}</td>
                                            <td>
                                                {{-- <img width="200" src="{{ asset('uploads/category_photo')."/".$vendor->vendor_logo }}" alt=""> --}}
                                            </td>
                                            <td>
                                                {{-- {{ $vendor->status }} --}}
                                                ACTIVE
                                            </td>
                                            <td>
                                                <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-primary d-inline" href="">Edit</a>
                                                <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
<!-- content -->

@endsection
