@extends('layouts.dash')
@section('content')

<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-12">
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
                                        <img src="new-assets/img/icon/AGENDA TITULO.png" height="30" alt="">
                                        <span> Agenda</span>
                                    </header>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

                <section>
                <div class="col-md-12">
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
@endsection




