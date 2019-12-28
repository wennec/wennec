@extends('layouts.dash') 

@section('content')

@section('content')

@php
  $rol = auth()->user()->rol->nombre;
@endphp

@if($rol == "Super Administrador")
<section>
        <div class="rad-body-wrapper rad-nav-min">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row spacenameSchool" >
                            <table class="headerName">
                                <tr>
                                    <td style="text-align: right; padding-right: 2rem;"><img src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                    <td><h1>Nombre Colegio</h1></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_agenda_1.png" alt="icon agenda">
                            <p class="verde text-uppercase">Agenda</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_comunicados.png" alt="icon Comunicados">
                        <p class="amarillo text-uppercase">Comunicados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_transporte.png" alt="icon Transporte">
                        <p class="rojo text-uppercase">Transporte</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_calificaciones.png" alt="icon calificaciones">
                        <p class="azul text-uppercase">Calificaciones</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_observador.png" alt="icon observador">
                        <p class="verde text-uppercase">Observador</p>
                    </div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_boletin.png" alt="icon boletin">
                            <p class="azul text-uppercase">Boletines</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_encuestas.png" alt="icon encuestas">
                        <p class="rojo text-uppercase">Encuestas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_gobiernoEscolar.png" alt="icon Gobierno Escolars">
                        <p class="amarillo text-uppercase">Gobierno<br/>Escolar</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Asistencia.png" alt="icon Asistencia">
                        <p class="verde text-uppercase">Asistencia</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Noticias.png" alt="icon Noticias">
                        <p class="amarillo text-uppercase">Noticias</p>
                    </div>
                </div>

                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_carnetizacion.png" alt="icon Carnetizacion">
                            <p class="rojo text-uppercase">Carnetización</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Certificados.png" alt="icon Certificados">
                        <p class="azul text-uppercase">Certificados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_admin.png" alt="icon admisiones">
                        <p class="verde text-uppercase">Admisiones<br/>y matriculas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_horarios.png" alt="icon Horarios">
                        <p class="azul text-uppercase">Horarios<br/>de clase</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_pagos.png" alt="icon Noticias">
                        <p class="rojo text-uppercase">Pagos<br/>Electrónicos</p>
                    </div>
                </div>

                <div class="row spacefour" style="margin-bottom: 5rem;">
                    <div class="col-md-2 col-md-offset-4 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_AulaVirtal.png" alt="icon Carnetizacion">
                            <p class="amarillo text-uppercase">Aulas virtuales</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Cartera.png" alt="icon Certificados">
                        <p class="verde text-uppercase">Gestión<br/>de cartera</p>
                    </div>
                    <div class=" col-md-offset-4"></div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($rol == "Administrador")
    <section>
        <div class="rad-body-wrapper rad-nav-min">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row spacenameSchool" >
                            <table class="headerName">
                                <tr>
                                    <td style="text-align: right; padding-right: 2rem;"><img src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                    <td><h1>Nombre Colegio</h1></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_agenda_1.png" alt="icon agenda">
                            <p class="verde text-uppercase">Agenda</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_comunicados.png" alt="icon Comunicados">
                        <p class="amarillo text-uppercase">Comunicados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_transporte.png" alt="icon Transporte">
                        <p class="rojo text-uppercase">Transporte</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_calificaciones.png" alt="icon calificaciones">
                        <p class="azul text-uppercase">Calificaciones</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_observador.png" alt="icon observador">
                        <p class="verde text-uppercase">Observador</p>
                    </div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_boletin.png" alt="icon boletin">
                            <p class="azul text-uppercase">Boletines</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_encuestas.png" alt="icon encuestas">
                        <p class="rojo text-uppercase">Encuestas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_gobiernoEscolar.png" alt="icon Gobierno Escolars">
                        <p class="amarillo text-uppercase">Gobierno<br/>Escolar</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Asistencia.png" alt="icon Asistencia">
                        <p class="verde text-uppercase">Asistencia</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Noticias.png" alt="icon Noticias">
                        <p class="amarillo text-uppercase">Noticias</p>
                    </div>
                </div>

                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_carnetizacion.png" alt="icon Carnetizacion">
                            <p class="rojo text-uppercase">Carnetización</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Certificados.png" alt="icon Certificados">
                        <p class="azul text-uppercase">Certificados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_admin.png" alt="icon admisiones">
                        <p class="verde text-uppercase">Admisiones<br/>y matriculas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_horarios.png" alt="icon Horarios">
                        <p class="azul text-uppercase">Horarios<br/>de clase</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_pagos.png" alt="icon Noticias">
                        <p class="rojo text-uppercase">Pagos<br/>Electrónicos</p>
                    </div>
                </div>

                <div class="row spacefour" style="margin-bottom: 5rem;">
                    <div class="col-md-2 col-md-offset-4 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_AulaVirtal.png" alt="icon Carnetizacion">
                            <p class="amarillo text-uppercase">Aulas virtuales</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Cartera.png" alt="icon Certificados">
                        <p class="verde text-uppercase">Gestión<br/>de cartera</p>
                    </div>
                    <div class=" col-md-offset-4"></div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($rol == "Estudiante")
    <section>
        <div class="rad-body-wrapper rad-nav-min">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row spacenameSchool" >
                            <table class="headerName">
                                <tr>
                                    <td style="text-align: right; padding-right: 2rem;"><img src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                    <td><h1>Nombre Colegio</h1></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_agenda_1.png" alt="icon agenda">
                            <p class="verde text-uppercase">Agenda</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_comunicados.png" alt="icon Comunicados">
                        <p class="amarillo text-uppercase">Comunicados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_transporte.png" alt="icon Transporte">
                        <p class="rojo text-uppercase">Transporte</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_calificaciones.png" alt="icon calificaciones">
                        <p class="azul text-uppercase">Calificaciones</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_observador.png" alt="icon observador">
                        <p class="verde text-uppercase">Observador</p>
                    </div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_boletin.png" alt="icon boletin">
                            <p class="azul text-uppercase">Boletines</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_encuestas.png" alt="icon encuestas">
                        <p class="rojo text-uppercase">Encuestas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_gobiernoEscolar.png" alt="icon Gobierno Escolars">
                        <p class="amarillo text-uppercase">Gobierno<br/>Escolar</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Asistencia.png" alt="icon Asistencia">
                        <p class="verde text-uppercase">Asistencia</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Noticias.png" alt="icon Noticias">
                        <p class="amarillo text-uppercase">Noticias</p>
                    </div>
                </div>

                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_carnetizacion.png" alt="icon Carnetizacion">
                            <p class="rojo text-uppercase">Carnetización</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Certificados.png" alt="icon Certificados">
                        <p class="azul text-uppercase">Certificados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_admin.png" alt="icon admisiones">
                        <p class="verde text-uppercase">Admisiones<br/>y matriculas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_horarios.png" alt="icon Horarios">
                        <p class="azul text-uppercase">Horarios<br/>de clase</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_pagos.png" alt="icon Noticias">
                        <p class="rojo text-uppercase">Pagos<br/>Electrónicos</p>
                    </div>
                </div>

                <div class="row spacefour" style="margin-bottom: 5rem;">
                    <div class="col-md-2 col-md-offset-4 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_AulaVirtal.png" alt="icon Carnetizacion">
                            <p class="amarillo text-uppercase">Aulas virtuales</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Cartera.png" alt="icon Certificados">
                        <p class="verde text-uppercase">Gestión<br/>de cartera</p>
                    </div>
                    <div class=" col-md-offset-4"></div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($rol == "Acudiente")
    <section>
        <div class="rad-body-wrapper rad-nav-min">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row spacenameSchool" >
                            <table class="headerName">
                                <tr>
                                    <td style="text-align: right; padding-right: 2rem;"><img src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                    <td><h1>Nombre Colegio</h1></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_agenda_1.png" alt="icon agenda">
                            <p class="verde text-uppercase">Agenda</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_comunicados.png" alt="icon Comunicados">
                        <p class="amarillo text-uppercase">Comunicados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_transporte.png" alt="icon Transporte">
                        <p class="rojo text-uppercase">Transporte</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_calificaciones.png" alt="icon calificaciones">
                        <p class="azul text-uppercase">Calificaciones</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_observador.png" alt="icon observador">
                        <p class="verde text-uppercase">Observador</p>
                    </div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_boletin.png" alt="icon boletin">
                            <p class="azul text-uppercase">Boletines</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_encuestas.png" alt="icon encuestas">
                        <p class="rojo text-uppercase">Encuestas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_gobiernoEscolar.png" alt="icon Gobierno Escolars">
                        <p class="amarillo text-uppercase">Gobierno<br/>Escolar</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Asistencia.png" alt="icon Asistencia">
                        <p class="verde text-uppercase">Asistencia</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Noticias.png" alt="icon Noticias">
                        <p class="amarillo text-uppercase">Noticias</p>
                    </div>
                </div>

                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_carnetizacion.png" alt="icon Carnetizacion">
                            <p class="rojo text-uppercase">Carnetización</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Certificados.png" alt="icon Certificados">
                        <p class="azul text-uppercase">Certificados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_admin.png" alt="icon admisiones">
                        <p class="verde text-uppercase">Admisiones<br/>y matriculas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_horarios.png" alt="icon Horarios">
                        <p class="azul text-uppercase">Horarios<br/>de clase</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_pagos.png" alt="icon Noticias">
                        <p class="rojo text-uppercase">Pagos<br/>Electrónicos</p>
                    </div>
                </div>

                <div class="row spacefour" style="margin-bottom: 5rem;">
                    <div class="col-md-2 col-md-offset-4 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_AulaVirtal.png" alt="icon Carnetizacion">
                            <p class="amarillo text-uppercase">Aulas virtuales</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Cartera.png" alt="icon Certificados">
                        <p class="verde text-uppercase">Gestión<br/>de cartera</p>
                    </div>
                    <div class=" col-md-offset-4"></div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($rol == "Docente")
    <section>
        <div class="rad-body-wrapper rad-nav-min">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row spacenameSchool" >
                            <table class="headerName">
                                <tr>
                                    <td style="text-align: right; padding-right: 2rem;"><img src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                    <td><h1>Nombre Colegio</h1></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_agenda_1.png" alt="icon agenda">
                            <p class="verde text-uppercase">Agenda</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_comunicados.png" alt="icon Comunicados">
                        <p class="amarillo text-uppercase">Comunicados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_transporte.png" alt="icon Transporte">
                        <p class="rojo text-uppercase">Transporte</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_calificaciones.png" alt="icon calificaciones">
                        <p class="azul text-uppercase">Calificaciones</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_observador.png" alt="icon observador">
                        <p class="verde text-uppercase">Observador</p>
                    </div>
                </div>
                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_boletin.png" alt="icon boletin">
                            <p class="azul text-uppercase">Boletines</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_encuestas.png" alt="icon encuestas">
                        <p class="rojo text-uppercase">Encuestas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_gobiernoEscolar.png" alt="icon Gobierno Escolars">
                        <p class="amarillo text-uppercase">Gobierno<br/>Escolar</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Asistencia.png" alt="icon Asistencia">
                        <p class="verde text-uppercase">Asistencia</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Noticias.png" alt="icon Noticias">
                        <p class="amarillo text-uppercase">Noticias</p>
                    </div>
                </div>

                <div class="row spacefour">
                    <div class="col-md-2 col-md-offset-1 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_carnetizacion.png" alt="icon Carnetizacion">
                            <p class="rojo text-uppercase">Carnetización</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Certificados.png" alt="icon Certificados">
                        <p class="azul text-uppercase">Certificados</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_admin.png" alt="icon admisiones">
                        <p class="verde text-uppercase">Admisiones<br/>y matriculas</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_horarios.png" alt="icon Horarios">
                        <p class="azul text-uppercase">Horarios<br/>de clase</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_pagos.png" alt="icon Noticias">
                        <p class="rojo text-uppercase">Pagos<br/>Electrónicos</p>
                    </div>
                </div>

                <div class="row spacefour" style="margin-bottom: 5rem;">
                    <div class="col-md-2 col-md-offset-4 text-center">
                            <img src="new-assets/img/icon/iconHome/iconWennnec_AulaVirtal.png" alt="icon Carnetizacion">
                            <p class="amarillo text-uppercase">Aulas virtuales</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="new-assets/img/icon/iconHome/iconWennnec_Cartera.png" alt="icon Certificados">
                        <p class="verde text-uppercase">Gestión<br/>de cartera</p>
                    </div>
                    <div class=" col-md-offset-4"></div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
  

@endsection
