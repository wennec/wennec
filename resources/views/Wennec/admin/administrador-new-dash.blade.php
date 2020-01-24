<!--Slidebar Left-->
<aside>
        <nav class="rad-sidebar rad-nav-min">
            <ul style="position: absolute; left: 0; top: 20px;opacity: 0;">
                <li>Logo</li>
                <li>Footer</li>
            </ul>
            <ul class="menuLeft">
                <li>
                    <a href="/inicio" class="inbox">
                        <span class="rad-sidebar-item">Inicio</span>
                        <i class="item1"> <img src="new-assets/img/icon/iconMenu/icon1_Home.png" alt=""><span
                                class="icon-bg rad-bg-blue"></span></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agendaA.index') }}">
                        <i class="item2"> <img src="new-assets/img/icon/iconMenu/icon21_agenda.png" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Agenda</span>
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
                    <a href="" class="done">
                        <i class="item4"> <img src="new-assets/img/icon/iconMenu/icon41_transporte.png" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Transporte</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('fechaevaluaciondocenteA.index') }}" class="done">
                        <i class="item8"> <img src="new-assets/img/icon/iconMenu/icon81_encuentas.png" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Encuestas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('eleccionEscolar.index') }}" class="snooz">
                        <i class="item9"> <img src="new-assets/img/icon/iconMenu/icon91_gobiernoE.png" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Gobierno Escolar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('noticiasA.index') }}">
                        <i class="item11"> <img src="new-assets/img/icon/iconMenu/icon111_noticias.png" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Noticias</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('prematricula.index') }}">
                        <i class="item14"> <img src="new-assets/img/icon/iconMenu/icon141_admisiones.png" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Admisiones y matriculas</span>
                    </a>
                </li>
                <li>
                    <a href="/horarios" class="">
                        <i class="item15"> <img src="new-assets/img/icon/iconMenu/icon151_horarios.png" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Horarios de clase</span>
                    </a>
                </li>
            </ul>
            <div class="col-xs-4 ocultar">
                <img src="new-assets/img/footerLogo.png" alt="" width="120px" height="70px" style="padding: 1em;margin-left: 0em;position: absolute;bottom: 10%;" >
            </div>
        </nav>
    </aside>