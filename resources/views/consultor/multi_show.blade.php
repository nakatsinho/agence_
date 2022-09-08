@extends('layouts.app')

@section('content')
<div class="container">
    <div class="az-content-left az-content-left-components">
        <div class="component-item">
            <label>Dashboard</label>
            <nav class="nav flex-column">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </nav>
        </div><!-- component-item -->
    </div><!-- az-content-left -->
    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="az-content-breadcrumb">
            <span>Consultants</span>
            <span>Tables</span>
            <span>Details</span>
        </div>

        @foreach($liquid as $value)
        <div class="az-content-label mg-b-5">{{ $value->no_usuario }}</div>
        <div class="table-responsive">
            <table class="table table-striped mg-b-0">
                <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Receita Líquida</th>
                        <th>Custo Fixo</th>
                        <th>Comissão</th>
                        <th>Lucro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $timeFrom }} - {{ $timeTo }}</td>
                        <td>$ {{number_format($value->fact_total - $value->imp_total,2,'.',',')}}</td>
                        <td>$ {{number_format($fix_value,2,'.',',')}}</td>
                        <td>$
                            {{number_format($value->fact_total - ($value->imp_total * ($value->imp_total / 100) * ($value->com_total / 100)),2,'.',',')}}
                        </td>
                        <td>$
                            {{number_format(($value->fact_total - $value->imp_total) - ($fix_value + $value->fact_total - ($value->imp_total * ($value->imp_total / 100) * ($value->com_total / 100))),2,'.',',')}}
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>SALDO</th>
                        <th>$ {{number_format($value->fact_total - $value->imp_total,2,'.',',')}}</th>
                        <th>$ {{number_format($fix_value,2,'.',',')}}</th>
                        <th>$
                            {{number_format($value->fact_total - ($value->imp_total * ($value->imp_total / 100) * ($value->com_total / 100)),2,'.',',')}}
                        </th>
                        <th>$
                            {{number_format(($value->fact_total - $value->imp_total) - ($fix_value + $value->fact_total - ($value->imp_total * ($value->imp_total / 100) * ($value->com_total / 100))),2,'.',',')}}
                        </th>
                    </tr>
                </tfoot>
            </table>
            <hr class="mg-y-30">
        </div><!-- bd -->
        @endforeach

        <hr class="mg-y-30">
    </div><!-- az-content-body -->
</div>
@endsection