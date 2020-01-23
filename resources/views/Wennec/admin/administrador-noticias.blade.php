@extends('layouts.dash')

@section('content')
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}
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
                                        <td style="text-align: right; padding-right: 2rem;"><img
                                                src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            <h1>Nombre Colegio</h1>
                                        </td>
                                    </tr>
                                </table>

                                <section id="comunicados">
                                    <header class="text-uppercase mt-3" id="headerText">
                                        <img src="new-assets/img/icon/NOTICIAS TITULO.png" height="30" alt="">
                                        <span> NOTICIAS</span>
                                    </header>

                                    @php
                                    $rol = auth()->user()->rol->nombre;
                                    @endphp
                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-9 col-xs-9">
                                                <form name="FilterForm" id="FilterForm" action="" method="">
                                                    <input type="text" id="buscarAgenda" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar">
                                                </form>
                                            </div>
                                            @if($rol == "Administrador")
                                            <div class="col-md-3 col-xs-3 text-right">
                                                <button type="button" class="btnAgregar" id="btnAgregar" data-toggle="modal"
                                                    data-target="#modalCrearNoticias"><img src="new-assets/img/icon/agregar.png"
                                                        alt="agregar dato en agenda"></button>
                                            </div>
                                            @endif
                                        </div>

                                        <table id="tablaAgenda">
                                        @foreach($notices as $notice)
                                            <tbody>
                                                <tr class="styleFila"> 
                                                    <td style="width: 15%;position: relative;" >
                                                        <img class="mt-2" src="new-assets/img/icon/NOTICIAS TITULO.png" alt="" width="120">
                                                    </td>
                                                    
                                                    <td style="width: 85%;position: relative;" >
                                                        @if($rol == "Administrador")
                                                        <a class="iconEditar" href="#modalEditarNoticia" data-toggle="modal"
                                                        data-target="#modalEditarNoticia"><img src="new-assets/img/icon/editar.png"></a>
                                                        @endif
                                                        <aside style="width: 88%; border:0px; margin: .5em auto;text-align: center;">
                                                            <h3 class="text-left">{{$notice->tipoNoticia}}</h3>
                                                            <p class="text-left"> <small>
                                                              
                                                            {{$notice->descripcion}}

                                                            </small>
                                                            </p>
                                                            <hr class="hrcomunicados">
                                                            <button class="btnleer text-center mt-3 mb-2">Leer más</button>
                                                        </aside>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border-bottom: .75px solid  #E2E2E2;">
                                                        <p class="borderTable"></p>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                            @endforeach
                                        </table>


                                    </aside>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Crear -->
    <div class="modal fade" id="modalCrearNoticias" tabindex="9" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" style="width: 100%;">Nueva Noticia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'noticiasA.store','method'=>'POST','files' => true, 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-row">
                          <div class="col-md-8">
                            <div class="form-group" style="width: 90%;">
                                <input type="text" name="tipoNoticia" class="form-control" placeholder="Titulo*">
                                <textarea name="descripcion" id=""  value="Texto*" class="form-control" cols="30" rows="6" placeholder="Descripcion*" style="margin:0px !important;"></textarea>

                                {!!Form::date('fechaInicio',null,['class'=>'form-control','placeholder'=>'Fecha de inicio','required'])!!}
                                {!!Form::date('fechaFin',null,['class'=>'form-control','placeholder'=>'Fecha fin','required'])!!}
                            </div>
                          </div>
                          <div class="col-md-4 text-center" id="formImage">
                            <img src="new-assets/img/escudoColegio.png" alt="" width="170">
                          </div>
                        </div>
                        <div class="form-row text-center">
                            <button class="btnPublicar text-center mt-3 mb-2">publicar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal Editar -->
<div class="modal fade" id="modalEditarNoticia" tabindex="9" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title text-uppercase" style="width: 100%;">Editar Noticia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'noticiasA.store','method'=>'POST','files' => true, 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-row">
                          <div class="col-md-8">
                            <div class="form-group" style="width: 90%;">
                                <input type="text" name="tipoNoticia" class="form-control" placeholder="Titulo*">
                                <textarea name="descripcion" id=""  value="Texto*" class="form-control" cols="30" rows="6" placeholder="Descripcion*" style="margin:0px !important;"></textarea>

                                {!!Form::date('fechaInicio',null,['class'=>'form-control','placeholder'=>'Fecha de inicio','required'])!!}
                                {!!Form::date('fechaFin',null,['class'=>'form-control','placeholder'=>'Fecha fin','required'])!!}
                            </div>
                          </div>
                          <div class="col-md-4 text-center" id="formImage">
                            <img src="new-assets/img/escudoColegio.png" alt="" width="170">
                          </div>
                        </div>
                        <div class="form-row text-center">
                            <button class="btnPublicar text-center mt-3 mb-2">publicar</button>
                        </div>
                    {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
    
@endsection
