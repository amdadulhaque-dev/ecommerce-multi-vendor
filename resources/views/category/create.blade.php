@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <label>Category Tagline</label>
                                <input type="text" class="form-control" name="category_tagline">
                            </div>
                            <div class="form-group">
                                <label>Category Photo</label>
                                <input type="file" class="form-control" name="category_photo">
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Category</button>
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
