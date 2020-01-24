@extends('layouts.dash')

@section('content')
<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                         <!--header img name school-->
                         <table style="width: 100%;">
                            <tr>
                                <td style="width:50%; text-align: right; padding-right: 2rem;"><img
                                        src="{{ asset('new-assets/img/escudoColegio.png') }}" alt="image colegio" style="width: 40px;">
                                </td>
                                <td style="width:50%;vertical-align:middle;">
                                    <h1>Nombre Colegio</h1>
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="row spacenameSchool">
                               
                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="{{ asset('new-assets/img/icon/OBSERVADOR TITULO.png') }}"" height="30" alt="">
                                        <span> Observador</span>
                                    </header>


                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-9 col-xs-9">
                                                <form name="FilterForm" id="FilterForm" action="" method="">
                                                    <input type="text" id="buscarAgenda" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar">
                                                </form>
                                            </div>
                                        </div>

                                        <table id="tablaAgenda">
                                            <thead>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                            @foreach($observaciones_estudiante as $observacion_estudiante)
                                                <tr class="styleFila">  
                                                    <td style="width: 30%;" class="fechaAgenda">
                                                        <span class="NumFecha">22</span>
                                                        <span class="finFecha">Lun. <br>/07 </span>
                                                    </td>

                                                    <td style="width: 70%;position: relative;" >
                                                        
                                                        <aside style="width: 88%;">
                                                            <h4>{{$observacion_estudiante->nombre_materia}}</h4>
                                                            @if($observacion_estudiante->periodo == "Primero")
                                                            <h5>{{$observacion_estudiante->periodo}} Periodo <i class="fa fa-star-o" style="color: #5995F8;"></i></h5>
                                                            @endif

                                                            @if($observacion_estudiante->periodo == "Segundo")
                                                            <h5>{{$observacion_estudiante->periodo}} Periodo <i class="fa fa-star-o" style="color: #91D39F;"></i></h5>
                                                            @endif

                                                            @if($observacion_estudiante->periodo == "Tercero")
                                                            <h5>{{$observacion_estudiante->periodo}} Periodo <i class="fa fa-star-o" style="color: #F0C345;"></i> </i></h5>
                                                            @endif

                                                            @if($observacion_estudiante->periodo == "Cuarto")
                                                            <h5>{{$observacion_estudiante->periodo}} Periodo  <i class="fa fa-star-o" style="color: #E0646E;"></i></h5>
                                                            @endif
                                                            <p>
                                                                {{$observacion_estudiante->descripcion}}
                                                            </p>
                                                        </aside>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border-bottom: .75px solid  #E2E2E2;">
                                                        <p class="borderTable"></p>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </aside>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row filterStar">
                                <h3 class="text-center">Ayúda</h3>
                                <br>

                                <ul>
                                    <li><i class="fa fa-star-o" style="color: #5995F8;"></i> Periodo 1</li>
                                    <li><i class="fa fa-star-o" style="color: #91D39F;"></i> Periodo 2</li>
                                    <li><i class="fa fa-star-o" style="color: #F0C345;"></i> Periodo 3</li>
                                    <li><i class="fa fa-star-o" style="color: #E0646E;"></i> Periodo 4</li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

