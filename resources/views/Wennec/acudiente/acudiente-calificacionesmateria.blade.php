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
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Periodo</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificacionestotal_periodouno as $calificaciontotal_periodouno)
                                        <tr  class="text-center">
                                          <?php
                                          if($calificaciontotal_periodouno->calificacion <= "3.4"){
                                              echo '<td><label class="label label-danger" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "3.5" && $calificaciontotal_periodouno->calificacion <= "3.9"){
                                              echo '<td><label class="label label-warning" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          if($calificaciontotal_periodouno->calificacion >= "4.0" && $calificaciontotal_periodouno->calificacion <= "4.5"){
                                              echo '<td><label class="label label-primary" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "4.6" && $calificaciontotal_periodouno->calificacion <= "5.0"){
                                              echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          ?>
                                            <td>Primero</td>
                                        </tr>
                                        @endforeach
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
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Periodo</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificacionestotal_periodouno as $calificaciontotal_periodouno)
                                        <tr  class="text-center">
                                          <?php
                                          if($calificaciontotal_periodouno->calificacion <= "3.4"){
                                              echo '<td><label class="label label-danger" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "3.5" && $calificaciontotal_periodouno->calificacion <= "3.9"){
                                              echo '<td><label class="label label-warning" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          if($calificaciontotal_periodouno->calificacion >= "4.0" && $calificaciontotal_periodouno->calificacion <= "4.5"){
                                              echo '<td><label class="label label-primary" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "4.6" && $calificaciontotal_periodouno->calificacion <= "5.0"){
                                              echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          ?>
                                            <td>Segundo</td>
                                        </tr>
                                        @endforeach
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
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Periodo</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificacionestotal_periodouno as $calificaciontotal_periodouno)
                                        <tr  class="text-center">
                                          <?php
                                          if($calificaciontotal_periodouno->calificacion <= "3.4"){
                                              echo '<td><label class="label label-danger" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "3.5" && $calificaciontotal_periodouno->calificacion <= "3.9"){
                                              echo '<td><label class="label label-warning" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          if($calificaciontotal_periodouno->calificacion >= "4.0" && $calificaciontotal_periodouno->calificacion <= "4.5"){
                                              echo '<td><label class="label label-primary" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "4.6" && $calificaciontotal_periodouno->calificacion <= "5.0"){
                                              echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          ?>
                                            <td>Tercero</td>
                                        </tr>
                                        @endforeach
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
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Periodo</th>
                                    </thead>

                                    <tbody>
                                        @foreach($calificacionestotal_periodouno as $calificaciontotal_periodouno)
                                        <tr  class="text-center">
                                          <?php
                                          if($calificaciontotal_periodouno->calificacion <= "3.4"){
                                              echo '<td><label class="label label-danger" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "3.5" && $calificaciontotal_periodouno->calificacion <= "3.9"){
                                              echo '<td><label class="label label-warning" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          if($calificaciontotal_periodouno->calificacion >= "4.0" && $calificaciontotal_periodouno->calificacion <= "4.5"){
                                              echo '<td><label class="label label-primary" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }

                                          if($calificaciontotal_periodouno->calificacion >= "4.6" && $calificaciontotal_periodouno->calificacion <= "5.0"){
                                              echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodouno->calificacion . '</label></td>';
                                          }
                                          ?>
                                            <td>Cuarto</td>
                                        </tr>
                                        @endforeach
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
