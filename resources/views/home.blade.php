@extends('layouts.app')

@section('content')
<div class="az-content-body">
    @include('layouts.tabs')

    <div class="row row-sm mg-b-20">
        <div class="col-lg-7 ht-lg-100p">
            <div class="card card-dashboard-one">
                <div class="card-header">
                    <div>
                        <h6 class="card-title">Website Audience Metrics</h6>
                        <p class="card-text">Audience to which the users belonged while on the current date range.</p>
                    </div>
                    <div class="btn-group">
                        <button class="btn active">Day</button>
                        <button class="btn">Week</button>
                        <button class="btn">Month</button>
                    </div>
                </div><!-- card-header -->
                <div class="card-body">
                    <div class="card-body-top">
                        <div>
                            <label class="mg-b-0">Users</label>
                            <h2>13,956</h2>
                        </div>
                        <div>
                            <label class="mg-b-0">Bounce Rate</label>
                            <h2>33.50%</h2>
                        </div>
                        <div>
                            <label class="mg-b-0">Page Views</label>
                            <h2>83,123</h2>
                        </div>
                        <div>
                            <label class="mg-b-0">Sessions</label>
                            <h2>16,869</h2>
                        </div>
                    </div><!-- card-body-top -->
                    <div class="flot-chart-wrapper">
                        <div id="flotChart" class="flot-chart"></div>
                    </div><!-- flot-chart-wrapper -->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-lg-5 mg-t-20 mg-lg-t-0">
            <div class="row row-sm">
                <div class="col-sm-6">
                    <div class="card card-dashboard-two">
                        <div class="card-header">
                            <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>
                            <p>Bounce Rate</p>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div id="flotChart1" class="flot-chart"></div>
                            </div><!-- chart-wrapper -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                    <div class="card card-dashboard-two">
                        <div class="card-header">
                            <h6>86k <i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                            <p>Total Users</p>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div id="flotChart2" class="flot-chart"></div>
                            </div><!-- chart-wrapper -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-12 mg-t-20">
                    <div class="card card-dashboard-three">
                        <div class="card-header">
                            <p>All Sessions</p>
                            <h6>16,869 <small class="tx-success"><i class="icon ion-md-arrow-up"></i> 2.87%</small></h6>
                            <small>The total number of sessions within the date range. It is the period time a user is
                                actively engaged with your website, page or app, etc.</small>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="chart"><canvas id="chartBar5"></canvas></div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div>
        <!--col -->
    </div><!-- row -->
    <!-- row -->
</div>
@endsection