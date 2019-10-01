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
                                <h1>Grupos</h1>
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
                                        <th class="text-center">Estudiante</th>
                                        <th class="text-center">Agregar</th>
                                    </thead>

                                    <tbody>
                                        @foreach($listado_estudiantes as $estudiante)
                                        <tr  class="text-center">
                                            <td>{{$estudiante->name}}</td>
                                            <td><button type="button" id="mymodal" class="btn btn-success btn-md" data-estudiante-id='{{$estudiante->id_estudiante}}' data-toggle="modal" data-target="#modalCreate">
                                            <i class="fa fa-plus"></i>
                                        </button></td>
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

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Observación</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'observacionDocente.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group form-md-line-input">
                              <label for="">Periodo</label>
                              <select class="form-control" name="FK_Periodo" id="" required="">
                                  @foreach($periodos as $periodo)
                                      <option value="{{$periodo->PK_id}}">{{$periodo->periodo}}</option>
                                  @endforeach
                              </select>
                            </div>

                            <div class="form-group form-md-line-input">
                              <label for="">Observacion</label>
                              <select class="form-control" name="FK_Observacion" id="" required="">
                                  @foreach($observaciones as $observacion)
                                      <option value="{{$observacion->PK_id}}">{{$observacion->descripcion}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <input type="hidden" name="FK_Estudiante" id="idEstudiante">
                            <input type="hidden" name="FK_Materia" id="id_materia" value="{{$id_materia}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Registrar Observacion</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>


<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#modalCreate').on('show.bs.modal', function(e) {
            var estudiante_id = $(e.relatedTarget).data('estudiante-id');
            $(e.currentTarget).find('input[name="FK_Estudiante"]').val(estudiante_id);
            var estudiante = document.getElementById('idEstudiante').innerHTML = estudiante_id;
        });
    });
</script>
@endsection
