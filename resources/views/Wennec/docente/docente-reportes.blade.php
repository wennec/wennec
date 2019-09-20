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
                <h1>Reportes</h1>
              </div>
            </div>
            <br>
            <div class="single-product-text">
              <img src="img/product/pro4.jpg" alt="">
              @foreach($teachers_name as $teacher_name)
              <h4><a class="cards-hd-dn">{{$teacher_name->name}}</a></h4>
              @endforeach
              <h5>Certificado Laboral</h5>
              <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="cards-dtn">
                    <button type="button" name="button" class="btn btn-primary"><a href="{{url('/reportescertificado')}}"
                      style="color:white;"target="_blank">Generar PDF</a></button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Static Table End -->
</div>
@endsection
