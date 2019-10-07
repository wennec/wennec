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
            <form id="FrmPost" action="https://190.85.158.250:15000/BotonPagoEfecty/EfectyBotonPagoGet.aspx" method="post" target="ventana" onsubmit="SubmitPost();">
              <input type="hidden" name="EFvalorTotal" id="EFvalorTotal" />
              <input type="hidden" name="EFpin" id="EFpin" />
              <input type="hidden" name="EFFechaVigencia" id="EFFechaVigencia" />
              <input type="hidden" name="EFCodProyecto" id="EFCodProyecto" />
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div style="text-align:center" class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group form-md-line-input">
                    <img src="assets/img/logo/boton_efecty.png">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group form-md-line-input">
                    <input class="form-control" placeholder="Valor" type="text" id="txtValorPost" />
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group form-md-line-input">
                    <?php
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                    $numerodeletras = 11; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                    for ($i = 0; $i < $numerodeletras; $i++) {
                      $cadena .= substr($caracteres, rand(0, strlen($caracteres)), 1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
                    }

                    echo '<input class="form-control" placeholder="Pin" type="text" id="txtPinPost" value="'.$cadena.'" />';
                    ?>
                    
                  </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                  <div class="form-group form-md-line-input">
                    <label for="">Fecha de expiración</label>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group form-md-line-input">
                    <input type="date" class="form-control" id="txtFechaPost" />
                    <input type="hidden" class="form-control" id="txtCodProyectoPost" value="111422" />
                  </div>
                </div>
                <div style="text-align:center" class="col-xs-12 col-sm-12 col-md-12">
                  <input type="submit" class="btn btn-warning" value="Enviar Post" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script language="javascript" type="text/javascript">
  function SubmitPost() {
    document.getElementById('EFvalorTotal').value = document.getElementById('txtValorPost').value;
    document.getElementById('EFpin').value = document.getElementById('txtPinPost').value;
    document.getElementById('EFFechaVigencia').value = document.getElementById('txtFechaPost').value;
    document.getElementById('EFCodProyecto').value = document.getElementById('txtCodProyectoPost').value;
    window.open('', 'ventana', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars = no, resizable = no, width = 700, height = 640 ')
  }
</script>