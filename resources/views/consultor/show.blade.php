@extends('layouts.app')

@section('content')
<div class="container">
    <div class="az-content-left az-content-left-components">
        <div class="component-item">
            <label>UI Elements</label>
            <nav class="nav flex-column">
                <a href="elem-buttons.html" class="nav-link">Buttons</a>
                <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                <a href="elem-icons.html" class="nav-link">Icons</a>
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
                        <th>SALDO</th>
                        <th>19291</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- bd -->

        <hr class="mg-y-30">
    </div><!-- az-content-body -->
</div>
@endsection