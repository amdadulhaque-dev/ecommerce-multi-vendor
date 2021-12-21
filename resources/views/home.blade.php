@extends('layouts.app')

@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Account Overview</h4>

                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                        data-fgColor="#0acf97" value="37" data-skin="tron" data-angleOffset="180"
                                        data-readOnly=true data-thickness=".1" />
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Daily Sales</p>
                                    <h3 class="">$35,715</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                        data-fgColor="#f9bc0b" value="92" data-skin="tron" data-angleOffset="180"
                                        data-readOnly=true data-thickness=".1" />
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Sales Analytics</p>
                                    <h3 class="">$97,511</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                        data-fgColor="#f1556c" value="14" data-skin="tron" data-angleOffset="180"
                                        data-readOnly=true data-thickness=".1" />
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Statistics</p>
                                    <h3 class="">$954</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                        data-fgColor="#2d7bf4" value="60" data-skin="tron" data-angleOffset="180"
                                        data-readOnly=true data-thickness=".1" />
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Revenue</p>
                                    <h3 class="">$32,540</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->



        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Order Overview</h4>

                    <div id="website-stats" style="height: 350px;" class="flot-chart mt-5"></div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Sales Overview</h4>

                    <div id="combine-chart">
                        <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="header-title mb-3">Wallet Balances</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-centered m-0">

                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                    <th>Reserved in orders</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="assets/images/users/avatar-2.jpg" alt="contact-img"
                                            title="contact-img" class="rounded-circle thumb-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                    </td>

                                    <td>
                                        0.00816117 BTC
                                    </td>

                                    <td>
                                        0.00097036 BTC
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Total Wallet Balance</h4>


                    <div id="donut-chart">
                        <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection
