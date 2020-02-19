<!--Slidebar Left-->
<aside>
        <nav class="rad-sidebar rad-nav-min">
            <ul class="menuLeft">
                <li>
                    <a href="/inicio" class="inbox">
                        <span class="rad-sidebar-item">Inicio</span>
                        <i class="item1"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon1_Home.png') }}" alt=""><span
                                class="icon-bg rad-bg-blue"></span></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agendaEstudiante.index') }}">
                        <i class="item2"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon21_agenda.png') }}" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Agenda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agendaEstudianteCalendar.index') }}">
                        <i class="item2"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon21_agenda.png') }}" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Agenda - Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('eventoA.index') }}" class="snooz">
                        <i class="item3"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon31_comunicados.png') }}" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Comunicados</span>
                    </a>
                </li>
                <li>
                    <a href="transporte.html" class="done">
                        <i class="item4"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon41_transporte.png') }}" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Transporte</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('calificacionEstudiante.index') }}" class="">
                        <i class="item5"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon51_calificaciones.png') }}" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Calificaciones</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('observacionEstudiante.index') }}" class="inbox">
                        <i class="item6"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon61_observador.png') }}" alt=""><span
                                class="icon-bg rad-bg-success"></span></i>
                        <span class="rad-sidebar-item">Observador</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('evaluacionDocenteE.index') }}" class="done">
                        <i class="item8"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon81_encuentas.png') }}" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Evaluación Docente</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('eleccionEstudiante.index') }}" class="snooz">
                        <i class="item9"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon91_gobiernoE.png') }}" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Gobierno Escolar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('asistenciaEstudiante.index') }}">
                        <i class="item10"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon101_asistencia.png') }}" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Asistencia</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('noticiasA.index') }}">
                        <i class="item11"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon111_noticias.png') }}" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Noticias</span>
                    </a>
                </li>
                <li>
                    <a href="carnetizacion.html" class="done">
                        <i class="item12"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon121_carnetizacion.png') }}" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Carnetizacion</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('horarioE.index') }}" class="">
                        <i class="item15"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon151_horarios.png') }}" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Horarios de clase</span>
                    </a>
                </li>
                <li>
                    <a href="https://wennec.com/wennecaulas/">
                        <i class="item17"> <img src="{{ asset('new-assets/img/icon/iconMenu/icon171_aulasVirtuales.png') }}" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Aulas Virtuales</span>
                    </a>
                </li>
            </ul>
            <div class="col-xs-4 ocultar">
                <img src="{{ asset('new-assets/img/footerLogo.png') }}" alt="" width="120px" height="70px" style="padding: 1em;margin-left: 0em;position: absolute;bottom: 10%;" >
            </div>
        </nav>
    </aside>