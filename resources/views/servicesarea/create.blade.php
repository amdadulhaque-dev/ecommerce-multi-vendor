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
                        <form action="{{ route('servicesarea.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Country Name</label>
                                <select name="countries[]" class="form-control" id="country_dropdown" multiple="multiple">
                                    <option value="">-Select One-</option>
                                    @foreach ($country_name as $country)
                                        <option {{ ($country->service_status == "Active")? 'selected':''  }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>City Name</label>

                               <select name="cities[]" class="form-control" id="city_dropdown" multiple="multiple">
                                    <option value="">-Select One-</option>
                                    @foreach ($cities as $key => $city)
                                        <option {{ ($city->service_status == "Active")? 'selected':''  }} value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>

                            
                            </div>

                            <button type="submit" class="btn btn-primary">Update Area</button>
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
@section("script_content")
    <script>
        $(document).ready(function () {
           $('#country_dropdown').select2();
           $('#city_dropdown').select2();
        });
    </script>
@endsection
