@extends('layouts.dash')

@section('content')
<div class="col-md-12">
    {{--Inicio Mensaje Confirmar--}}
    @include('Wennec.alerts.success')
    @include('Wennec.alerts.error')
    @include('Wennec.alerts.errors')
    {{--Fin Mensaje Confirmar--}}

    <!-- Modal -->
    <div class="modal fade" id="modalVoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Estudiante</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'eleccionEstudiante.storeVotoEstudiante','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <label for="">Esta seguro de votar por: </label>
                            <br>
                            <label type="" name="name_student" id="name_student"></label>
                            <br>
                        </div>
                        <input type="hidden" name="FK_EleccionEstudianteId" id="FK_EleccionEstudianteId">
                        <input type="hidden" name="votoEstudiante" value="1">
                    </div>

                    {!! Form::submit('Enviar ', ['class'=>'btn btn-large btn btn-success']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15-datatable">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Elecciones Wennec</h1>
                        </div>
                    </div>
                    @foreach($eleccionEstudiantes as $eleccionEstudiante)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="student-inner-std res-mg-b-30">
                            <div class="student-img">
                                <?php
                                if (($eleccionEstudiante->foto) == "") {
                                    echo '<img style="max-width:40%;" src="assets/iconos/usuario3.png" alt="" />';
                                } else {

                                    echo '<img style=" border-radius: 50%;max-width:40%;" src="Foto/Usuarios/' . $eleccionEstudiante->foto . '" alt="" />';
                                }
                                ?>
                            </div>
                            <div class="student-dtl">
                                <h2>{{$eleccionEstudiante->name}}</h2>
                                <p class="dp-ag"><b>Grupo:</b> {{$eleccionEstudiante->grupo}}</p>
                                <br>
                                <?php
                                $exists = DB::table('tbl_estadovotoestudiante')->where('FK_VotoEstudianteId', $id)->where('votoEstudiante', 1)->first();
                                if (!$exists) {
                                    echo '<button type="button" id="mymodal" data-eleccione-id="' . $eleccionEstudiante->idEleccionEstudiante . '" data-estudiante-name="' . $eleccionEstudiante->name . '" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVoto">Votar</button>';
                                } else {
                                    echo '<button class="btn btn-success btn-md"><i class="fas fa-check"></i></button> ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#modalVoto').on('show.bs.modal', function(e) {
            var FK_EleccionEstudianteId = $(e.relatedTarget).data('eleccione-id');
            $(e.currentTarget).find('input[name="FK_EleccionEstudianteId"]').val(FK_EleccionEstudianteId);
            var eleccionEstudiante = document.getElementById('FK_EleccionEstudianteId').innerHTML = FK_EleccionEstudianteId;

            var name_student = $(e.relatedTarget).data('estudiante-name');
            $(e.currentTarget).find('label[name="name_student"]').val(name_student);
            var nombreEstudiante = document.getElementById('name_student').innerHTML = name_student;
        });
    });
</script>