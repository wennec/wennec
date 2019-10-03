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
                                <h1>Calificaciones</h1>
                            </div>
                        </div>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Nombre Estudiante</th>
                                        <th class="text-center">Calificacion</th>
                                        <th class="text-center">Opcion</th>

                                    </thead>

                                    <tbody>
                                        @foreach($estudiantes_grupo as $estudiante_grupo)
                                        <tr class="text-center">
                                            <td>{{$estudiante_grupo->name}}</td>
                                            <?php
                                            $exists = DB::table('tbl_calificacionestudiante')->where('FK_Estudiante', $estudiante_grupo->idEstudiante)->where('FK_Logro', $estudiante_grupo->PK_id)->first();
                                            $id_estudiante = (int) $estudiante_grupo->idEstudiante;
                                            $id_logro = (int) $estudiante_grupo->PK_id;

                                            $calificaciones = DB::select('SELECT tbl_calificacionestudiante.calificacion, tbl_calificacionestudiante.id FROM tbl_calificacionestudiante WHERE tbl_calificacionestudiante.FK_Estudiante =' . $id_estudiante . ' AND tbl_calificacionestudiante.FK_Logro =' . $id_logro . '');
                                            if (!$exists) {
                                                echo '<td><label for="">-</label></td>';
                                            } else {
                                                foreach ($calificaciones as $calificacion) {
                                                    if($calificacion->calificacion <= "3.4"){
                                                        echo '<td><label class="label label-danger" for="">' . $calificacion->calificacion . '</label></td>';
                                                    }

                                                    if($calificacion->calificacion >= "3.5" && $calificacion->calificacion <= "3.9"){
                                                        echo '<td><label class="label label-warning" for="">' . $calificacion->calificacion . '</label></td>';
                                                    }
                                                    if($calificacion->calificacion >= "4.0" && $calificacion->calificacion <= "4.5"){
                                                        echo '<td><label class="label label-primary" for="">' . $calificacion->calificacion . '</label></td>';
                                                    }

                                                    if($calificacion->calificacion >= "4.6" && $calificacion->calificacion <= "5.0"){
                                                        echo '<td><label class="label label-success" for="">' . $calificacion->calificacion . '</label></td>';
                                                    }
                                                }
                                            }

                                            if (!$exists) {
                                                echo '<td><button type="button" id="mymodal" class="btn btn-success btn-md" data-logro-id="' . $estudiante_grupo->PK_id . '" data-estudiante-id="' . $estudiante_grupo->idEstudiante . '" data-toggle="modal" data-target="#modalCreate">
                                                <i class="fa fa-check"></i>
                                            </button></td>';
                                          }
                                            ?>

                                            @foreach($calificaciones as $calificacion)
                                            <td>{{link_to_route('calificacion.edit', $title = '', $parameter = $calificacion->id, $attributes = ['class' => 'btn btn-simple btn-warning btn-icon edit far fa-edit'])}}</td>
                                            @endforeach


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
                            {!!Form::text('calificacion',null,['class'=>'form-control','placeholder'=>'Calificacion','required'])!!}
                        </div>
                        <input type="hidden" name="FK_Logro" id="idLogro">
                        <input type="hidden" name="FK_Estudiante" id="idEstudiante">
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



<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#modalCreate').on('show.bs.modal', function(e) {
            var logro_id = $(e.relatedTarget).data('logro-id');
            $(e.currentTarget).find('input[name="FK_Logro"]').val(logro_id);
            var docente = document.getElementById('idLogro').innerHTML = logro_id;

            var estudiante = $(e.relatedTarget).data('estudiante-id');
            $(e.currentTarget).find('input[name="FK_Estudiante"]').val(estudiante);
            var student = document.getElementById('idEstudiante').innerHTML = estudiante;
        });
    });
</script>
@endsection
