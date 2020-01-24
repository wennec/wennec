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
                                    <header class="text-uppercase" id="headerText">
                                        <img src="new-assets/img/icon/CALIFICACIONES COLOR MENU PLEGABLE.png" height="30" alt="">
                                        <span> Calificaciones</span>
                                    </header>

                                    <br>



                                     <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <th class="text-center">Grupo</th>
                                            <th class="text-center">Materia</th>
                                            <th class="text-center">Logros</th>
                                            <th class="text-center">Agregar</th>
                                        </thead>

                                        <tbody>
                                            @foreach($grupos as $grupo)
                                            <tr  class="text-center">
                                                <td>{{$grupo->grupo}}</td>
                                                <td>{{$grupo->nombre_materia}}</td>
                                                <td>{{link_to_route('logroDocente.show', $title = '', $parameter = $grupo->idGrupoMateria, $attributes = ['class' => 'btn-lg btn-success fa fa-eye'])}}
                                                </td>
                                                <td>
                                                <input type="hidden" name="id" id="asignatura" value="{{$grupo->idGrupoMateria}}">
                                                <button type="button" id="mymodal" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCreate">
                                                    <i class="fa fa-plus"></i>

                                                    </button>
                                                </td>
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

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Logro</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'logroDocente.store','method'=>'POST']) !!}
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <div class="form-group form-md-line-input">
                            {!!Form::text('logro',null,['class'=>'form-control','placeholder'=>'Logro','required'])!!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <div class="form-group form-md-line-input">
                            {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required'])!!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <div class="form-group form-md-line-input">
                            <label>Periodo</label>
                            <select class="form-control" name="FK_Periodo" id="" required="">
                                @foreach($periodos as $periodo)
                                <option value="{{$periodo->PK_id}}">{{$periodo->periodo}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="FK_GrupoMaterias" id="asignatura" value="{{$grupo->idGrupoMateria}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar Logro</button>
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
<script>
    $(document).ready(function(e) {
        $('#modalCreate').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data().id;
            $(e.currentTarget).find('#asignatura').val(id);
        });
    });
</script>
@endsection

