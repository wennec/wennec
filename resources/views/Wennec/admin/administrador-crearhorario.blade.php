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
                                <h1>Horario</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            {!! Form::open(['route'=>'horarios.store','method'=>'POST']) !!}
                             
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label>Docente</label>
                                                <select class="form-control" name="FK_docente" id="" required="">
                                                    <option value="">Seleccionar</option>
                                                        @foreach($docentes as $docente)
                                                            <option value="{{$docente->PK_id}}">{{$docente->name}}</option>
                                                        @endforeach
                                                </select>      
                                        </div>
                                        

                                        <div class="form-group form-md-line-input">
                                            <label>Dia</label>

                                                <select class="form-control" name="FK_DiaId" id="" required="">
                                                    <option value="">Seleccionar</option>
                                                        @foreach($dias as $dia)
                                                            <option value="{{$dia->PK_id}}">{{$dia->dia}}</option>
                                                        @endforeach
                                                </select>      
                                        </div>

                                        <div class="form-group form-md-line-input">
                                            <label>Hora Inicio</label>
                                                <select class="form-control" name="horaInicio" id="" required="">
                                                    <option value="">Seleccionar</option>
                                                            <option value="08:00:00">08:00 am</option>
                                                            <option value="09:00:00">09:00 am</option>
                                                            <option value="10:00:00">10:00 am</option>
                                                            <option value="11:00:00">11:00 am</option>
                                                            <option value="12:00:00">12:00 m</option>
                                                            <option value="13:00:00">01:00 pm</option>
                                                            <option value="14:00:00">02:00 pm</option>
                                                            <option value="15:00:00">03:00 pm</option>
                                                            <option value="16:00:00">04:00 pm</option>
                                                            <option value="17:00:00">05:00 pm</option>
                                                            <option value="18:00:00">06:00 pm</option>
                                                </select>      
                                        </div>

                                        <div class="form-group form-md-line-input">
                                            <label>Hora Fin</label>
                                            <select class="form-control" name="horaFin" id="" required="">
                                                    <option value="">Seleccionar</option>
                                                            <option value="08:00:00">08:00 am</option>
                                                            <option value="09:00:00">09:00 am</option>
                                                            <option value="10:00:00">10:00 am</option>
                                                            <option value="11:00:00">11:00 am</option>
                                                            <option value="12:00:00">12:00 m</option>
                                                            <option value="13:00:00">01:00 pm</option>
                                                            <option value="14:00:00">02:00 pm</option>
                                                            <option value="15:00:00">03:00 pm</option>
                                                            <option value="16:00:00">04:00 pm</option>
                                                            <option value="17:00:00">05:00 pm</option>
                                                            <option value="18:00:00">06:00 pm</option>
                                                </select>       
                                        </div>
                                    </div>

                                    
                                </div>
                                {!! Form::submit('Guardar', ['class'=>'btn btn-large btn-primary']) !!}
                                {{link_to_route('horarios.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
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
