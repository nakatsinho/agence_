@extends('layouts.app')

@section('content')
<div class="container">
    <div class="az-content-left az-content-left-components">
        <div class="component-item">
            <label>MENU</label>
            <nav class="nav flex-column">
                <a href="{{ route('clients.index') }}" class="nav-link">Clients</a>
                <a href="{{ route('consultant.index') }}" class="nav-link">Consultants</a>
            </nav>
            <label>Charts</label>
            <nav class="nav flex-column">
                <a href="chart-chartjs.html" class="nav-link">Chart</a>
                <a href="chart-chartjs.html" class="nav-link">Pizza</a>
            </nav>
        </div><!-- component-item -->

    </div><!-- az-content-left -->
    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="az-content-breadcrumb">
            <span>Consultants</span>
            <span>Tables</span>
            <span>List</span>
        </div>

        <!-- <hr class="mg-y-30"> -->

        <div class="az-content-label mg-b-5">Table List of Consultants</div>
        <p class="mg-b-20">See bellow all name list of consultant in active status.</p>

        <form action="{{ route('consultant.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <label for="">Start Date</label>
                    <input type="date" name="start_date" id="" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label for="">End Date</label>
                    <input type="date" name="end_date" id="" class="form-control">
                </div>
            </div>
            <hr class="mg-y-30">
            <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($count=1)
                        @foreach($consultant as $value)
                        <tr>
                            <th scope="row">{{$count}} º</th>
                            <td>{{optional($value)->no_usuario}}</td>
                            <td>{{optional($value)->no_email}}</td>
                            <td>{{$value->nu_telefone}}</td>
                            <td>@if($value->in_ativo == "S")
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td><i class="fa fa-eye"></i><input type="submit" value="Report" class="btn btn-submit"></td>
                            <input type="hidden" value="{{ $value->co_usuario }}" name="consultant_id">
                        </tr>
                        @php($count++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>

        <div class="ht-40"></div>
    </div><!-- az-content-body -->
</div><!-- container -->
@endsection