@extends('layouts.dash')
@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}

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
                    title : '{{ $evento->Evento }}',
                    start : '{{ $evento->Fecha }}',
                    url : ''
                },
                @endforeach
                ]
            });
    });
</script>
