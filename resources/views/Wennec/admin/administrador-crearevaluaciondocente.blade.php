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
                                <h1>Evaluacion Docente</h1>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" id="mymodal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                                Crear Evaluacion
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Evaluacion Docente</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'fechaevaluaciondocenteA.store','method'=>'POST']) !!}
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="">Fecha Inicio</label>
                                                {!!Form::date('fecha_inicio',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="form-group form-md-line-input">
                                              <label for="">Fecha Final</label>
                                              {!!Form::date('fecha_fin',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                          </div>
                                        </div>
                                    </div>
                                    {!! Form::submit('Crear Evaluacion', ['class'=>'btn btn-large btn-success']) !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
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
                                        <th class="text-center">Fecha Inicio</th>
                                        <th class="text-center">Fecha Final</th>
                                        <th class="text-center">Editar</th>
                                    </thead>
                                    <tbody>
                                      @foreach($testTeachers as $testTeacher)
                                      <tr  class="text-center">
                                          <td>{{$testTeacher->fecha_inicio}}</td>
                                          <td>{{$testTeacher->fecha_fin}}</td>
                                          <td>
                                          {{link_to_route('fechaevaluaciondocenteA.edit', $title = '', $parameter = $testTeacher->id, $attributes = ['class' => 'btn btn-simple btn-warning btn-icon edit far fa-edit'])}}
                                          </td>
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
