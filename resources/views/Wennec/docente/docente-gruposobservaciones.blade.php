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
                                        <td style="text-align: inherit; padding-left: 5rem;"><img
                                                src="new-assets/img/EscudoColegios/GSN.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                <header class="text-uppercase" id="headerText">
                                        <img src="new-assets/img/icon/OBSERVADOR TITULO.png" height="30" alt="">
                                        <span> Observador</span>
                                    </header>

                                    <br>



                                     <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <th class="text-center">Grupo</th>
                                            <th class="text-center">Materia</th>
                                            <th class="text-center">Ver</th>
                                        </thead>

                                        <tbody>
                                            @foreach($materiasdocente as $materiadocente)
                                            <tr  class="text-center">
                                                <td>{{$materiadocente->grupo}}</td>
                                                <td>{{$materiadocente->nombre_materia}}</td>
                                                <td>{{link_to_route('observacionDocente.show', $title = '', $parameter = [$materiadocente->id_grupo, $materiadocente->id_materia], $attributes = ['class' => 'btn btn-simple btn-success btn-icon edit fa fa-list-alt'])}}</td>
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


        <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection

