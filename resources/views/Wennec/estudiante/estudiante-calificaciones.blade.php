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
                                <h1>Calificaciones</h1>
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
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Curso</th>
                                        <th class="text-center">Grupo</th>
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Docente</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificaciones as $calificacion)
                                        <tr  class="text-center">
                                            <td>{{$calificacion->nombre_materia}}</td>
                                            <td>{{$calificacion->nombre_curso}}</td>
                                            <td>{{$calificacion->grupo}}</td>
                                            @if($calificacion->calificacion >= "3.0")
                                            <td><span class="label label-warning">{{$calificacion->calificacion}}</span></td>
                                            @else($calificacion->calificacion < "3.0")
                                            <td><span class="label label-danger">{{$calificacion->calificacion}}</span></td>
                                            @endif
                                            <td>{{$calificacion->docente}}</td>
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
