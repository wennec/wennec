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
                                        <th class="text-center">Nombre Estudiante</th>
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Registrar</th>
                                        <th class="text-center">Editar</th>

                                    </thead>

                                    <tbody>
                                        @foreach($estudiantes_grupo as $estudiante_grupo)
                                        <tr  class="text-center">
                                            <td>{{$estudiante_grupo->name}}</td>
                                            <td><label for="">calificacion</label></td>
                                            <td><button type="button" id="mymodal" class="btn btn-success btn-md" data-toggle="modal" data-target="#modalCreate">
                                                <i class="fa fa-check"></i>

                                                </button></td>
                                            <td><button type="button" id="mymodal" class="btn btn-warning btn-md" data-toggle="modal" data-target="#modalCreate">
                                                <i class="fa fa-pencil"></i>

                                                </button></td>
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

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Calificacion</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'logroDocente.store','method'=>'POST']) !!}
                <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                      <div class="form-group form-md-line-input">
                          <label for="">materia</label>
                      </div>
                      <div class="form-group form-md-line-input">
                          <label for="">logro</label>
                      </div>
                  </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group form-md-line-input">
                            {!!Form::number('calificacion',null,['class'=>'form-control','placeholder'=>'Calificacion','required'])!!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Registrar Calificacion</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function (e) {
  $('#modalCreate').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#asignatura').val(id);
  });
});
</script>
@endsection
