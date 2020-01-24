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
                                        <img src="{{ asset('new-assets/img/icon/OBSERVADOR TITULO.png') }}" height="30" alt="">
                                        <span> Observador</span>
                                    </header>

                                    <br>



                                     <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <th class="text-center">Grupo</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Ver</th>
                                        </thead>

                                        <tbody>
                                            @foreach($materias_estudiante as $materia_estudiante)
                                            <tr  class="text-center">
                                                <td>{{$materia_estudiante->grupo}}</td>
                                                <td>{{$materia_estudiante->nombre_materia}}</td>
                                                <td>{{link_to_route('observacionAcudiente.show_observaciones', $title = '', $parameter =  [$id_estudiante, $materia_estudiante-> PK_id], $attributes = ['class' => 'btn btn-simple btn-success btn-icon edit fa fa-list-alt'])}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
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

