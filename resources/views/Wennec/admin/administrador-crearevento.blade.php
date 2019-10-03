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
                                <h1>Eventos Colegio</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            {!! Form::open(['route'=>'eventoA.store','method'=>'POST']) !!}

                            <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                            {!!Form::text('titulo_evento',null,['class'=>'form-control','placeholder'=>'Titulo Evento','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                            {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Fecha','required'])!!}
                                        </div>
                                    </div>
                            </div>


                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label>Tipo de Evento</label>
                                                <select class="form-control" name="FK_EventosId" id="" required="">
                                                    @foreach($eventos as $evento)
                                                        <option value="{{$evento->PK_id}}">{{$evento->tipo_evento}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit('Crear Evento', ['class'=>'btn btn-large btn-success']) !!}
                                {{link_to_route('usuariosC.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
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
