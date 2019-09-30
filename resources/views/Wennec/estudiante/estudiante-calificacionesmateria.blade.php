@extends('layouts.dash')

@section('content')
<div class="col-md-12">
{{--Inicio Mensaje Confirmar--}}
@include('Wennec.alerts.success')
@include('Wennec.alerts.error')
@include('Wennec.alerts.errors')
{{--Fin Mensaje Confirmar--}}

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15-datatable">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Primer Periodo</h1>
                            </div>
                        </div>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Logro</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Calificacion</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificaciones_periodouno as $calificacion_periodouno)

                                        <tr  class="text-center">
                                            <td>{{$calificacion_periodouno->nombre_materia}}</td>
                                            <td>{{$calificacion_periodouno->nombreLogro}}</td>
                                            <td>{{$calificacion_periodouno->descripcion}}</td>
                                            <td>{{$calificacion_periodouno->periodo}}</td>
                                            <?php
                                            if($calificacion_periodouno->calificacion <= "3.4"){
                                                echo '<td><label class="label label-danger" for="">' . $calificacion_periodouno->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodouno->calificacion >= "3.5" && $calificacion_periodouno->calificacion <= "3.9"){
                                                echo '<td><label class="label label-warning" for="">' . $calificacion_periodouno->calificacion . '</label></td>';
                                            }
                                            if($calificacion_periodouno->calificacion >= "4.0" && $calificacion_periodouno->calificacion <= "4.5"){
                                                echo '<td><label class="label label-primary" for="">' . $calificacion_periodouno->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodouno->calificacion >= "4.6" && $calificacion_periodouno->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificacion_periodouno->calificacion . '</label></td>';
                                            }
                                            ?>
                                        </tr>
                                        @endforeach
                                        <tr>
                                          @foreach($calificacionestotal_periodouno as $cal)
                                          <?php
                                          if($cal->calificacion <= "3.4"){
                                              echo '<td colspan="5"><label class="label label-danger" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                              echo '<td colspan="5"><label class="label label-warning" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }
                                          if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                              echo '<td colspan="5"><label class="label label-primary" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                              echo '<td colspan="5"><label class="label label-success" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          ?>

                                          @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Segundo Periodo</h1>
                            </div>
                        </div>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Logro</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Calificacion</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificaciones_periododos as $calificacion_periododos)

                                        <tr  class="text-center">
                                            <td>{{$calificacion_periododos->nombre_materia}}</td>
                                            <td>{{$calificacion_periododos->nombreLogro}}</td>
                                            <td>{{$calificacion_periododos->descripcion}}</td>
                                            <td>{{$calificacion_periododos->periodo}}</td>
                                            <?php
                                            if($calificacion_periododos->calificacion <= "3.4"){
                                                echo '<td><label class="label label-danger" for="">' . $calificacion_periododos->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periododos->calificacion >= "3.5" && $calificacion_periododos->calificacion <= "3.9"){
                                                echo '<td><label class="label label-warning" for="">' . $calificacion_periododos->calificacion . '</label></td>';
                                            }
                                            if($calificacion_periododos->calificacion >= "4.0" && $calificacion_periododos->calificacion <= "4.5"){
                                                echo '<td><label class="label label-primary" for="">' . $calificacion_periododos->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periododos->calificacion >= "4.6" && $calificacion_periododos->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificacion_periododos->calificacion . '</label></td>';
                                            }
                                            ?>
                                        </tr>
                                        @endforeach
                                        <tr>
                                          @foreach($calificacionestotal_periododos as $cal)
                                          <?php
                                          if($cal->calificacion <= "3.4"){
                                              echo '<td colspan="5"><label class="label label-danger" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                              echo '<td colspan="5"><label class="label label-warning" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }
                                          if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                              echo '<td colspan="5"><label class="label label-primary" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                              echo '<td colspan="5"><label class="label label-success" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          ?>

                                          @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tercer Periodo</h1>
                            </div>
                        </div>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Logro</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Calificacion</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificaciones_periodotres as $calificacion_periodotres)

                                        <tr  class="text-center">
                                            <td>{{$calificacion_periodotres->nombre_materia}}</td>
                                            <td>{{$calificacion_periodotres->nombreLogro}}</td>
                                            <td>{{$calificacion_periodotres->descripcion}}</td>
                                            <td>{{$calificacion_periodotres->periodo}}</td>
                                            <?php
                                            if($calificacion_periodotres->calificacion <= "3.4"){
                                                echo '<td><label class="label label-danger" for="">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodotres->calificacion >= "3.5" && $calificacion_periodotres->calificacion <= "3.9"){
                                                echo '<td><label class="label label-warning" for="">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }
                                            if($calificacion_periodotres->calificacion >= "4.0" && $calificacion_periodotres->calificacion <= "4.5"){
                                                echo '<td><label class="label label-primary" for="">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodotres->calificacion >= "4.6" && $calificacion_periodotres->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }
                                            ?>
                                        </tr>
                                        @endforeach
                                        <tr>
                                          @foreach($calificacionestotal_periodotres as $cal)
                                          <?php
                                          if($cal->calificacion <= "3.4"){
                                              echo '<td colspan="5"><label class="label label-danger" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                              echo '<td colspan="5"><label class="label label-warning" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }
                                          if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                              echo '<td colspan="5"><label class="label label-primary" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                              echo '<td colspan="5"><label class="label label-success" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          ?>

                                          @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Cuarto Periodo</h1>
                            </div>
                        </div>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Logro</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Calificacion</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificaciones_periodocuatro as $calificacion_periodocuatro)

                                        <tr  class="text-center">
                                            <td>{{$calificacion_periodocuatro->nombre_materia}}</td>
                                            <td>{{$calificacion_periodocuatro->nombreLogro}}</td>
                                            <td>{{$calificacion_periodocuatro->descripcion}}</td>
                                            <td>{{$calificacion_periodocuatro->periodo}}</td>
                                            <?php
                                            if($calificacion_periodocuatro->calificacion <= "3.4"){
                                                echo '<td><label class="label label-danger" for="">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodocuatro->calificacion >= "3.5" && $calificacion_periodocuatro->calificacion <= "3.9"){
                                                echo '<td><label class="label label-warning" for="">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                            }
                                            if($calificacion_periodocuatro->calificacion >= "4.0" && $calificacion_periodocuatro->calificacion <= "4.5"){
                                                echo '<td><label class="label label-primary" for="">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodocuatro->calificacion >= "4.6" && $calificacion_periodocuatro->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                            }

                                            ?>
                                        </tr>
                                        @endforeach
                                        <tr>
                                          @foreach($calificacionestotal_periodocuatro as $cal)
                                          <?php
                                          if($cal->calificacion <= "3.4"){
                                              echo '<td colspan="5"><label class="label label-danger" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                              echo '<td colspan="5"><label class="label label-warning" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }
                                          if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                              echo '<td colspan="5"><label class="label label-primary" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }

                                          if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                              echo '<td colspan="5"><label class="label label-success" for="">Nota Final: '.$cal->calificacion.'</label></td>';
                                          }
                                          
                                          ?>

                                          @endforeach
                                        </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Static Table End -->
</div>
@endsection
