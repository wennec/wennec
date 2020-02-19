@extends('layouts.dash')

@section('content')
<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row calificacioneSection" style="margin-bottom:.25em;">
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
                                        <img src="new-assets/img/icon/CERTIFICADOS TITULO.png" height="30" alt="">
                                        <span> Certificados</span>
                                        <br>
                                        
                                    </header>
                                    <div class="row mt-4" style="width: 100%;">
                                        @foreach($teachers_name as $teacher_name)
                                          <h3>{{$teacher_name->name}} - Docente</h3>
                                        @endforeach
                                        <hr style="width: 100%;">
                                      <div class="col-md-5 col-xs-6" id="colCertifi">
                                        <form>
                                            <div class="form-row">
                                              <div class="col-md-11">
                                                <label for=""><small>Tipo de Certificado</small> </label>
                                                <input type="text" class="form-control" style="margin:0px !important;">
                                                <label for=""><small>Comentarios</small></label>
                                                <textarea name="" id="" class="form-control" cols="30" rows="4" style="margin:0px !important;"></textarea>
                                              </div>
                                            </div>
                                            <div class="form-row text-left mt-3 mb-2">
                                                <button class="btnAzul">Enviar solicitud</button>
                                            </div>
                                          </form>
                                      </div>
                                      <div class="col-md-5 col-xs-6 ml-5" >
                                          <h3>Certificado_001 .PDF</h3>
                                          <button class="btnAzul">
                                            <a href="{{url('/reportescertificado')}}"  target="_blank" download="Reportecolegio">
                                                Descargar Archivo
                                                </a>
                                          </button>
                                      </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>
@endsection
