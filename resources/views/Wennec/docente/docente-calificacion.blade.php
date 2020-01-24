@extends('layouts.dash')

@section('content')
<link rel='stylesheet' href='//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css'>
<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row spacenameSchool">
                                <!--header img name school-->
                                <table class="headerName">
                                    <tr>
                                        <td style="text-align: right; padding-right: 2rem;"><img
                                                src="{{ asset('new-assets/img/escudoColegio.png') }}" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            <h1>Nombre Colegio</h1>
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="{{ asset('new-assets/img/icon/CALIFICACIONES COLOR MENU PLEGABLE.png') }}" height="30" alt="">
                                        <span> Calificaciones</span>
                                    </header>

                                    <br>

                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}


                                    <div class="row" id="showCalifi">
                                    <table id="task-list-tbl" class="table">
                                          <thead>
                                            <tr class="text-center">
                                              <th><strong>Nombre Estudiante</strong></th>
                                              <th><strong>Materia</strong></th>
                                              <th><strong>Calificacion</strong></th>
                                              <th><strong>Opcion</strong></th>
                                            </tr>
                                          </thead>
                                          
                                          <tbody>
                                            
                                          <?php

                                            $iduser = auth()->user()->PK_id ;

                                            $colegioUsers =
                                            DB::select(DB::raw("SELECT
                                            tbl_colegios.id as idColegio
                                            FROM
                                            tbl_usuarios
                                            JOIN tbl_colegios
                                            ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
                                            WHERE tbl_usuarios.PK_id = $iduser"));

                                            foreach ($colegioUsers as $colegioUser) {
                                                $idColegio = $colegioUser->idColegio;
                                            }
                                            $hola = request()->route('id');
                                            $estudiantes_grupo =
                                            DB::select(DB::raw("SELECT
                                            tbl_materias.nombre_materia,
                                            tbl_grupos.grupo,
                                            tbl_logro.nombreLogro,
                                            tbl_usuarios.`name`,
                                            tbl_estudiante.PK_id,
                                            tbl_logro.PK_id as idlogro
                                            FROM
                                            tbl_logro
                                            JOIN tbl_periodo ON tbl_logro.FK_Periodo = tbl_periodo.PK_id
                                            JOIN tbl_grupomaterias ON tbl_logro.FK_GrupoMateria = tbl_grupomaterias.PK_id
                                            JOIN tbl_materias ON tbl_grupomaterias.FK_materia = tbl_materias.PK_id
                                            JOIN tbl_docente ON tbl_grupomaterias.FK_docente = tbl_docente.PK_id
                                            JOIN tbl_grupos ON tbl_grupomaterias.FK_GrupoId = tbl_grupos.PK_id
                                            JOIN tbl_grupoestudiantes ON tbl_grupoestudiantes.FK_grupo = tbl_grupos.PK_id
                                            JOIN tbl_estudiante ON tbl_grupoestudiantes.FK_estudiante = tbl_estudiante.PK_id
                                            JOIN tbl_usuarios ON tbl_estudiante.FK_usuarioId = tbl_usuarios.PK_id
                                            JOIN tbl_colegios ON tbl_usuarios.FK_ColegioId = tbl_colegios.id
                                            WHERE
                                            tbl_logro.PK_id = $hola  AND tbl_colegios.id = $idColegio"));
                                            ?>
                                            @foreach($estudiantes_grupo as $estudiante_grupo)
                                            <tr class="text-center">
                                                <td>{{$estudiante_grupo->name}}</td>
                                                <td>{{$estudiante_grupo->nombre_materia}}</td>
                                                <?php
                                                $exists = DB::table('tbl_calificacionestudiante')->where('FK_Estudiante', $estudiante_grupo->PK_id)->where('FK_Logro', $hola)->first();
                                                $id_estudiante = (int) $estudiante_grupo->PK_id;
                                                $id_logro = $hola;

                                                $calificaciones = DB::select('SELECT tbl_calificacionestudiante.calificacion, tbl_calificacionestudiante.id FROM tbl_calificacionestudiante WHERE tbl_calificacionestudiante.FK_Estudiante =' . $id_estudiante . ' AND tbl_calificacionestudiante.FK_Logro =' . $id_logro . '');
                                                if (!$exists) {
                                                    echo '<td><label for="">-</label></td>';
                                                } else {
                                                    foreach ($calificaciones as $calificacion) {
                                                        if($calificacion->calificacion <= "3.4"){
                                                            echo '<td><span class="badge badge-danger">' . $calificacion->calificacion . '</span></td>';
                                                        }

                                                        if($calificacion->calificacion >= "3.5" && $calificacion->calificacion <= "3.9"){
                                                            echo '<td><span class="badge badge-warning">' . $calificacion->calificacion . '</span></td>';
                                                        }
                                                        if($calificacion->calificacion >= "4.0" && $calificacion->calificacion <= "4.5"){
                                                            echo '<td><span class="badge badge-primary">' . $calificacion->calificacion . '</span></td>';
                                                        }

                                                        if($calificacion->calificacion >= "4.6" && $calificacion->calificacion <= "5.0"){
                                                            echo '<td><span class="badge badge-success">' . $calificacion->calificacion . '</label></td>';
                                                        }
                                                    }
                                                }

                                                if (!$exists) {
                                                    echo '<td><button type="button" id="mymodal" class="open-homeEvents btn btn-success btn-md" data-logro-id="' . $hola . '" data-estudiante-id="' . $estudiante_grupo->PK_id . '" data-toggle="modal" data-target="#modalCreate">
                                                    <i class="fa fa-check"></i>
                                                </button></td>';
                                            }
                                                ?>

                                                @foreach($calificaciones as $calificacion)
                                                <td>{{link_to_route('calificacion.edit', $title = '', $parameter = $calificacion->id, $attributes = ['class' => 'btn btn-simple btn-warning btn-icon edit fa fa-edit'])}}</td>
                                                @endforeach


                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                        </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Calificacion</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'calificacion.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group form-md-line-input">
                            <input class="form-control" placeholder="Calificación" type="number" name="calificacion" step="0.01" value="" required>
                        </div>
                        <input type="hidden" name="FK_Logro" id="FK_Logro">
                        <input type="hidden" name="FK_Estudiante" id="FK_Estudiante">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar Calificacion</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script type="text/javascript">

    $(document).on("click", ".open-homeEvents", function () {
        var logro_id = $(this).data('logro-id');
        $('#FK_Logro').val( logro_id );

        var estudiante = $(this).data('estudiante-id');
        $('#FK_Estudiante').val( estudiante );
    });
</script>
@endsection

