@extends('layouts.dash')
@section('content')
<section>
    <div class="rad-body-wrapper rad-nav-min">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row spacenameSchool">
                        <!--header img name school-->
                        <table class="headerName">
                            <tr>
                                <td style="text-align: inherit; padding-left: 5rem;"><img
                                        src="new-assets/img/EscudoColegios/GSN.png" alt="image colegio" style="width: 40px;">
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>

                        <section id="Agenda">
                            <header class="text-uppercase" id="headerText">
                                <img src="new-assets/img/icon/HORARIOS DE CLASE COLOR MENU PLEGABLE.png" height="30" alt="">
                                <span> Horario</span>
                            </header>
                        </section>

                        
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <section>
        <div class="col-md-12">
        <button type="button" name="button" onclick="myFunctionPrint()" class="btn btn-primary">Imprimir Horario</button>
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
        </section>
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
    
</section>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>

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
    eventLimit: true, // allow "more" link when too many events
    navLinks: true,
    backgroundColor: '#1f2e86',
    eventTextColor: '#1f2e86',
    textColor: '#378006',
    events: [
      @foreach($horario as $horarios)
        {
          title: '{{ $horarios->nombre_materia}}' + "\n Profesor(a): " + '{{ $horarios->nom_teacher}}',
          start: '{{ $horarios->horaInicio}}',
          end: '{{ $horarios->horaFin}}',
          description: "Profesor(a): " + '{{ $horarios->nom_teacher}}',
          dow: ['{{ $horarios->PK_id}}'],
        },
      @endforeach
    ],
    eventClick: function(event, jsEvent, view) {
    $('#modalTitle').html(event.title);
    $('#modalBody').html(event.description);
    $('#fullCalModal').modal();
    }
  });
});
</script>

<script>
    function myFunctionPrint() {
    window.print();
    }
</script>


@endsection



