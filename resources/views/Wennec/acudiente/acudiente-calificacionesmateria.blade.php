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
                                                src="{{ asset('new-assets/img/EscudoColegios/GSN.png') }}" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>

                                <section id="comunicados">
                                    <header class="text-uppercase mt-3" id="headerText">
                                        <img src="{{ asset('new-assets/img/icon/CALIFICACIONES TITULO.png') }}" height="30" alt="">
                                        <span> Calificaciones</span>
                                    </header>
                                    <div class="row" id="showCalifi">
                                        <h2 class="text-uppercase">Notas del estudiante</h2>
                                        <table class="table" id="tableCal" style="margin:0px;">
                                            <thead>
                                                <tr class="filters">
                                                    <th style="width: 30%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Documento</strong>
                                                            <p>TI 96020304578</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Nombres y apellidos</strong>
                                                            <p>Efrain Andres Vergara</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Curso</strong>
                                                            <p>101</p>
                                                        </aside>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table" style="margin:0px; border:0px;">
                                            <tbody>
                                                <tr class="filters">
                                                    <td
                                                        style="width: 100%; border-bottom: 1px solid #dee2e6; border-top:0px;">
                                                        <aside style="vertical-align: middle; text-align: left;">
                                                            <strong class="text-uppercase" style="color: #808080;">Periodo 1</strong>
                                                        </aside>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <table id="task-list-tbl" class="table">
                                            <thead>
                                                <th class="text-center">Calificacion</th>
                                                <th class="text-center">Periodo</th>
                                            

                                            <tbody>
                                                @foreach($calificacionestotal_periodouno as $calificaciontotal_periodouno)
                                                <tr  class="text-center">
                                                <?php
                                                if($calificaciontotal_periodouno->calificacion <= "3.4"){
                                                    echo '<td><span class="badge badge-danger">' . $calificaciontotal_periodouno->calificacion . '</span></td>';
                                                }

                                                if($calificaciontotal_periodouno->calificacion >= "3.5" && $calificaciontotal_periodouno->calificacion <= "3.9"){
                                                    echo '<td><span class="badge badge-warning">' . $calificaciontotal_periodouno->calificacion . '</span></td>';
                                                }
                                                if($calificaciontotal_periodouno->calificacion >= "4.0" && $calificaciontotal_periodouno->calificacion <= "4.5"){
                                                    echo '<td><span class="badge badge-primary">' . $calificaciontotal_periodouno->calificacion . '</span></td>';
                                                }

                                                if($calificaciontotal_periodouno->calificacion >= "4.6" && $calificaciontotal_periodouno->calificacion <= "5.0"){
                                                    echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodouno->calificacion . '</span></td>';
                                                }
                                                ?>
                                                    <td>Primero</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row" id="showCalifi">
                                        <h2 class="text-uppercase">Notas del estudiante</h2>
                                        <table class="table" id="tableCal" style="margin:0px;">
                                            <thead>
                                            <tr class="filters">
                                                    <th style="width: 30%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Documento</strong>
                                                            <p>TI 96020304578</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Nombres y apellidos</strong>
                                                            <p>Efrain Andres Vergara</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Curso</strong>
                                                            <p>101</p>
                                                        </aside>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table" style="margin:0px; border:0px;">
                                            <tbody>
                                                <tr class="filters">
                                                    <td
                                                        style="width: 100%; border-bottom: 1px solid #dee2e6; border-top:0px;">
                                                        <aside style="vertical-align: middle; text-align: left;">
                                                            <strong class="text-uppercase" style="color: #808080;">Periodo 2</strong>
                                                        </aside>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <table id="task-list-tbl" class="table">
                                        <thead>
                                            <th class="text-center">Calificacion</th>
                                            <th class="text-center">Periodo</th>
                                       

                                        <tbody>
                                            @foreach($calificacionestotal_periododos as $calificaciontotal_periododos)
                                            <tr  class="text-center">
                                            <?php
                                            if($calificaciontotal_periododos->calificacion <= "3.4"){
                                                echo '<td><span class="badge badge-danger">' . $calificaciontotal_periododos->calificacion . '</span></td>';
                                            }

                                            if($calificaciontotal_periododos->calificacion >= "3.5" && $calificaciontotal_periododos->calificacion <= "3.9"){
                                                echo '<td><span class="badge badge-warning">' . $calificaciontotal_periododos->calificacion . '</span></td>';
                                            }
                                            if($calificaciontotal_periododos->calificacion >= "4.0" && $calificaciontotal_periododos->calificacion <= "4.5"){
                                                echo '<td><span class="badge badge-primary">' . $calificaciontotal_periododos->calificacion . '</span></td>';
                                            }

                                            if($calificaciontotal_periododos->calificacion >= "4.6" && $calificaciontotal_periododos->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificaciontotal_periododos->calificacion . '</span></td>';
                                            }
                                            ?>
                                                <td>Segundo</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>

                                    <div class="row" id="showCalifi">
                                        <h2 class="text-uppercase">Notas del estudiante</h2>
                                        <table class="table" id="tableCal" style="margin:0px;">
                                            <thead>
                                            <tr class="filters">
                                                    <th style="width: 30%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Documento</strong>
                                                            <p>TI 96020304578</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Nombres y apellidos</strong>
                                                            <p>Efrain Andres Vergara</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Curso</strong>
                                                            <p>101</p>
                                                        </aside>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table" style="margin:0px; border:0px;">
                                            <tbody>
                                                <tr class="filters">
                                                    <td
                                                        style="width: 100%; border-bottom: 1px solid #dee2e6; border-top:0px;">
                                                        <aside style="vertical-align: middle; text-align: left;">
                                                            <strong class="text-uppercase" style="color: #808080;">Periodo 3</strong>
                                                        </aside>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <table id="task-list-tbl" class="table">
                                            <thead>
                                            <th class="text-center">Calificacion</th>
                                            <th class="text-center">Periodo</th>
                                        

                                        <tbody>
                                            @foreach($calificacionestotal_periodotres as $calificaciontotal_periodotres)
                                            <tr  class="text-center">
                                            <?php
                                            if($calificaciontotal_periodotres->calificacion <= "3.4"){
                                                echo '<td><span class="badge badge-danger">' . $calificaciontotal_periodotres->calificacion . '</span></td>';
                                            }

                                            if($calificaciontotal_periodotres->calificacion >= "3.5" && $calificaciontotal_periodotres->calificacion <= "3.9"){
                                                echo '<td><span class="badge badge-warning">' . $calificaciontotal_periodotres->calificacion . '</span></td>';
                                            }
                                            if($calificaciontotal_periodotres->calificacion >= "4.0" && $calificaciontotal_periodotres->calificacion <= "4.5"){
                                                echo '<td><span class="badge badge-primary">' . $calificaciontotal_periodotres->calificacion . '</span></td>';
                                            }

                                            if($calificaciontotal_periodotres->calificacion >= "4.6" && $calificaciontotal_periodotres->calificacion <= "5.0"){
                                                echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodotres->calificacion . '</span></td>';
                                            }
                                            ?>
                                                <td>Tercero</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>

                                    <div class="row" id="showCalifi">
                                        <h2 class="text-uppercase">Notas del estudiante</h2>
                                        <table class="table" id="tableCal" style="margin:0px;">
                                            <thead>
                                            <tr class="filters">
                                                    <th style="width: 30%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Documento</strong>
                                                            <p>TI 96020304578</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Nombres y apellidos</strong>
                                                            <p>Efrain Andres Vergara</p>
                                                        </aside>
                                                    </th>
                                                    <th style="width: 35%;">
                                                        <aside style="vertical-align: middle; text-align: center;;">
                                                            <strong class="text-uppercase">Curso</strong>
                                                            <p>101</p>
                                                        </aside>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table" style="margin:0px; border:0px;">
                                            <tbody>
                                                <tr class="filters">
                                                    <td
                                                        style="width: 100%; border-bottom: 1px solid #dee2e6; border-top:0px;">
                                                        <aside style="vertical-align: middle; text-align: left;">
                                                            <strong class="text-uppercase" style="color: #808080;">Periodo 4</strong>
                                                        </aside>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <table id="task-list-tbl" class="table">
                                            <thead>
                                                <th class="text-center">Calificacion</th>
                                                <th class="text-center">Periodo</th>
                                            

                                            <tbody>
                                                @foreach($calificacionestotal_periodocuatro as $calificaciontotal_periodocuatro)
                                                <tr  class="text-center">
                                                <?php
                                                if($calificaciontotal_periodocuatro->calificacion <= "3.4"){
                                                    echo '<td><span class="badge badge-danger">' . $calificaciontotal_periodocuatro->calificacion . '</span></td>';
                                                }

                                                if($calificaciontotal_periodocuatro->calificacion >= "3.5" && $calificaciontotal_periodocuatro->calificacion <= "3.9"){
                                                    echo '<td><span class="badge badge-warning">' . $calificaciontotal_periodocuatro->calificacion . '</span></td>';
                                                }
                                                if($calificaciontotal_periodocuatro->calificacion >= "4.0" && $calificaciontotal_periodocuatro->calificacion <= "4.5"){
                                                    echo '<td><span class="badge badge-primary">' . $calificaciontotal_periodocuatro->calificacion . '</span></td>';
                                                }

                                                if($calificaciontotal_periodocuatro->calificacion >= "4.6" && $calificaciontotal_periodocuatro->calificacion <= "5.0"){
                                                    echo '<td><label class="label label-success" for="">' . $calificaciontotal_periodocuatro->calificacion . '</span></td>';
                                                }
                                                ?>
                                                    <td>Cuarto</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                            </section>
                        </div>
                    </div>
                    <br>
                    <br>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <br>
</section>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
@endsection
