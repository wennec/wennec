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
                                        <img src="new-assets/img/icon/HORARIOS DE CLASE TITULO.png" height="30" alt="">
                                        <span> horarios</span>
                                    </header>

                                    <br>



                                        <table id="myTable" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <th class="text-center">Grupo</th>
                                        <th class="text-center">Materia</th>
                                        <th class="text-center">Agregar</th>
                                    </thead>

                                    <tbody>
                                        @foreach($grupos as $grupo)
                                        <tr  class="text-center">
                                            <td>{{$grupo->grupo}}</td>
                                            <td>{{$grupo->nombre_materia}}</td>
                                            <td><button type="button" id="mymodal" class="btn btn-primary btn-md" data-logro-id="{{$grupo->idgrupomateria}}" data-toggle="modal" data-target="#modalCreate">
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
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Horario</h4>
    </div>
    <div class="modal-body">
      {!! Form::open(['route'=>'horarios.store','method'=>'POST']) !!}

          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-12">
                  <div class="form-group form-md-line-input">
                      <label>Docente</label>
                          <select class="form-control" name="FK_docente" id="" required="">
                              <option value="">Seleccionar</option>
                                  @foreach($docentes as $docente)
                                      <option value="{{$docente->PK_id}}">{{$docente->name}}</option>
                                  @endforeach
                                  <input type="hidden" name="id_grupomateria" id="idLogro">
                          </select>
                  </div>


                  <div class="form-group form-md-line-input">
                      <label>Dia</label>

                          <select class="form-control" name="FK_DiaId" id="" required="">
                              <option value="">Seleccionar</option>
                                  @foreach($dias as $dia)
                                      <option value="{{$dia->PK_id}}">{{$dia->dia}}</option>
                                  @endforeach
                          </select>
                  </div>

                  <div class="form-group form-md-line-input">
                      <label>Hora Inicio</label>
                          <select class="form-control" name="horaInicio" id="" required="">
                              <option value="">Seleccionar</option>
                                      <option value="08:00:00">08:00 am</option>
                                      <option value="09:00:00">09:00 am</option>
                                      <option value="10:00:00">10:00 am</option>
                                      <option value="11:00:00">11:00 am</option>
                                      <option value="12:00:00">12:00 m</option>
                                      <option value="13:00:00">01:00 pm</option>
                                      <option value="14:00:00">02:00 pm</option>
                                      <option value="15:00:00">03:00 pm</option>
                                      <option value="16:00:00">04:00 pm</option>
                                      <option value="17:00:00">05:00 pm</option>
                                      <option value="18:00:00">06:00 pm</option>
                          </select>
                  </div>

                  <div class="form-group form-md-line-input">
                      <label>Hora Fin</label>
                      <select class="form-control" name="horaFin" id="" required="">
                              <option value="">Seleccionar</option>
                                      <option value="08:00:00">08:00 am</option>
                                      <option value="09:00:00">09:00 am</option>
                                      <option value="10:00:00">10:00 am</option>
                                      <option value="11:00:00">11:00 am</option>
                                      <option value="12:00:00">12:00 m</option>
                                      <option value="13:00:00">01:00 pm</option>
                                      <option value="14:00:00">02:00 pm</option>
                                      <option value="15:00:00">03:00 pm</option>
                                      <option value="16:00:00">04:00 pm</option>
                                      <option value="17:00:00">05:00 pm</option>
                                      <option value="18:00:00">06:00 pm</option>
                          </select>
                  </div>
              </div>


          </div>
          {!! Form::submit('Crear Horario', ['class'=>'btn btn-large btn-success']) !!}
          {{link_to_route('horarios.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
          </div>
      {!! Form::close() !!}
    </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script>
$(document).ready(function (e) {
  $('#modalCreate').on('show.bs.modal', function(e) {
    var id_grupo = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#id_grupo').val(id_grupo);
    var id_materia = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#id_materia').val(id_materia);
    var id_grupomateria = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#id_grupomateria').val(id_grupomateria);
  });
});
</script>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#modalCreate').on('show.bs.modal', function(e) {
            var estudiante = $(e.relatedTarget).data('logro-id');
            $(e.currentTarget).find('input[name="id_grupomateria"]').val(estudiante);
            var student = document.getElementById('idLogro').innerHTML = estudiante;
        });
    });
</script>
@endsection
