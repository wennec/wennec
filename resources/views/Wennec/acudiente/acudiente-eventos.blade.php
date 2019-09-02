@extends('layouts.dash')
@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}

    <!-- Button trigger modal -->
    <button type="button" id="mymodal" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
        <i class="fa fa-plus"></i>
                Crear Peticion
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Peticion</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'agendaEstudiante.store','method'=>'POST']) !!}
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
    <!-- Static Table Start -->
    <div class="calender-area mg-b-15-calendar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="calender-inner">
                        <div id='calendario'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>

<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>

    $(document).ready(function() {
        $('#calendario').fullCalendar({
            defaultDate:$.now(),
            locale: 'es',
                editable: true,
                eventLimit: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                dayNamesShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
                monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
                events : [
                @foreach($eventos as $evento)
                {
                    title : '{{ $evento->tipo_agenda}}',
                    start : '{{ $evento->fecha }}',
                    description: '{{ $evento->descripcion }}',
                    url : ''
                },
                @endforeach
                ],
                eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#modalBody').html(event.description);
                $('#fullCalModal').modal();
            }
            });
    });
</script>
