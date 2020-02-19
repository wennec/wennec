@extends('layouts.dash')
@section('content')
<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row calificacioneSection" style="margin-bottom:.25em;">
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

                                <section id="comunicados">
                                    <header class="text-uppercase mt-3" id="headerText" style="margin:2em auto .5em !important;">
                                        <img src="new-assets/img/icon/ASISTENCIA TITULO.png" height="30" alt="">
                                        <span> Asistencia</span>
                                        <br>
                                        
                                    </header>
                                    <div class="row mt-4" style="width: 100%;">
                                        <section style="position: relative; width: 100%;">
                                            <hr style="width: 100%;">
                                        <h3 style="width: 100%; text-align: center;">Efrain Andres Vergara - 101</h3>
                                        <hr style="width: 100%;">
                                        </section>
                                      <div class="col-md-5 col-xs-5" id="colCertifi" style=" margin:0 auto !important; padding:0px !important;">
                                          <h3 style="padding:0em 2em;color: #808080;">Retardos</h3>
                                          <table  id="task-list-tbl" class="table" style="width:80%;margin:0 auto !important; font-size: 0.95em;">
                                            
                                            <tbody>
                                                @foreach($asistencia as $asistencias)
                                                    @if($asistencias->tipo_control_asistencia == "Retardo")
                                                    <tr>
                                                        <td>{{ $asistencias->fecha }}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                      </div>
                                      <div class="col-md-5 col-xs-5 ml-5" id="colCertifi" style="margin:0 auto !important;padding:0px !important;">
                                        <h3 style="padding:0em 2em;color: #808080;">Fallas</h3>
                                        <table  id="task-list-tbl" class="table" style="width:80%;margin:0 auto !important; font-size: 0.95em;">
                                            
                                            <tbody>
                                                @foreach($asistencia as $asistencias)
                                                    @if($asistencias->tipo_control_asistencia == "Falla")
                                                    <tr>
                                                        <td>{{ $asistencias->fecha }}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

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
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        dayNamesShort: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
        monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
        buttonText: {
            month: 'mes',
            week: 'semana',
            day: 'dia',
            list: 'lista',
            today: 'hoy'
        },
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
            @foreach($asistencia as $evento)
            {
                title : '{{ $evento->tipo_control_asistencia}}',
                start : '{{ $evento->fecha }}',
                description: '<b>Tipo Asistencia: ' + '{{ $evento->tipo_control_asistencia}}' + '<br/><b>Fecha: ' + '{{ $evento->fecha }}',
                url : ''
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

@endsection
