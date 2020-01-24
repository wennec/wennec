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
                                                src="new-assets/img/escudoColegio.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            <h1>Nombre Colegio</h1>
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase mt-3" id="headerText">
                                        <img src="new-assets/img/icon/ADMISIONES Y MATRICULAS TITULO.png" height="30" alt="">
                                        <span> Admisiones y matriculas</span>
                                        <br>
                                        
                                    </header>

                                    <br>

                                </section>

                                
                            </div>

                            
                        </div>

                        <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <th class="text-center">Nombre Estudiante</th>
                                            <th class="text-center">Documento Estudiante</th>
                                            <th class="text-center">Curso</th>
                                            <th class="text-center">Correo Estudiante</th>
                                            <th class="text-center">Direccion Residencia</th>
                                            <th class="text-center">Nombre de Padre</th>
                                            <th class="text-center">Nombre de Madre</th>
                                            <th class="text-center">Nombre Acudiente</th>
                                            <th class="text-center">Telefono Acudiente</th>
                                            <th class="text-center">Correo Acudiente</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Fecha de Apertura</th>
                                        </thead>

                                        <tbody>
                                        @foreach($prematriculas as $prematricula)
                                        <tr class="text-center">
                                            <td class="text-center">{{$prematricula->nombreEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->numeroDocumentoEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->grupo}}</td>
                                            <td class="text-center">{{$prematricula->correoEstudiante}}</td>
                                            <td class="text-center">{{$prematricula->direccionResidencia}}</td>
                                            <td class="text-center">{{$prematricula->nombrePadre}}</td>
                                            <td class="text-center">{{$prematricula->nombreMadre}}</td>
                                            <td class="text-center">{{$prematricula->nombreAcudiente}}</td>
                                            <td class="text-center">{{$prematricula->telefonoAcudiente}}</td>
                                            <td class="text-center">{{$prematricula->correoAcudiente}}</td>
                                            @if($prematricula->estado == "Inactivo")
                                            <td><span class="label label-danger">Inactivo</span></td>
                                            @elseif($prematricula->estado == "Activo")
                                            <td><span class="label label-primary">Activo</span></td>
                                            @elseif($prematricula->estado == "Finalizado Correctamente")
                                            <td><span class="label label-success">Finalizado Correctamente</span></td>
                                            @elseif($prematricula->estado == "Finalizado Incorrectamente")
                                            <td><span class="label label-danger">Finalizado Incorrectamente</span></td>
                                            @endif
                                            <td class="text-center">{{$prematricula->created_at}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>


<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection

