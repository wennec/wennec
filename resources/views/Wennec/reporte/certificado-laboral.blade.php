@extends('Wennec.reporte.master-certificado')
@section('body')
<div class="col-md-12">
  <!-- Static Table Start -->
  <div class="data-table-area mg-b-15-datatable">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="sparkline13-list">
            <div class="sparkline13-hd">
              <div class="main-sparkline13-hd">
                <p>Que el(la) señor(a) <span>{{$name_teacher}}</span> identificado(a) con cédula de Ciudadania No. <span>{{$teacher_document}},</span>
                esta vinculado(a) con nuestra institucion educativa.</p>
                <br><br><br><br>
                <p>Se expide a solicitud del interesado el {{ $startDate }}.</p>
                <br><br><br><br>
                <p>Cordialmente,</p>
                <p>{{$represent}}</p>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Static Table End -->
</div>
@endsection
