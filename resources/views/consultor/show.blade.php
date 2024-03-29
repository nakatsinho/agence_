@extends('layouts.app')

@section('content')
<div class="container">
    <div class="az-content-left az-content-left-components">
        <div class="component-item">
            <label>Chart UI</label>
            <nav class="nav flex-column">
                <a href="{{ route('consultant.edit',1) }}" class="nav-link">Chart</a>
                <a href="elem-dropdown.html" class="nav-link">Pie</a>
            </nav>
        </div><!-- component-item -->
    </div><!-- az-content-left -->
    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="az-content-breadcrumb">
            <span>Consultants</span>
            <span>Tables</span>
            <span>Details</span>
        </div>
        <div class="table-responsive">
            <table class="table table-striped mg-b-0">
                <thead>
                    <tr>
                        <!-- <th>Periodo</th> -->
                        <th>Receita Líquida</th>
                        <th>Custo Fixo</th>
                        <th>Comissão</th>
                        <th>Lucro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$ {{number_format($liquid_value,2,'.',',')}}</td>
                        <td>$ {{number_format($fix_value,2,'.',',')}}</td>
                        <td>$
                            {{number_format($comission,2,'.',',')}}
                        </td>
                        <td>$ {{number_format($lucro,2,'.',',')}} </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>$ {{number_format($liquid_value,2,'.',',')}}</th>
                        <th>$ {{number_format($fix_value,2,'.',',')}}</th>
                        <th>$
                            {{number_format($comission,2,'.',',')}}
                        </th>
                        <th>$ {{number_format($lucro,2,'.',',')}} </th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- bd -->

        <hr class="mg-y-30">
    </div><!-- az-content-body -->
</div>
@endsection