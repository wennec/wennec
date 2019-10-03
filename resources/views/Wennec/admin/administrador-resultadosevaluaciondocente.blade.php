@extends('layouts.dash')

@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15-datatable">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Resultados</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Docente</th>
                                        <th class="text-center">Buena Puntualidad</th>
                                        <th class="text-center">Mala Puntualidad</th>
                                        <th class="text-center">Buen Dinamismo</th>
                                        <th class="text-center">Mal Dinamismo</th>
                                        <th class="text-center">Buen Respeto</th>
                                        <th class="text-center">Mal Respeto</th>
                                        <th class="text-center">Buena Actitud</th>
                                        <th class="text-center">Mala Actitud</th>
                                        <th class="text-center">Total</th>
                                      </thead>

                                    <tbody>
                                        @foreach($resultados as $resultado)
                                        <tr  class="text-center">
                                            <td>{{$resultado->name}}</td>
                                            <td>{{$resultado->buenaPuntualidad}}</td>
                                            <td>{{$resultado->malaPuntualidad}}</td>
                                            <td>{{$resultado->buenDinamismo}}</td>
                                            <td>{{$resultado->malDinamismo}}</td>
                                            <td>{{$resultado->buenRespeto}}</td>
                                            <td>{{$resultado->malRespeto}}</td>
                                            <td>{{$resultado->buenaActitud}}</td>
                                            <td>{{$resultado->malaActitud}}</td>
                                            <td>{{$resultado->totalVotos}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>
@endsection
