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
                                        <span> Encuestas</span>
                                    </header>
                                </section>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>Materia</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>Materia</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="new-assets/img/iconEncuestas.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Alberto Yepes </h3>
                                        <p>Materia</p>
                                    </aside>
                                    <aside style="width:100%; text-align: center; padding: 1em 0em 0em;">
                                        <button class="btnVotar mt-3 mb-2">Votar</button>
                                    </aside>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>
@endsection
