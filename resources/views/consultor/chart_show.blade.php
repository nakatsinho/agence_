@extends('layouts.app')

@section('content')
<div class="container">
    <div class="az-content-left az-content-left-components">
        <div class="component-item">
            <label>Dashboard</label>
            <nav class="nav flex-column">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </nav>

            <label>Admin</label>
            <nav class="nav flex-column">
                <a href="{{ route('clients.index') }}" class="nav-link">Client</a>
                <a href="{{ route('consultant.index') }}" class="nav-link">Consultant</a>
            </nav>

            <label>Charts</label>
            <nav class="nav flex-column">
                <a href="javascript()" class="nav-link active">ChartJS</a>
            </nav>
        </div><!-- component-item -->

    </div><!-- az-content-left -->
    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="az-content-breadcrumb">
            <span>Components</span>
            <span>Charts</span>
            <span>ChartJS Charts</span>
        </div>
        <h2 class="az-content-title">ChartJS Charts</h2>

        <div class="az-content-label mg-b-5">Bar Chart</div>
        <p class="mg-b-20">Below is the basic bar chart example.</p>

        <div class="row row-sm">
            <div class="col-lg-12 ">
                <div class="az-content-label az-content-label-sm mg-b-15">Solid Color</div>
                <div class="ht-200 ht-lg-250"><canvas id="chartBar1"></canvas></div>
            </div>
            <!-- col-6 -->
        </div><!-- row -->

    </div><!-- az-content-body -->
</div>
@endsection

@section('scripts')
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/ionicons/ionicons.js') }}"></script>
<script src="{{ asset('lib/chart.js/Chart.bundle.min.js') }}"></script>


<script src="js/azia.js"></script>
@include('consultor.script.chart')
<script src="js/jquery.cookie.js" type="text/javascript"></script>
@endsection