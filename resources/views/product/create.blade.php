@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Add Product

                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Product Category Name</label>
                                <select name="product_category_id" class="form-control">
                                    <option value="">-Select One-</option>
                                    @foreach ($active_categories as $active_category)
                                        <option value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" name="product_price">
                            </div>
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" name="product_code">
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="product_quantity">
                            </div>
                            <div class="form-group">
                                <label>Product Short Description</label>
                                <textarea class="form-control" rows="2" name="product_short_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Full Description</label>
                                <textarea class="form-control" rows="4" name="product_long_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Photo</label>
                                <input type="file" class="form-control" name="product_photo">
                            </div>
                            {{-- <div class="form-group">
                                <label>Product Thumbelinas Photo</label>
                                <input type="file" class="form-control" name="product_thumbnail_photos[]" multiple>
                            </div> --}}
                            <div class="form-group">
                                <label>Product Thumbelinas Photo</label>
                                <input type="file" class="form-control" name="product_zoom_photos[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Product</button>
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
