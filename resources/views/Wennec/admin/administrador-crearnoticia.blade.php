@extends('layouts.dash')

@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
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
                                <h1>Noticias Colegio</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            {!! Form::open(['route'=>'noticiasA.store','method'=>'POST','files' => true, 'enctype'=>'multipart/form-data']) !!}

                            <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            {!!Form::text('tipoNoticia',null,['class'=>'form-control','placeholder'=>'Titulo Noticia','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            {!!Form::file('imagenNoticia',null,['class'=>'form-control','placeholder'=>'Imagen'])!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label for="">Fecha Inicio</label>
                                            {!!Form::date('fechaInicio',null,['class'=>'form-control','placeholder'=>'Fecha de inicio','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label for="">Fecha Final</label>
                                            {!!Form::date('fechaFin',null,['class'=>'form-control','placeholder'=>'Fecha fin','required'])!!}
                                        </div>
                                    </div>
                            </div>
                                {!! Form::submit('Crear Noticia', ['class'=>'btn btn-large btn-success']) !!}
                                {{link_to_route('noticiasA.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>
@endsection
