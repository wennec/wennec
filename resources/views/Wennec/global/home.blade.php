@extends('layouts.dash')

@section('content')

@section('content')
    <div class="col-md-12">
        {{-- BEGIN HTML SAMPLE --}}

            @component('components.panel', ['icon' => 'icon-layers', 'title' => 'Introducción','contenido'=>'something','class'=>'panel-success'])
            @endcomponent

            @component('components.panel', ['icon' => 'icon-layers', 'title' => 'Beneficios','contenido'=>'something','class'=>'panel-info'])
            @endcomponent

             @component('components.panel', ['icon' => 'icon-layers', 'title' => 'Política Calidad','contenido'=>'something','class'=>'panel-warning'])
             @endcomponent

             @component('components.panel', ['icon' => 'icon-layers', 'title' => 'Objetivos Calidad','contenido'=>'something','class'=>'panel-primary'])
             @endcomponent

        {{-- END HTML SAMPLE --}}
    </div>
@endsection
  

@endsection
