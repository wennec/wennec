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
                <h1>Evaluacion Docente</h1>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalEvaluation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Evaluacion Docente</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['route'=>'evaluacionDocenteE.store','method'=>'POST']) !!}
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group form-md-line-input">
                          <label type="" name="name_teacher" id="name_teacher"></label>
                          <br>
                          <label type="" name="materia" id="materia"></label>
                          <br>
                          <input type="hidden" name="teacher_id" id="teacher_id">
                          <input type="hidden" name="evaluado" value="1">
                          <div class="hiddenradio">
                            <label for="">Puntualidad</label>
                            <label>
                              <input type="radio" name="puntualidad" value="1" required >
                              <img src="/Test_teachers/like.png">
                            </label>

                            <label>
                              <input type="radio" name="puntualidad" value="0" required>
                              <img src="/Test_teachers/dislike.png">
                            </label>
                          </div>
                          <div class="hiddenradio">
                            <label for="">Dinamismo</label>
                            <label>
                              <input type="radio" name="dinamismo" value="1" required>
                              <img src="/Test_teachers/like.png">
                            </label>

                            <label>
                              <input type="radio" name="dinamismo" value="0" required>
                              <img src="/Test_teachers/dislike.png">
                            </label>
                          </div>
                          <div class="hiddenradio">
                            <label for="">Respeto</label>
                            <label>
                              <input type="radio" name="respeto" value="1" required>
                              <img src="/Test_teachers/like.png">
                            </label>

                            <label>
                              <input type="radio" name="respeto" value="0" required>
                              <img src="/Test_teachers/dislike.png">
                            </label>
                          </div>
                          <div class="hiddenradio">
                            <label for="">Actitud</label>
                            <label>
                              <input type="radio" name="actitud" value="1" required>
                              <img src="/Test_teachers/like.png">
                            </label>

                            <label>
                              <input type="radio" name="actitud" value="0" required>
                              <img src=/Test_teachers/dislike.png">
                            </label>
                          </div>

                        </div>
                      </div>
                    </div>
                    {!! Form::submit('Enviar', ['class'=>'btn btn-large btn-primary']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>

            @foreach($dates as $date)
            @if($date->fecha_inicio <= \Carbon\Carbon::now() && \Carbon\Carbon::now() <= $date->fecha_fin)
            <div class="sparkline13-graph">
              <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                  <select class="form-control dt-tb">
                    <option value="">Export Basic</option>
                    <option value="all">Export All</option>
                    <option value="selected">Export Selected</option>
                  </select>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                  <th class="text-center">Grupo</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Materia</th>
                  <th class="text-center">Evaluar</th>
                </thead>
                <tbody>
                  @foreach($teachersTest as $teacherTest)
                  <tr  class="text-center">
                    <td>{{$teacherTest->grupo}}</td>
                    <td>{{$teacherTest->name_teacher}}</td>
                    <td>{{$teacherTest->nombre_materia}}</td>
                    <td>
                      <button type="button" id="mymodal" class="btn btn-warning" data-docente-id="{{$teacherTest->id_teacher}}" data-name-id="{{$teacherTest->name_teacher}}" data-materia-id="{{$teacherTest->nombre_materia}}" data-toggle="modal" data-target="#modalEvaluation">
                        <i class="fas fa-check"></i>
                      </button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @else
            <div class="alert alert-danger">
              <ul>
                Aun no esta habilitada la evaluacion docente...!!!
              </ul>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Static Table End -->
</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
  $('#modalEvaluation').on('show.bs.modal', function(e) {
    var docente_id = $(e.relatedTarget).data('docente-id');
    $(e.currentTarget).find('input[name="teacher_id"]').val(docente_id);
    var docente = document.getElementById('teacher_id').innerHTML = docente_id;

    var docente = $(e.relatedTarget).data('name-id');
    $(e.currentTarget).find('label[name="name_teacher"]').val(docente);
    var docente = document.getElementById('name_teacher').innerHTML= docente;

    var materia = $(e.relatedTarget).data('materia-id');
    $(e.currentTarget).find('label[name="materia"]').val(materia);
    var materia = document.getElementById('materia').innerHTML= materia;
  });
});
</script>
@endsection
