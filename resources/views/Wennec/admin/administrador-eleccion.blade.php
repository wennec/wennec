@extends('layouts.dash')

@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
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
                                <h1>Elecciones Wennec</h1>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" id="mymodal" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                                Crear Eleccion Estudiantil
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Eleccion Academica </h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'eleccionEscolar.store','method'=>'POST']) !!}
                            <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-12">
                                        <div class="form-group form-md-line-input">                                 
                                            {!!Form::text('nombreEleccion',null,['class'=>'form-control','placeholder'=>'Titulo Evento','required'])!!}
                                        </div>
                                    </div> 
                            </div>

                            <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label>Fecha Inicio</label>
                                        <div class="form-group form-md-line-input">                                 
                                                {!!Form::date('fechaInicio',null,['class'=>'form-control','placeholder'=>'Fecha','required'])!!}
                                        </div>
                                    </div> 

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Fecha Fin</label>
                                        <div class="form-group form-md-line-input">                                 
                                            {!!Form::date('fechaFin',null,['class'=>'form-control','placeholder'=>'Fecha','required'])!!}
                                        </div>
                                    </div> 
                            </div>
                                         
                                    {!! Form::submit('Crear Eleccion', ['class'=>'btn btn-large btn-primary']) !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>                        
                                {!! Form::close() !!}
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAddStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Agregar Estudiante</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'eleccionEstudiante.store','method'=>'POST']) !!}
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-12">
                                            <input id="city">
                                            <select name="FK_UsuarioId" id="select"></select> 
                                        </div> 
                                        <input type="hidden" name="FK_EleccionId" id="usuario_id">
                                </div>
                                         
                                {!! Form::submit('Crear Eleccion', ['class'=>'btn btn-large btn-primary']) !!}
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>                        
                                {!! Form::close() !!}
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Nombre Eleccion</th>
                                        <th class="text-center">Inicio</th>
                                        <th class="text-center">Fin</th>
                                        <th class="text-center">Agregar Estudiantes</th>
                                    </thead>
                                    <tbody>
                                    @foreach($eleccionColegios as $eleccionColegio)
                                        <tr class="text-center">
                                            <td>{{$eleccionColegio->nombreEleccion}}</td>
                                            <td>{{$eleccionColegio->fechaInicio}}</td>
                                            <td>{{$eleccionColegio->fechaFin}}</td>
                                            <td><button type="button" id="mymodal" data-usuario-id="{{$eleccionColegio->PK_id}}" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalAddStudent">
                                            <i class="fa fa-plus"></i></td>
                                        </tr>
                                    @endforeach
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(function() {
    var data = [
        @foreach($estudiantesId as $estudianteId)
        {
            value: {{$estudianteId->PK_id}}, text: '{{$estudianteId->only}}'
        },
        @endforeach
    ];
    
    data.forEach(function(val) {
        $('#select').append($('<option></option>').attr('value', val.value).text(val.text));
    });
    
    $('#city').keyup(function() {
        var inputValue = $(this).val();
        data.forEach(function(val) {
            if(val.text.toLowerCase().indexOf(inputValue.toLowerCase()) != -1) {
                $('#select option[value="'+val.value+'"]').remove();
                $('#select').append($('<option></option>').attr('value', val.value).text(val.text));
            } else {
                $('#select>option[value="'+val.value+'"]').remove();
            }
        });
    });
});
</script>


<script type="text/javascript">
$(document).ready(function (e) {
  $('#modalAddStudent').on('show.bs.modal', function(e) {
    var usuario_id = $(e.relatedTarget).data('usuario-id');
    $(e.currentTarget).find('input[name="FK_EleccionId"]').val(usuario_id);
    var docente = document.getElementById('usuario_id').innerHTML = usuario_id;
  });
});
</script>