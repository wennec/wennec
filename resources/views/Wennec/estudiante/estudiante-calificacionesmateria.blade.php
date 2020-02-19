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
                                                <tr>
                                                <th class="text-center">Materia</th>
                                                <th class="text-center">Logro</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Periodo</th>
                                                <th class="text-center">Calificacion</th>
                                            
                                            <tbody>
                                
                                            @foreach($calificaciones_periodouno as $calificacion_periodouno)

                                                <tr  class="text-center">
                                                    <td>{{$calificacion_periodouno->nombre_materia}}</td>
                                                    <td>{{$calificacion_periodouno->nombreLogro}}</td>
                                                    <td>{{$calificacion_periodouno->descripcion}}</td>
                                                    <td>{{$calificacion_periodouno->periodo}}</td>
                                                    <?php
                                                    if($calificacion_periodouno->calificacion <= "3.4"){
                                                        echo '<td><span class="badge badge-danger">' . $calificacion_periodouno->calificacion . '</span></td>';
                                                    }

                                                    if($calificacion_periodouno->calificacion >= "3.5" && $calificacion_periodouno->calificacion <= "3.9"){
                                                        echo '<td><span class="badge badge-warning">' . $calificacion_periodouno->calificacion . '</span></td>';
                                                    }
                                                    if($calificacion_periodouno->calificacion >= "4.0" && $calificacion_periodouno->calificacion <= "4.5"){
                                                        echo '<td><span class="badge badge-primary">' . $calificacion_periodouno->calificacion . '</span></td>';
                                                    }

                                                    if($calificacion_periodouno->calificacion >= "4.6" && $calificacion_periodouno->calificacion <= "5.0"){
                                                        echo '<td><span class="badge badge-success">' . $calificacion_periodouno->calificacion . '</span></td>';
                                                    }
                                                    ?>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                @foreach($calificacionestotal_periodouno as $cal)
                                                <?php
                                                if($cal->calificacion <= "3.4"){
                                                    echo '<td colspan="5"><span class="badge badge-danger">Nota Final: '.$cal->calificacion.'</span></td>';
                                                }

                                                if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                                    echo '<td colspan="5"><span class="badge badge-warning">Nota Final: '.$cal->calificacion.'</span></td>';
                                                }
                                                if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                                    echo '<td colspan="5"><span class="badge badge-primary">Nota Final: '.$cal->calificacion.'</span></td>';
                                                }

                                                if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                                    echo '<td colspan="5"><span class="badge badge-success">Nota Final: '.$cal->calificacion.'</span></td>';
                                                }

                                                ?>

                                                @endforeach
                                                </tr>
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
                                                <tr>
                                                <th class="text-center">Materia</th>
                                                <th class="text-center">Logro</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Periodo</th>
                                                <th class="text-center">Calificacion</th>
                                            
                                            <tbody>
                                
                                            @foreach($calificaciones_periododos as $calificacion_periododos)

                                            <tr  class="text-center">
                                                <td>{{$calificacion_periododos->nombre_materia}}</td>
                                                <td>{{$calificacion_periododos->nombreLogro}}</td>
                                                <td>{{$calificacion_periododos->descripcion}}</td>
                                                <td>{{$calificacion_periododos->periodo}}</td>
                                                <?php
                                                if($calificacion_periododos->calificacion <= "3.4"){
                                                    echo '<td><span class="badge badge-danger">' . $calificacion_periododos->calificacion . '</span></td>';
                                                }

                                                if($calificacion_periododos->calificacion >= "3.5" && $calificacion_periododos->calificacion <= "3.9"){
                                                    echo '<td><span class="badge badge-warning">' . $calificacion_periododos->calificacion . '</span></td>';
                                                }
                                                if($calificacion_periododos->calificacion >= "4.0" && $calificacion_periododos->calificacion <= "4.5"){
                                                    echo '<td><span class="badge badge-primary">' . $calificacion_periododos->calificacion . '</span></td>';
                                                }

                                                if($calificacion_periododos->calificacion >= "4.6" && $calificacion_periododos->calificacion <= "5.0"){
                                                    echo '<td><span class="badge badge-success">' . $calificacion_periododos->calificacion . '</span></td>';
                                                }
                                                ?>
                                            </tr>
                                            @endforeach
                                            <tr>
                                            @foreach($calificacionestotal_periododos as $cal)
                                            <?php
                                            if($cal->calificacion <= "3.4"){
                                                echo '<td colspan="5"><span class="badge badge-danger">Nota Final: '.$cal->calificacion.'</span></td>';
                                            }

                                            if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                                echo '<td colspan="5"><span class="badge badge-warning">Nota Final: '.$cal->calificacion.'</span></td>';
                                            }
                                            if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                                echo '<td colspan="5"><span class="badge badge-primary">Nota Final: '.$cal->calificacion.'</span></td>';
                                            }

                                            if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                                echo '<td colspan="5"><span class="badge badge-success">Nota Final: '.$cal->calificacion.'</span></td>';
                                            }

                                            ?>

                                            @endforeach
                                            </tr>
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
                                                <tr>
                                                <th class="text-center">Materia</th>
                                                <th class="text-center">Logro</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Periodo</th>
                                                <th class="text-center">Calificacion</th>
                                            
                                            <tbody>
                                
                                            @foreach($calificaciones_periodotres as $calificacion_periodotres)

                                        <tr  class="text-center">
                                            <td>{{$calificacion_periodotres->nombre_materia}}</td>
                                            <td>{{$calificacion_periodotres->nombreLogro}}</td>
                                            <td>{{$calificacion_periodotres->descripcion}}</td>
                                            <td>{{$calificacion_periodotres->periodo}}</td>
                                            <?php
                                            if($calificacion_periodotres->calificacion <= "3.4"){
                                                echo '<td><span class="badge badge-danger">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodotres->calificacion >= "3.5" && $calificacion_periodotres->calificacion <= "3.9"){
                                                echo '<td><span class="badge badge-warning">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }
                                            if($calificacion_periodotres->calificacion >= "4.0" && $calificacion_periodotres->calificacion <= "4.5"){
                                                echo '<td><span class="badge badge-primary">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }

                                            if($calificacion_periodotres->calificacion >= "4.6" && $calificacion_periodotres->calificacion <= "5.0"){
                                                echo '<td><span class="badge badge-success">' . $calificacion_periodotres->calificacion . '</label></td>';
                                            }
                                            ?>
                                        </tr>
                                        @endforeach
                                        <tr>
                                        @foreach($calificacionestotal_periodotres as $cal)
                                        <?php
                                        if($cal->calificacion <= "3.4"){
                                            echo '<td colspan="5"><span class="badge badge-danger">Nota Final: '.$cal->calificacion.'</label></td>';
                                        }

                                        if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                            echo '<td colspan="5"><span class="badge badge-warning">Nota Final: '.$cal->calificacion.'</label></td>';
                                        }
                                        if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                            echo '<td colspan="5"><span class="badge badge-primary">Nota Final: '.$cal->calificacion.'</label></td>';
                                        }

                                        if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                            echo '<td colspan="5"><span class="badge badge-success">Nota Final: '.$cal->calificacion.'</label></td>';
                                        }

                                        ?>

                                        @endforeach
                                        </tr>
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
                                                <tr>
                                                <th class="text-center">Materia</th>
                                                <th class="text-center">Logro</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Periodo</th>
                                                <th class="text-center">Calificacion</th>
                                            
                                            <tbody>
                                
                                            @foreach($calificaciones_periodocuatro as $calificacion_periodocuatro)

                                                <tr  class="text-center">
                                                    <td>{{$calificacion_periodocuatro->nombre_materia}}</td>
                                                    <td>{{$calificacion_periodocuatro->nombreLogro}}</td>
                                                    <td>{{$calificacion_periodocuatro->descripcion}}</td>
                                                    <td>{{$calificacion_periodocuatro->periodo}}</td>
                                                    <?php
                                                    if($calificacion_periodocuatro->calificacion <= "3.4"){
                                                        echo '<td><span class="badge badge-danger">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                                    }

                                                    if($calificacion_periodocuatro->calificacion >= "3.5" && $calificacion_periodocuatro->calificacion <= "3.9"){
                                                        echo '<td><span class="badge badge-warning">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                                    }
                                                    if($calificacion_periodocuatro->calificacion >= "4.0" && $calificacion_periodocuatro->calificacion <= "4.5"){
                                                        echo '<td><span class="badge badge-primary">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                                    }

                                                    if($calificacion_periodocuatro->calificacion >= "4.6" && $calificacion_periodocuatro->calificacion <= "5.0"){
                                                        echo '<td><span class="badge badge-success">' . $calificacion_periodocuatro->calificacion . '</label></td>';
                                                    }

                                                    ?>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                @foreach($calificacionestotal_periodocuatro as $cal)
                                                <?php
                                                if($cal->calificacion <= "3.4"){
                                                    echo '<td colspan="5"><span class="badge badge-danger">Nota Final: '.$cal->calificacion.'</label></td>';
                                                }

                                                if($cal->calificacion >= "3.5" && $cal->calificacion <= "3.9"){
                                                    echo '<td colspan="5"><span class="badge badge-warning">Nota Final: '.$cal->calificacion.'</label></td>';
                                                }
                                                if($cal->calificacion >= "4.0" && $cal->calificacion <= "4.5"){
                                                    echo '<td colspan="5"><span class="badge badge-primary">Nota Final: '.$cal->calificacion.'</label></td>';
                                                }

                                                if($cal->calificacion >= "4.6" && $cal->calificacion <= "5.0"){
                                                    echo '<td colspan="5"><span class="badge badge-success">Nota Final: '.$cal->calificacion.'</label></td>';
                                                }

                                                ?>

                                                @endforeach
                                                </tr>
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
