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
                                <h1>Colegios Wennec</h1>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{route('colegios.create')}}" role="button">
                                <i class="fa fa-plus"></i>
                                Crear Colegio
                            </a>
                        </div>   <br>

                        <!-- Button trigger modal -->
                        <button type="button" id="mymodal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                                Crear Colegio
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Colegio</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route'=>'colegios.store','method'=>'POST']) !!}                        
                                <div class="form-group form-md-line-input">                                 
                                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                </div>
                                <div class="form-group form-md-line-input">
                                    {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required','maxlength'=>'85'])!!}
                                </div>    

                                <div class="form-group form-md-line-input">

                                    <select class="form-control" name="FK_PlanesId" id="" >
                                        <option value="">Seleccionar</option>
                                        @foreach($planes as $plan)
                                            <option value="{{$plan->id}}">{{$plan->nombre}}</option>
                                        @endforeach
                                    </select>                 
                                </div>                                       
                                {!! Form::submit('Agregar Colegio', ['class'=>'btn btn-large btn-primary']) !!}
                                {{link_to_route('colegios.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
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
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Plan Adquirido</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Eliminar</th>
                                    </thead>
                                    <tbody>
                                        @foreach($colegios as $colegio)
                                        <tr class="text-center">
                                            <td class="text-center">{{$colegio->nombre}}</td>
                                            <td class="text-center">{{$colegio->descripcion}}</td>
                                            @if(isset($colegio->plan))
                                                @if($colegio->plan->nombre == "Elite")
                                                <td><span class="label label-warning">Elite</span></td>
                                                @elseif($colegio->plan->nombre == "Silver")
                                                <td><span class="label label-default">Silver</span></td>
                                                @elseif($colegio->plan->nombre == "Diamond")
                                                <td><span class="label label-danger">Diamond</span></td>
                                                @endif
                                            @else
                                            <td><span class="label label-info">No Aplica</span></td>
                                            @endif
                                            <td class="text-center">{{link_to_route('colegios.edit', $title = '', $parameter = $colegio->id, $attributes = ['class' => 'btn btn-simple btn-warning btn-icon edit far fa-edit'])}}
                                            </td>
                                            <td class="text-center">@include('Wennec.super-admin.super-admin-deletecolegio')
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

