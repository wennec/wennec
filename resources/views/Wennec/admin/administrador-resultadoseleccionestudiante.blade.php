@extends('layouts.dash')

@section('content')
<div class="col-md-12">
    {{--Inicio Mensaje Confirmar--}}
    @include('Wennec.alerts.success')
    @include('Wennec.alerts.error')
    @include('Wennec.alerts.errors')
    {{--Fin Mensaje Confirmar--}}
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
                    @foreach($resultados as $resultado)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="student-inner-std res-mg-b-30">
                            <div class="student-img">
                                <?php
                                if (($resultado->foto) == "") {
                                    echo '<img style="max-width:40%;" src="assets/iconos/usuario3.png" alt="" />';
                                } else {

                                    echo '<img style=" border-radius: 50%;max-width:40%;" src="Foto/Usuarios/' . $resultado->foto . '" alt="" />';
                                }
                                ?>
                            </div>
                            <div class="student-dtl">
                                <h2>{{$resultado->name}}</h2>
                                <p class="dp-ag"><b>Grupo:</b> {{$resultado->grupo}}</p>
                                <br>
                                <button class="btn btn-success btn-md">{{$resultado->total}}</button> 
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