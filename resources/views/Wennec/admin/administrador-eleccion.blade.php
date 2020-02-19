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
                            <div class="row spacenameSchool" style="margin-bottom:.25em;">
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
                                    <header class="text-uppercase mt-3" id="headerText">
                                        <img src="new-assets/img/icon/GOBIERNO ESCOLAR TITULO.png" height="30" alt="">
                                        <span> Gobierno Escolar</span>
                                    </header>
                                </section>
                            </div>
                            <div class="row" style="position: relative;">
                               
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/icon/ESTUDIANTE 1.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>4° C</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/icon/ESTUDIANTE 2.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>7° C</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/icon/ESTUDANTE 3.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>9° C</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <aside >
                                <button type="button" class="btnAgregar btnEscolar" id="btnAgregar" data-toggle="modal"
                                data-target="#modalCrearEscolar"><img src="new-assets/img/icon/agregar.png"
                                    alt="agregar dato en transporte"></button>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  <!-- Modal Crear -->
  <div class="modal fade" id="modalCrearEscolar" tabindex="9" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header text-left">
              <h5 class="modal-title text-uppercase" style="width: 100%;">Crear votación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form>
                  <div class="form-row">
                      <div class="col-md-12">
                          <div class="form-group" style="width: 100%;">
                              <input type="text" class="form-control" placeholder="Nombre de elección">
                              
                              <small>Fecha inicio</small>
                              <input type="date" class="form-control">
                              <small>Fecha cierre</small>
                              <input type="date" class="form-control">

                              <p class="text-uppercase" style="color: #5995F8;border-top: 1px solid #c8c8c8; border-bottom: 1px solid #c8c8c8;">Candidato</p>
                              
                              <b>Agregar Candidato</b>
                              <input type="text" class="form-control" placeholder="Nombre">
                              
                              <input type="number" class="form-control" placeholder="Curso">
                              <form class="md-form">
                                <div class="file-field">
                                  <div class="mb-4">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                     width="50" class="rounded-circle z-depth-1-half avatar-pic" style="vertical-align: middle;" alt="example placeholder avatar">
                                     <input type="file">
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                      
                  </div>
                  <div class="form-row text-center">
                      <button class="btnGuardar mt-3 mb-2">Publicar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
