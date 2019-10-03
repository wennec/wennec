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
                            <h1>Editar Calificacion</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                      {!!Form::model($calificacionesEstudiante, ['route' => ['calificacion.update',$calificacionesEstudiante], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])!!}
                          <div class="row">
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group form-md-line-input">
                                          {!!Form::text('calificacion',null,['class'=>'form-control','placeholder'=>'Calificacion','required'])!!}
                                          <input type="hidden" name="FK_Logro" value="{{$calificacionesEstudiante->FK_Logro}}">
                                      </div>
                                  </div>
                              </div>
                              {!! Form::submit('Editar Calificacion', ['class'=>'btn btn-large btn-success']) !!}

                              <button class="btn btn-danger"  type="button" name="button"><a style="color:white;" href="{{URL::previous()}}">Cancelar</a></button>
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
