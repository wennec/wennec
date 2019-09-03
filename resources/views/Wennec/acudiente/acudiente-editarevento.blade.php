@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')
<div class="data-table-area mg-b-15-datatable">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Crear Colegio</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        {!!Form::model($departamento, ['route' => ['agendaAcudiente.update',$departamento], 'method' => 'PUT','files' => true, 'enctype'=>'multipart/form-data'])!!}
                        <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label>Tipo de Agenda</label>
                                                <select class="form-control" name="FK_agendaId" id="" required="">
                                                    @foreach($agenda as $agen)
                                                        <option value="{{$agen->PK_id}}">{{$agen->tipo_agenda}}</option>
                                                    @endforeach
                                                </select>                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">                                 
                                                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">                                 
                                                {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Fecha'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::submit('Crear Peticion', ['class'=>'btn btn-large btn-primary']) !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>    
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
