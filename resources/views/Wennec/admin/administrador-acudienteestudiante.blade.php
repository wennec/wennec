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
                <h1>Acudientes</h1>
              </div>
            </div>

            <button type="button" id="mymodal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAcudiente">
            <i class="fa fa-plus"></i>
                    Crear Acudiente
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalAcudiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Crear Acudiente</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['route'=>'acudienteEstudiante.store','method'=>'POST']) !!}
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group form-md-line-input">
                                  <label>Estudiante</label>
                          </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group form-md-line-input">
                                  <select class="form-control" name="FK_estudiante" id="" required="">
                                      @foreach($estudiantes as $estudiante)
                                          <option value="{{$estudiante->PK_id}}">{{$estudiante->name}}</option>
                                      @endforeach
                                  </select>
                          </div>
                      </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group form-md-line-input">
                                    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group form-md-line-input">
                                    {!!Form::number('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono','required'])!!}
                                </div>
                            </div>
                      </div>
                      <div class="row">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group form-md-line-input">
                                      {!!Form::select('tipo_documento',array('TI' => 'Tarjeta de Identidad', 'CC' => 'Cedula de Ciudadania'), 'TI' ,['class'=>'form-control','placeholder'=>'Tipo de Documento','required'])!!}
                                  </div>
                              </div>
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group form-md-line-input">
                                      {!!Form::number('documento_acudiente',null,['class'=>'form-control','placeholder'=>'Numero de Documento','required'])!!}
                                  </div>
                              </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-md-line-input">
                                        {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Direccion','required'])!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-md-line-input">
                                        {!!Form::text('parentesco',null,['class'=>'form-control','placeholder'=>'Parentesco','required'])!!}
                                    </div>
                                </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group form-md-line-input">
                                          {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail','required'])!!}
                                      </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-md-line-input">
                                        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña','required'])!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group form-md-line-input">
                                        {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirmar Contraseña'])!!}
                                    </div>
                                </div>
                            </div>
                    {!! Form::submit('Crear Acudiente', ['class'=>'btn btn-large btn-success']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
                  {!! Form::close() !!}
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
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Parentesco</th>
                  <th class="text-center">Direccion</th>
                </thead>
                <tbody>
                  @foreach($acudientesEstudiante as $acudienteEstudiante)
                  <tr  class="text-center">
                      <td>{{$acudienteEstudiante->name}}</td>
                      <td>{{$acudienteEstudiante->parentesco}}</td>
                      <td>{{$acudienteEstudiante->direccion}}</td>

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

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
  $('#modalEvaluation').on('show.bs.modal', function(e) {
    var docente_id = $(e.relatedTarget).data('docente-id');
    $(e.currentTarget).find('input[name="teacher_id"]').val(docente_id);
    var docente = document.getElementById('teacher_id').innerHTML = docente_id;

    var docente = $(e.relatedTarget).data('name-id');
    $(e.currentTarget).find('label[name="name_teacher"]').val(docente);
    var docente = document.getElementById('name_teacher').innerHTML= docente;

    var materia = $(e.relatedTarget).data('materia-id');
    $(e.currentTarget).find('label[name="materia"]').val(materia);
    var materia = document.getElementById('materia').innerHTML= materia;
  });
});
</script>

@endsection
