@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')

<!-- Static Table Start -->
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
        </div>
    </div>
</div>
@endsection