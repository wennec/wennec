@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')
<div class="data-table-area mg-b-15-datatable">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Editar Evaluacion Docente</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                      {!!Form::model($fechasEvaluacionDocente, ['route' => ['fechaevaluaciondocenteA.update',$fechasEvaluacionDocente], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])!!}
                          <div class="row">
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group form-md-line-input">
                                          <label for="">Fecha Inicio</label>
                                          {!!Form::date('fecha_inicio',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                      </div>
                                  </div>
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="">Fecha Final</label>
                                        {!!Form::date('fecha_fin',null,['class'=>'form-control','placeholder'=>'Nombre','required'])!!}
                                    </div>
                                  </div>
                              </div>
                              {!! Form::submit('Editar Peticion', ['class'=>'btn btn-large btn-primary']) !!}
                              {{link_to_route('fechaevaluaciondocenteA.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
                              </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
