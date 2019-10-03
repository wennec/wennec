@extends('Wennec.reporte.master-horario')
@section('body')

<div class="col-md-12">

    <!-- Static Table Start -->
    <div class="calender-area mg-b-15-calendar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="calender-inner">
                        <div id='calendario'></div>
                        <h3>Hola mundo</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script type="text/javascript">

$(function() {

  var todayDate = moment().startOf('day');
  var YM = todayDate.format('YYYY-MM');
  var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
  var TODAY = todayDate.format('YYYY-MM-DD');
  var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

  $('#calendario').fullCalendar({
    lang: 'es',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay,listWeek'
    },
    dayNamesShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
    monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
    buttonText: {
      week: 'semana',
      day: 'dia',
      list: 'lista',
      today: 'hoy'
    },
    defaultView: 'agendaWeek',
    views: {
      week: {
        titleFormat: 'D MMMM YYYY',
        titleRangeSeparator: ' - ',

      }
    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    navLinks: true,
    backgroundColor: '#1f2e86',
    eventTextColor: '#1f2e86',
    textColor: '#378006',
    dayClick: function(date, jsEvent, view) {

      alert('Clicked on: ' + date.format());

      alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

      alert('Current view: ' + view.name);

      // change the day's background color just for fun
      $(this).css('background-color', 'red');

    },
    events: [
      @foreach($horarios as $horario)
        {
          title: '{{ $horario->nombre_materia}}',
          start: '{{ $horario->horaInicio}}',
          end: '{{ $horario->horaFin}}',
          description: "Profesor(a): " + '{{ $horario->nom_teacher}}',
          dow: ['{{ $horario->PK_id}}'],
        },
      @endforeach
    ],
  });
});
</script>
