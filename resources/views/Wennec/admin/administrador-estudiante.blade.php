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
                                <h1>Estudiantes</h1>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" id="mymodal" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                                Crear Usuario
                        </button>  <br>

                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Administradores</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'adminStudent.store','method'=>'POST']) !!}
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label>Rol</label>
                                                    <select class="form-control" name="FK_grupo" id="" required="">
                                                        @foreach($grupos as $grupo)
                                                            <option value="{{$grupo->PK_id}}">{{$grupo->grupo}}</option>
                                                        @endforeach
                                                    </select>
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
                                                    {!!Form::number('documento_estudiante',null,['class'=>'form-control','placeholder'=>'Documento ID','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('tipo_documento',null,['class'=>'form-control','placeholder'=>'Tipo de Documento','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('sexo_estudiante',null,['class'=>'form-control','placeholder'=>'Genero','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                                {!!Form::date('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Fecha de Nacimiento'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                                {!!Form::text('lugar_nacimiento',null,['class'=>'form-control','placeholder'=>'Lugar de Nacimiento'])!!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('nombre_madre',null,['class'=>'form-control','placeholder'=>'Nombre Madre','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('apellido_madre',null,['class'=>'form-control','placeholder'=>'Apellido Madre','required'])!!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('nombre_padre',null,['class'=>'form-control','placeholder'=>'Nombre Padre','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('apellido_padre',null,['class'=>'form-control','placeholder'=>'Apellido Padre','required'])!!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'E-mail','required'])!!}
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
                                    
                                    {!! Form::submit('Crear Usuario', ['class'=>'btn btn-large btn-primary']) !!}
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
                                        <th class="text-center">Nombre Usuario</th>
                                        <th class="text-center">Rol</th>
                                        <th class="text-center">Colegio</th>
                                    </thead>

                                    <tbody>
                                        @foreach($students as $student)
                                        <tr  class="text-center">
                                            <td>{{$student->nameUser}}</td>
                                            <td>{{$student->nameRol}}</td>
                                            <td>{{$student->nameColegio}}</td>
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

<script>
    function showModal(id) {
      $(".modal").modal('hide');
      $("#" + id).modal();
    }

  </script>
@endsection


