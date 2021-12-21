@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($products->count() > 0)
                    <div class="card-header">
                        Product List
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                         <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        {{-- <td>
                                            <img width="200" src="{{ asset('uploads/category_photo')."/".$category->category_photo }}" alt="">
                                        </td>
                                        <td>{{ $category->status }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary d-inline" href="">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h1 class="not_found">No Data Found</h1>
                    @endif


                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
<!-- content -->

@endsection
