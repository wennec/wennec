@extends('layouts.dash')

@push('styles')
<!-- Datatables Styles -->
<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}
    @component('components.portlet', ['icon' => 'fa fa-object-group', 'title' => 'Plazos Temporales'])
        <div id="app">            
            {{--inicio tabla--}}
            <div class="table-responsive">
                <table id="data"  class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Dependencia</th>
                        <th class="text-center">Plazo</th>
                        <th class="text-center">Tipo Entrega</th>
                        <th class="text-center">Tipo Dia</th>   
                        <th class="text-center">Numero Dia</th>
                        <th class="text-center">Fecha</th>                     
                        <th class="text-center">Hora</th>
                        <th class="text-center">Observación</th>
                        <th class="text-center">Subir Archivo</th>
                        <th class="text-center">Ver</th>
                    </thead>
                    <tbody>
                        @foreach($jefes as $jefe)
                        <tr  class="text-center">
                            <td>{{$jefe->nombredepar}}</td>
                            <td>{{$jefe->nombreacti}}</td>
                            <td>{{$jefe->tipo_entrega}}</td>
                            @if(isset($jefe->tipo_dia))
                            <td>{{$jefe->tipo_dia}}</td>
                            @else
                                <td>x</td>
                            @endif
                            @if(isset($jefe->Num_Dia))
                            <td>{{$jefe->Num_Dia}}</td>
                            @else
                                <td>x</td>
                            @endif
                            @if(isset($jefe->fecha))
                            <td>{{$jefe->fecha}}</td>
                            @else
                                <td>x</td>
                            @endif
                            @if(isset($jefe->hora))
                            <td>{{$jefe->hora}}</td>
                            @else
                                <td>x</td>
                            @endif
                            @if(isset($jefe->observacion))
                            <td>{{$jefe->observacion}}</td>
                            @else
                                <td>x</td>
                            @endif
                            <td>
                            @if($jefe->fecha  >= \Carbon\Carbon::now() || $jefe->hora  >= \Carbon\Carbon::now())
                            {{link_to_route('jefeacttemp.edit', $title = '',$parameter = $jefe->id , $attributes = ['class' => 'btn btn-simple btn-warning btn-icon edit icon-pencil'])}}
                            @else
                            <span class="label label-success"> x <span>
                            @endif
                            </td>
                            <td><a href="Jefe/Archivos\{{$jefe->url_plazo}}" target="_blank"><button type="button" class="btn btn-info" title="Visualizar"><i class="fa fa-eye"></i></button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--fin tabla--}}
        </div>

    @endcomponent
</div>
@endsection
@push('styles')
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endpush
@push('functions')
  <!-- Datatables Scripts -->
  <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/pages/scripts/table-datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/localization/messages_es.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>

  <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>

  <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
          <script src="/js/DataTable.js" type="text/javascript">
          </script>
@endpush
