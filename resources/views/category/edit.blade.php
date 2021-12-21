@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit {{ $categories->category_name }} Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $categories->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="{{ $categories->category_name }}">
                            </div>
                            <div class="form-group">
                                <label>Category Tagline</label>
                                <input type="text" class="form-control" name="category_tagline" value="{{ $categories->category_tagline }}">
                            </div>
                            <div class="form-group">
                                <label>Category Status</label>
                                <input type="text" class="form-control" name="category_status" value="{{ $categories->status }}">
                            </div>
                            <div class="form-group">
                                <label class="d-block">Old Category Photo</label>
                                <img width="200" src="{{ asset('uploads/category_photo')."/".$categories->category_photo }}" alt="">
                            </div>
                            <div class="form-group">
                                <label>Category Photo</label>
                                <input type="file" class="form-control" name="new_category_photo">
                            </div>
                            <button type="submit" class="btn btn-primary">Update {{ $categories->category_name }} Category</button>
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
