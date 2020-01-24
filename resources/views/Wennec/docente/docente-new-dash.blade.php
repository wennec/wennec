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
                    <a href="{{ route('eventoA.index') }}" class="snooz">
                        <i class="item3"> <img src="new-assets/img/icon/iconMenu/icon31_comunicados.png" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Comunicados</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('calificacionDocente.index') }}" class="">
                        <i class="item5"> <img src="new-assets/img/icon/iconMenu/icon51_calificaciones.png" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Calificaciones</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('observacionDocente.index') }}" class="inbox">
                        <i class="item6"> <img src="new-assets/img/icon/iconMenu/icon61_observador.png" alt=""><span
                                class="icon-bg rad-bg-success"></span></i>
                        <span class="rad-sidebar-item">Observador</span>
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
                    <a href="#" class="done">
                        <i class="item12"> <img src="new-assets/img/icon/iconMenu/icon121_carnetizacion.png" alt="">
                            <span class="icon-bg rad-bg-danger"></span>
                        </i>
                        <span class="rad-sidebar-item">Carnetizacion</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reportes.index') }}" class="">
                        <i class="item13"> <img src="new-assets/img/icon/iconMenu/icon131_certificados.png" alt="">
                            <span class="icon-bg rad-bg-blue"></span></i>
                        <span class="rad-sidebar-item">Certificados</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="item17"> <img src="new-assets/img/icon/iconMenu/icon171_aulasVirtuales.png" alt="">
                            <span class="icon-bg rad-bg-warning"></span>
                        </i>
                        <span class="rad-sidebar-item">Aulas Virtuales</span>
                    </a>
                </li>
            </ul>
            <div class="col-xs-4 ocultar">
                <img src="new-assets/img/footerLogo.png" alt="" width="120px" height="70px" style="padding: 1em;margin-left: 0em;position: absolute;bottom: 10%;" >
            </div>
        </nav>
    </aside>