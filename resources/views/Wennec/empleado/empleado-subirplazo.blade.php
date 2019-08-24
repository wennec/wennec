@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Subir Archivos'])
        <div id="app">
        {!!Form::model($id, ['route' => ['jefeacttemp.update',$id], 'method' => 'PUT','files' => true, 'enctype'=>'multipart/form-data'])!!}                             
            <div class="form-group form-md-line-input">  
                <input type="file" class="form-control" name="url_plazo">  
            </div>                                           
            {!! Form::submit('Subir Archivo', ['class'=>'btn green-jungle']) !!}
            </div>                        
            {!! Form::close() !!}
        </div>        
    @endcomponent
</div>
@endsection