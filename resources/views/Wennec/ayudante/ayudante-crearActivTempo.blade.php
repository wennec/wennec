@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Crear Plazos Temporales'])
        <div id="app">
        {!! Form::open(['route'=>['activtemporal.store'],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                               
                <div class="form-group form-md-line-input">
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                </div>
                <div class="form-group form-md-line-input">
                <label>Dependencia</label>
                    <select class="form-control" name="FK_DepartamentoId" id="" required="">
                        @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                        @endforeach
                    </select>                
                </div>
                <div class="form-group form-md-line-input">
                    <label>Tipo Entrega</label>
                    <select class="form-control" name="tipoEntrega" id="tipoEntrega" required="">
                            <option value="">Seleccionar</option>
                            <option value="Dia">Dia</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="Mensual">Mensual</option>
                    </select>
                </div>
                <div class="form-group form-md-line-input tipoDia1">
                    <label>Tipo Dia</label>
                    <select class="form-control" name="tipoDia" id="tipoDia" >
                            <option value="">Seleccionar</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <div class="form-group form-md-line-input num_dia1">
                    <label>Dia del Mes</label>
                    {!!Form::number('num_dia',null,['class'=>'form-control','placeholder'=>'Dia','min'=>'1','max'=>'30'])!!}
                </div>
                <div class="form-group form-md-line-input fecha1">
                    <label class="">Fecha</label>
                    {!! Form::date('fechaD', null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group form-md-line-input hora1">
                    <label>Hora</label>
                    {!! Form::time('horaD', null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group form-md-line-input">
                     <input type="file" class="form-control" name="url">
                </div>
                {!! Form::submit('registrar', ['class'=>'btn green-jungle']) !!}
            {!! Form::close() !!}
            @include('partials.modal-help-crear-activTempo')
    @endcomponent
</div>
@endsection
@push('functions')
<script>
jQuery(document).ready(function(){
    $('.fecha1').hide();
    $('.hora1').hide();
    $('.num_dia1').hide();
    $('.tipoDia1').hide();

    $("#tipoEntrega").on('change',function(){
    var tipo = $('select[name="tipoEntrega"]').val();
    if(tipo == 'Dia'){
        $('.fecha1').show();
        $('.hora1').show();
        $('.num_dia1').hide();
        $('.tipoDia1').hide();

    }
    if(tipo == 'Diario'){
        $('.fecha1').hide();
        $('.hora1').show();
        $('.num_dia1').hide();
        $('.tipoDia1').hide();

    }
    if(tipo == 'Semanal'){
        $('.fecha1').hide();
        $('.tipoDia1').show();
        $('.hora1').show();
        $('.num_dia1').hide();

    }
    if(tipo == 'Mensual'){
        $('.fecha1').hide();
        $('.hora1').hide();
        $('.num_dia1').show();
        $('.tipoDia1').hide();

    }

    });
});

</script>
@endpush
