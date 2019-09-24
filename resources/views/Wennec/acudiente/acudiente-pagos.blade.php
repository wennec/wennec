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
                <h1>Pagos</h1>
              </div>
            </div>
            {!! Form::open(['route'=>'eleccionEstudiante.storeVotoEstudiante','method'=>'POST']) !!}
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div style="text-align:center"class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-md-line-input">
                  <img src="assets/img/logo/boton_efecty.png">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-md-line-input">
                  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre completo (Como aparece en la tarjeta)','required'])!!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-md-line-input">
                  {!!Form::text('numero',null,['class'=>'form-control','placeholder'=>'Número de la tarjeta','required'])!!}
                </div>
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group form-md-line-input">
                  <label for="">Fecha de expiración</label>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group form-md-line-input">
                  <label for="">CVC ?</label>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group form-md-line-input">
                  {!!Form::number('numero',null,['class'=>'form-control','placeholder'=>'MM','required'])!!}
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group form-md-line-input">
                  {!!Form::number('numero',null,['class'=>'form-control','placeholder'=>'YY','required'])!!}
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group form-md-line-input">
                  {!!Form::number('numero',null,['class'=>'form-control','placeholder'=>'','required'])!!}
                </div>
              </div>
              <div style="text-align:center" class="col-xs-12 col-sm-12 col-md-12">
                {!! Form::submit('CONFIRMAR PAGO ', ['class'=>'btn btn-large btn btn-warning']) !!}
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
