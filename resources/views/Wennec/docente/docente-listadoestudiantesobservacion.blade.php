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
                                        <img src="new-assets/img/icon/OBSERVADOR TITULO.png" height="30" alt="">
                                        <span> Observaciones</span>
                                    </header>

                                    <br>

                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}



                                     <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <th class="text-center">Estudiante</th>
                                        <th class="text-center">Agregar</th>
                                        </thead>

                                        <tbody>
                                            @foreach($listado_estudiantes as $estudiante)
                                            <tr  class="text-center">
                                                <td>{{$estudiante->name}}</td>
                                                <td><button type="button" id="mymodal" class="open-homeEvents btn btn-success btn-md" data-estudiante-id='{{$estudiante->id_estudiante}}' data-toggle="modal" data-target="#modalCreate">
                                                <i class="fa fa-plus"></i>
                                            </button></td>
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
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrar Observación</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'observacionDocente.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group form-md-line-input">
                              <label for="">Periodo</label>
                              <select class="form-control" name="FK_Periodo" id="" required="">
                                  @foreach($periodos as $periodo)
                                      <option value="{{$periodo->PK_id}}">{{$periodo->periodo}}</option>
                                  @endforeach
                              </select>
                            </div>

                            <div class="form-group form-md-line-input">
                              <label for="">Observacion</label>
                              <select class="form-control" name="FK_Observacion" id="" required="">
                                  @foreach($observaciones as $observacion)
                                      <option value="{{$observacion->PK_id}}">{{$observacion->descripcion}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <input type="hidden" name="FK_Estudiante" id="FK_Estudiante">
                            <input type="hidden" name="FK_Materia" id="id_materia" value="{{$id_materia}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Registrar Observacion</button>
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
     var eleccione = $(this).data('estudiante-id');
     $('#FK_Estudiante').val( eleccione );
});
</script>
@endsection

