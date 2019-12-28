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
                    <a href="{{ route('eventoA.index') }}">
                        <i class="item2"> <img src="new-assets/img/icon/iconMenu/icon21_agenda.png" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Agenda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agendaAcudiente.index') }}" class="snooz">
                        <i class="item3"> <img src="new-assets/img/icon/iconMenu/icon31_comunicados.png" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Comunicados</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="done">
                        <i class="item4"> <img src="new-assets/img/icon/iconMenu/icon41_transporte.png" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Transporte</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('acudienteEstudianteCalificaciones.index') }}" class="">
                        <i class="item5"> <img src="new-assets/img/icon/iconMenu/icon51_calificaciones.png" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Calificaciones</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('observacionAcudiente.index') }}" class="inbox">
                        <i class="item6"> <img src="new-assets/img/icon/iconMenu/icon61_observador.png" alt=""><span
                                class="icon-bg rad-bg-success"></span></i>
                        <span class="rad-sidebar-item">Observador</span>
                    </a>
                </li>
                <li>
                    <a href="" class="">
                        <i class="item7"> <img src="new-assets/img/icon/iconMenu/icon71_boletines.png" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Boletines</span>
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
                    <a href="#">
                        <i class="item14"> <img src="new-assets/img/icon/iconMenu/icon141_admisiones.png" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Admisiones y matriculas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pagosAcudiente.index') }}" class="done">
                        <i class="item16"> <img src="new-assets/img/icon/iconMenu/icon161_pagosElectronicos.png" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Pagos Electrónicos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pagosAcudiente.index') }}">
                        <i class="item18"> <img src="new-assets/img/icon/iconMenu/icon181_gestionCartera.png" alt="">
                            <span class="icon-bg rad-bg-success"></span>
                        </i>
                        <span class="rad-sidebar-item">Gestión de cartera</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>