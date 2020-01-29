@extends('layouts.dash')

@section('content')
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
                                        <img src="new-assets/img/icon/GOBIERNO ESCOLAR TITULO.png" height="30" alt="">
                                        <span> Gobierno Escolar</span>
                                    </header>

                                    <br><br>
                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}
                                </section>
                            </div>
                            <div class="row">
                            @foreach($eleccionEstudiantes as $eleccionEstudiante)
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       
                                       <?php
                                        if (($eleccionEstudiante->foto) == "") {
                                            echo '<img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">';
                                        } else {

                                            echo '<img style="width: 77%;" src="Foto/Usuarios/' . $eleccionEstudiante->foto . '" alt="" />';
                                        }
                                        ?>
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">{{$eleccionEstudiante->name}}</h3>
                                        <p>{{$eleccionEstudiante->grupo}}</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <?php
                                            $exists = DB::table('tbl_estadovotoestudiante')->where('FK_VotoEstudianteId', $id)->where('votoEstudiante', 1)->first();
                                            if (!$exists) {
                                                echo '<button type="button" id="mymodal" data-eleccione-id="' . $eleccionEstudiante->idEleccionEstudiante . '" data-estudiante-name="' . $eleccionEstudiante->name . '" class="open-homeEvents btnVotar mt-3 mb-2" data-toggle="modal" data-target="#modalVoto">Votar</button>';
                                            } else {
                                                echo '<button class="btn btn-success btn-md"><i class="fa fa-check"></i></button> ';
                                            }
                                        ?>
                                    </aside>

                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modalVoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Evaluacion Docente</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['route'=>'eleccionEstudiante.storeVotoEstudiante','method'=>'POST']) !!}
                    <div class="row" style="width: 100%;">
                      <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                      ">
                          <aside style="text-align: center;position:relative; margin-top:1em;">
                              <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                              <img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">
                          </aside>

                          <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                              <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;"><label type="" name="name_teacher" id="name_teacher"></label> </h3>
                              <label type="" name="materia" id="materia"></label>
                          </aside>

                      </div>
                      <input type="hidden" name="teacher_id" id="teacher_id" value=""/>
                      <input type="hidden" name="evaluado" value="1">
                      <div class="col-xs-4" style="padding: .5em 1.5em 1.5em;width:55%;">

                          <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0; border-bottom:.75px solid #E2E2E2;">
                              <h3 style="font-size:1.52em;padding:.5em 0 0; color:#808080; margin-bottom: 0px !important; line-height: 0;">Votar: </h3>
                              <label type="" name="name_teacher" id="name_teacher"></label>
                              <br>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                          </aside>

                          <input type="hidden" name="FK_EleccionEstudianteId" id="FK_EleccionEstudianteId">
                          <input type="hidden" name="votoEstudiante" value="1">

                      </div>
                      
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>

        </section>

        <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).on("click", ".open-homeEvents", function () {
     var eleccione = $(this).data('eleccione-id');
     $('#FK_EleccionEstudianteId').val( eleccione );

     var nameId = $(this).data('estudiante-name');
     $('#name_teacher').html( nameId );

     var materiaId = $(this).data('materia-id');
     $('#materia').html( materiaId );
});
</script>
@endsection
