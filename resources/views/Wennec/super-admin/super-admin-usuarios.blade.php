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
