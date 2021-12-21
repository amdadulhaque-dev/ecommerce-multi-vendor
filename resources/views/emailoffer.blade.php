@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="">SI</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center" data-priority="1">
                                            <input type="checkbox" id="myCheck">
                                        </th>
                                        <th class="text-center" data-priority="3">Customer Email</th>
                                        <th class="text-center" data-priority="6">Send Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($customers as $customer)
                                    <form action="{{ route('multipulmailsend') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <th class="">
                                                {{ $loop->index +1 }}
                                            </th>
                                            <th class="text-center">
                                                {{ $customer->name }}
                                            </th>
                                            <td class="text-center">
                                                <input type="checkbox" id="myCheck" name="check[]"
                                                    value="{{ $customer->id }}">
                                            </td>
                                            <td class="text-center">
                                                {{ $customer->email }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('emailoffersend', $customer->id) }}"
                                                    class="btn btn-info waves-light waves-effect">Send</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100">
                                                <h2>Data Not Found</h2>
                                            </td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="2">

                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-info" type="submit">Mail Send</button>
                                            </td>
                                            <td colspan="2"></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
<!-- content -->

@endsection
