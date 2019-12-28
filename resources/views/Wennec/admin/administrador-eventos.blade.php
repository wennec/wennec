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
                                        <td style="text-align: right; padding-right: 2rem;"><img
                                                src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            <h1>Nombre Colegio</h1>
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="new-assets/img/icon/AGENDA TITULO.png" height="30" alt="">
                                        <span> Agenda</span>
                                    </header>


                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-9 col-xs-9">
                                                <form name="FilterForm" id="FilterForm" action="" method="">
                                                    <input type="text" id="buscarAgenda" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar">
                                                </form>
                                            </div>
                                            <div class="col-md-3 col-xs-3 text-right">
                                                <button type="button" class="btnAgregar" id="btnAgregar" data-toggle="modal"
                                                    data-target="#modalCrearAgenda"><img src="new-assets/img/icon/agregar.png"
                                                        alt="agregar dato en agenda"></button>
                                            </div>
                                        </div>

                                        <table id="tablaAgenda">
                                            <thead>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr class="styleFila">  
                                                    <td style="width: 30%;" class="fechaAgenda">
                                                        <span class="NumFecha">22</span>
                                                        <span class="finFecha">Lun. <br>/07 </span>
                                                    </td>

                                                    <td style="width: 70%;position: relative;" >
                                                        <a class="iconEditar" href="#modalEditarAgenda" data-toggle="modal"
                                                        data-target="#modalEditarAgenda"><img src="new-assets/img/icon/editar.png"></a>
                                                        <aside style="width: 88%;">
                                                            <h4>Materia, perfil</h4>
                                                            <h5>Asunto</h5>
                                                            <p>
                                                                Cordial Saludo,
                                                                <br>
                                                                Queremos felicitar al estudiante Martín Pérez por su
                                                                buen desempeño academico y
                                                                comportamental en el bimestre.
                                                            </p>
                                                        </aside>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border-bottom: .75px solid  #E2E2E2;">
                                                        <p class="borderTable"></p>
                                                    </td>
                                                </tr>
                                                <tr class="styleFila">  
                                                    <td style="width: 30%;" class="fechaAgenda">
                                                        <span class="NumFecha">24</span>
                                                        <span class="finFecha">Lun. <br>/07 </span>
                                                    </td>
                                                    <td style="width: 70%;position: relative;" >
                                                        <a class="iconEditar" href="agenda_edit.html"><img src="new-assets/img/icon/editar.png"></a>
                                                        <aside style="width: 88%;">
                                                            <h4>Materia, perfil</h4>
                                                            <h5>Asunto</h5>
                                                            <p>
                                                                Cordial Saludo,
                                                                <br>
                                                                Queremos felicitar al estudiante Martín Pérez por su
                                                                buen desempeño academico y
                                                                comportamental en el bimestre.
                                                            </p>
                                                        </aside>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border-bottom: .75px solid  #E2E2E2;">
                                                        <p class="borderTable"></p>
                                                    </td>
                                                </tr>
                                            </tbody>
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
<div class="modal fade" id="modalCrearAgenda" tabindex="9" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" style="width: 100%;">NUEVA ANOTACIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'eventoA.store','method'=>'POST']) !!}
                        <div class="form-row">
                          <div class="col-md-8">
                            {!!Form::text('titulo_evento',null,['class'=>'form-control','placeholder'=>'Titulo*','required'])!!}
                            {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Fecha*','required'])!!}
                            <select class="form-control" name="FK_EventosId" id="" required="">
                                @foreach($tipoEventos as $tipoEvento)
                                    <option value="{{$tipoEvento->PK_id}}">{{$tipoEvento->tipo_evento}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-md-4 text-center" id="formImage">
                            <img src="new-assets/img/escudoColegio.png" alt="" width="100">
                          </div>
                        </div>
                        <div class="form-row text-center">
                            <button type="submit" class="btnPublicar text-center mt-3 mb-2">publicar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal Editar -->
<div class="modal fade" id="modalEditarAgenda" tabindex="9" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title text-uppercase" style="width: 100%;">Editar ANOTACIÓN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Titulo*">
                    <input type="text" class="form-control" placeholder="Asunto*">
                    <input type="text" class="form-control" placeholder="Tipo*">
                  </div>
                  <div class="col-md-4 text-center" id="formImage">
                    <img src="new-assets/img/escudoColegio.png" alt="" width="100">
                  </div>
                </div>
                <div class="form-row text-center">
                    <textarea name="" id="" value="Texto*" class="form-control" cols="30" rows="4" placeholder="Texto*"></textarea>
                    <button class="btnPublicar text-center mt-3 mb-2">publicar</button>
                </div>
              </form>
        </div>
    </div>
</div>
</div>
@endsection



