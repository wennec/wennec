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
                                <h1>Prematricula</h1>
                            </div>
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
                                        <th class="text-center">Nombre Estudiante</th>
                                        <th class="text-center">Documento Estudiante</th>
                                        <th class="text-center">Curso</th>
                                        <th class="text-center">Correo Estudiante</th>
                                        <th class="text-center">Direccion Residencia</th>
                                        <th class="text-center">Nombre de Padre</th>
                                        <th class="text-center">Nombre de Madre</th>
                                        <th class="text-center">Nombre Acudiente</th>
                                        <th class="text-center">Telefono Acudiente</th>
                                        <th class="text-center">Correo Acudiente</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Fecha de Apertura</th>
                                    </thead>
                                    <tbody>
                                        @foreach($prematriculas as $prematricula)
                                        <tr class="text-center">
                                            <td class="text-center">{{$prematricula->nombreEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->numeroDocumentoEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->grupo}}</td>
                                            <td class="text-center">{{$prematricula->correoEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->direccionResidencia}}</td>
                                            <td class="text-center">{{$prematricula->nombrePadre}}</td>
                                            <td class="text-center">{{$prematricula->nombreMadre}}</td>
                                            <td class="text-center">{{$prematricula->nombreAcudiente}}</td>
                                            <td class="text-center">{{$prematricula->telefonoAcudiente}}</td>
                                            <td class="text-center">{{$prematricula->correoAcudiente}}</td>
                                            @if($prematricula->estado == "Inactivo")
                                            <td><span class="label label-danger">Inactivo</span></td>
                                            @elseif($prematricula->estado == "Activo")
                                            <td><span class="label label-primary">Activo</span></td>
                                            @elseif($prematricula->estado == "Finalizado Correctamente")
                                            <td><span class="label label-success">Finalizado Correctamente</span></td>
                                            @elseif($prematricula->estado == "Finalizado Incorrectamente")
                                            <td><span class="label label-danger">Finalizado Incorrectamente</span></td>
                                            @endif
                                            <td class="text-center">{{$prematricula->created_at}}</td>
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
