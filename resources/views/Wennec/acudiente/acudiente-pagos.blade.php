@extends('layouts.dash')
@section('content')
<section>
    <div class="rad-body-wrapper rad-nav-min">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row calificacioneSection" style="margin-bottom:.25em;">
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

                        <section id="comunicados">
                            <header class="text-uppercase mt-3" id="headerText">
                                <img src="new-assets/img/icon/PAGOS ELECTRONICOS TITULO.png" height="30" alt="">
                                <span> Pagos Electrónicos</span>
                                <br>
                                
                            </header>
                            <div class="row mt-4" style="width: 100%;">
                                <h3>Martín Pérez - 10º</h3>
                                <hr style="width: 100%;">
                              <div class="col-md-5 col-xs-5" style="padding:0px !important;">
                                  <h3 style="padding:0em 1em;color: #4D4D4D;">Pagos actuales</h3>
                                <form  id="colCertifi">
                                    <div class="form-row">
                                      <div class="col-md-11">
                                        <input type="text" class="form-control" placeholder="Concepto" style="margin:0.5em !important;">
                                        <input type="text" class="form-control" placeholder="Descripción" style="margin:0.5em !important;">
                                        <input type="number" class="form-control" placeholder="Valor" style="margin:0.5em !important;">
                                        <input type="text" class="form-control" placeholder="Estado" style="margin:0.5em !important;">
                                        <input type="text" class="form-control" placeholder="Fecha" style="margin:0.5em !important;">
                                      </div>
                                    </div>
                                    <div class="form-row text-left mt-3 mb-2">
                                        <button class="btnAzul" style="font-size: .75em !important;">+ Agregar a mi historial</button>
                                    </div>
                                  </form>
                              </div>
                              <div class="col-md-6 col-xs-5 ml-4" style="padding:0px !important;">
                                  <h3 style="color: #4D4D4D;">Historial de pagos</h3>
                                  <table  id="task-list-tbl" class="table" style="font-size: 0.7em;">
                                      <thead>
                                          <th>Concepto</th>
                                          <th>Descripción</th>
                                          <th>Valor</th>
                                          <th>Estado</th>
                                          <th>Fecha</th>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <p style="text-align: right;"><small style="font-family: 'typoldmedium';"> Total pagado:</small></p>
                                  <hr style="border-style: dashed; width: 100%;">
                                  <br>
                                  <button class="btnAzul" style="width: 100% !important;">
                                    <a href="#" download="Reportecolegio">
                                        Descargar Comprobante
                                        </a>
                                  </button>
                              </div>

                              <div class="row" style="width: 100%;">
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="assets/img/logo/boton_efecty.png" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Efecty </h3>
                                        <p>Pagos</p>
                                    </aside>
                                </div>
                                <div class="col-xs-4" style="padding: .5em 1.5em 1.5em;width:55%;">

                                <form id="FrmPost" action="https://190.85.158.250:15000/BotonPagoEfecty/EfectyBotonPagopost.aspx" method="post" target="ventana" onsubmit="SubmitPost();">
                                        <input type="hidden" name="EFvalorTotal" id="EFvalorTotal" />
                                        <input type="hidden" name="EFpin" id="EFpin" />
                                        <input type="hidden" name="EFFechaVigencia" id="EFFechaVigencia" />
                                        <input type="hidden" name="EFCodProyecto" id="EFCodProyecto" />
                                        <label for="">Valor</label>
                                        <input class="form-control" placeholder="Valor" type="text" id="txtValorPost" />
                                        <?php
                                        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                                        $numerodeletras = 11; //numero de letras para generar el texto
                                        $cadena = ""; //variable para almacenar la cadena generada
                                        for ($i = 0; $i < $numerodeletras; $i++) {
                                          $cadena .= substr($caracteres, rand(0, strlen($caracteres)), 1); /*Extraemos 1 caracter de los caracteres 
                    entre el rango 0 a Numero de letras que tiene la cadena */
                                        }

                                        echo '<input class="form-control" placeholder="Pin" type="hidden" id="txtPinPost" value="'.$cadena.'" />';
                                        ?>
                                        <label for="">Fecha de expiración</label>
                                        <input type="date" class="form-control" id="txtFechaPost" />
                                        <input type="hidden" class="form-control" id="txtCodProyectoPost" value="111422" />
                                    
                                        <button type="submit" class="btnVotar mt-3 mb-2">Enviar</button>
                                </form>

                                </div>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</section>

<script language="javascript" type="text/javascript">
  function SubmitPost() {
    document.getElementById('EFvalorTotal').value = document.getElementById('txtValorPost').value;
    document.getElementById('EFpin').value = document.getElementById('txtPinPost').value;
    document.getElementById('EFFechaVigencia').value = document.getElementById('txtFechaPost').value;
    document.getElementById('EFCodProyecto').value = document.getElementById('txtCodProyectoPost').value;
    window.open('', 'ventana', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars = no, resizable = no, width = 700, height = 640 ')
  }
</script>
@endsection

