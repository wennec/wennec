@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Crear Formatos'])
        <div id="app">
        {!! Form::open(['route'=>'formatos.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}                        
            <div class="form-group form-md-line-input">                                 
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
            </div>
            <div class="form-group form-md-line-input">
                 {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required','maxlength'=>'85'])!!}
            </div>     
            <div class="form-group form-md-line-input">
                <input type="file" class="form-control" name="url">
            </div>                                           
            {!! Form::submit('registrar', ['class'=>'btn green-jungle']) !!}
            </div>                        
            {!! Form::close() !!}
        </div>        
        @include('partials.modal-help-crear-formatos') 
    @endcomponent
</div>
@endsection