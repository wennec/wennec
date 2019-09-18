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
                                <h1>Usuarios Wennec</h1>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{route('usuarios.create')}}" role="button">
                                <i class="fa fa-plus"></i>
                                Crear Usuario
                            </a>
                        </div>   <br>

                        <!-- Button trigger modal -->
                        <button type="button" id="mymodal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                                Crear Usuario
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Administradores</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'usuarios.store','method'=>'POST']) !!}
                                <div class="row">
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
                                                    {!!Form::number('documento',null,['class'=>'form-control','placeholder'=>'Documento ID','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required'])!!}
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
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label>Rol</label>
                                                    <select class="form-control" name="FK_RolesId" id="" required="">
                                                        @foreach($roles as $rol)
                                                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label>Colegio</label>
                                                <select class="form-control" name="FK_DepartamentoId" id="" >
                                                    <option value="">Seleccionar</option>
                                                    @foreach($colegios as $colegio)
                                                        <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                                                    @endforeach
                                                </select>
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
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Telefono</th>
                                        <th class="text-center">Documento</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">E-mail</th>
                                        <th class="text-center">Dependencia</th>
                                        <th class="text-center">Eliminar</th>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr  class="text-center">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->telefono}}</td>
                                            <td>{{$user->documento}}</td>
                                            <td>{{$user->direccion}}</td>
                                            <td>{{$user->email}}</td>
                                            @if(isset($user->departamento))
                                                <td>{{$user->departamento->nombre}}</td>
                                            @else
                                                <td>No Aplica</td>
                                            @endif
                                            <td>{!!Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy',$user->PK_id]])!!}
                                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
                                                {!!Form::close()!!}
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
