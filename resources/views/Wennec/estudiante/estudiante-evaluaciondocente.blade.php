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
                                        <img src="new-assets/img/icon/ENCUESTAS TITULO.png" height="30" alt="">
                                        <span> Evaluación Docente</span>
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
                            @foreach($dates as $date)
                            @if($date->fecha_inicio <= \Carbon\Carbon::now() && \Carbon\Carbon::now() <= $date->fecha_fin)
                            @foreach($teachersTest as $teacherTest)
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">{{$teacherTest->name_teacher}}</h3>
                                        <p>{{$teacherTest->nombre_materia}}</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="open-homeEvents btnVotar mt-3 mb-2" id="mymodal" data-docente-id="{{$teacherTest->id_teacher}}" data-name-id="{{$teacherTest->name_teacher}}" data-materia-id="{{$teacherTest->nombre_materia}}" data-toggle="modal" data-target="#modalEvaluation">Votar</button>
                                    </aside>

                                </div>
                            @endforeach
                            @else
                            <div class="alert alert-danger">
                              <ul>
                                Aun no esta habilitada la evaluacion docente...!!!
                              </ul>
                            </div>
                            @endif
                            @endforeach 
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modalEvaluation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Evaluacion Docente</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['route'=>'evaluacionDocenteE.store','method'=>'POST']) !!}
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
                              <h3 style="font-size:1.52em;padding:.5em 0 0; color:#808080; margin-bottom: 0px !important; line-height: 0;">Puntualidad</h3>
                              <br>
                              <label><input type="radio" name="puntualidad" value="1" required ><img src="new-assets/img/iconVotarArriba.png" alt="" width="40"></label>&nbsp; &nbsp; <label> <input type="radio" name="puntualidad" value="0" required>  <img src="new-assets/img/iconVotarAbajo.png" alt="" width="40"></label>
                          </aside>
                          <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0; border-bottom:.75px solid #E2E2E2;">
                              <h3 style="font-size:1.52em;padding:.5em 0 0; color:#808080; margin-bottom: 0px !important; line-height: 0;">Dinamismo en clase                                        </h3>
                              <br>
                              <label><input type="radio" name="dinamismo" value="1" required ><img src="new-assets/img/iconVotarArriba.png" alt="" width="40"></label>&nbsp; &nbsp; <label> <input type="radio" name="dinamismo" value="0" required>  <img src="new-assets/img/iconVotarAbajo.png" alt="" width="40"></label>
                          </aside>
                          <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0; border-bottom:.75px solid #E2E2E2;">
                              <h3 style="font-size:1.52em;padding:.5em 0 0; color:#808080; margin-bottom: 0px !important; line-height: 0;">Respeto</h3>
                              <br>
                              <label><input type="radio" name="respeto" value="1" required ><img src="new-assets/img/iconVotarArriba.png" alt="" width="40"></label>&nbsp; &nbsp; <label> <input type="radio" name="respeto" value="0" required>  <img src="new-assets/img/iconVotarAbajo.png" alt="" width="40"></label>
                          </aside>
                          <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0; border-bottom:.75px solid #E2E2E2;">
                              <h3 style="font-size:1.52em;padding:.5em 0 0; color:#808080; margin-bottom: 0px !important; line-height: 0;">Actitud</h3>
                              <br>
                              <label><input type="radio" name="actitud" value="1" required ><img src="new-assets/img/iconVotarArriba.png" alt="" width="40"></label>&nbsp; &nbsp; <label> <input type="radio" name="actitud" value="0" required>  <img src="new-assets/img/iconVotarAbajo.png" alt="" width="40"></label>
                          </aside>

                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
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
     var docenteId = $(this).data('docente-id');
     $('#teacher_id').val( docenteId );

     var nameId = $(this).data('name-id');
     $('#name_teacher').html( nameId );

     var materiaId = $(this).data('materia-id');
     $('#materia').html( materiaId );
});
</script>
@endsection
