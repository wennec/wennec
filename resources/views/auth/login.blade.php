<!doctype html>
  <html class="no-js" lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Wennec</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- favicon
  		============================================ -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
      <!-- Google Fonts
  		============================================ -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
      <!-- Bootstrap CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- Bootstrap CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <!-- owl.carousel CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/owl.carousel.css">
      <link rel="stylesheet" href="assets/css/owl.theme.css">
      <link rel="stylesheet" href="assets/css/owl.transitions.css">
      <!-- animate CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/animate.css">
      <!-- normalize CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/normalize.css">
      <!-- meanmenu icon CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/meanmenu.min.css">
      <!-- main CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/main.css">
      <!-- educate icon CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/educate-custon-icon.css">
      <!-- morrisjs CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/morrisjs/morris.css">
      <!-- mCustomScrollbar CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
      <!-- metisMenu CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/metisMenu/metisMenu.min.css">
      <link rel="stylesheet" href="assets/css/metisMenu/metisMenu-vertical.css">
      <!-- calendar CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/calendar/fullcalendar.min.css">
      <link rel="stylesheet" href="assets/css/calendar/fullcalendar.print.min.css">
      <!-- style CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/style.css">
      <!-- responsive CSS
  		============================================ -->
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- modernizr JS
  		============================================ -->
      <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
      <!--[if lt IE 8]>
  		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  	<![endif]-->
      <!-- Start Left menu area -->
      <div class="container">
            <div class="login_left_section"></div>
            <div class="login_rigth_section">
              <div class="form_login">
              {{--Inicio Mensaje Confirmar--}}
              @include('Wennec.alerts.success')
              @include('Wennec.alerts.error')
              @include('Wennec.alerts.errors')
              {{--Fin Mensaje Confirmar--}}
                <!-- Form -->
                <img src="assets/img/logo/logo_principal.png" alt="">
                <form action="{{ route('login') }}" class="form-horizontal" style="color: #757575;" role="form" method="post" novalidate>
                {{ csrf_field() }}
                  <!-- Email -->
                  <div class="row-form">
                  <!-- Password -->
                  <div class="form-login has-feedback has-feedback-left">
                    <label class="control-label sr-only"></label>
                    <div class=" col-sm-22">
                      <input type="text" class="form-control input-sm" name="email" placeholder="Usuario" />
                      <i class="form-control-feedback fa fa-user-o"></i>
                    </div>
                  </div>
                  <div class="form-login has-feedback has-feedback-left">
                    <label class="control-label sr-only"></label>
                    <div class=" col-sm-22">
                      <input type="password" name="password" class="form-control input-sm" placeholder="Contraseña" />
                      <i class="form-control-feedback fa fa-lock"></i>
                    </div>
                  </div>
                  </div>
                  <div class="d-flex justify-content-around">
                    <div>
                        <label id="label"class="form-check-label" for="materialLoginFormRemember">¿Olvidaste la contraseña?</label>
                    </div>
                  </div>

                  <div class="row text-danger text-center">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                  </div>
                  <!-- Sign in button -->
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Iniciar sesión</button>
                  <button type="button" id="mymodal" class="btn" data-toggle="modal" data-target="#modalCreate">
                        <i class="fa fa-plus"></i>
                        Crear Prematricula
                        </button>
                </form>
              </div>
            </div>
            </div>
      </div>

      <!-- End Left menu area -->
      <!-- Start Welcome area -->
      <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Formulario de Prematricula</h4>
              </div>
              <div class="modal-body">
              {!! Form::open(['route'=>'prematricula.store','method'=>'POST']) !!}
                  <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::text('nombreEstudiante',null,['class'=>'form-control','placeholder'=>'Nombres y Apellidos del Estudiante','required'])!!}
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::number('numeroDocumentoEstudiante',null,['class'=>'form-control','placeholder'=>'Numero de Identificacion','required'])!!}
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-12">
                              <div class="form-group form-md-line-input">
                                  <label>Curso al que se Matricula</label>
                                      <select class="form-control" name="FK_Grupo" id="" required="">
                                          @foreach($grupos as $grupo)
                                              <option value="{{$grupo->PK_id}}">{{$grupo->grupo}}</option>
                                          @endforeach
                                      </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                      {!!Form::email('correoEstudiante',null,['class'=>'form-control','placeholder'=>'Correo Electronico del Estudiante'])!!}
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::text('direccionResidencia',null,['class'=>'form-control','placeholder'=>'Dirección de Residencia','required'])!!}
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group form-md-line-input">
                                  {!!Form::text('nombrePadre',null,['class'=>'form-control','placeholder'=>'Nombres y Apellidos del Padre'])!!}
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group form-md-line-input">
                                  {!!Form::text('nombreMadre',null,['class'=>'form-control','placeholder'=>'Nombres y Apellidos de la Madre'])!!}
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::text('nombreAcudiente',null,['class'=>'form-control','placeholder'=>'Nombres y Apellidos del Acudiente','required'])!!}
                              </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::number('telefonoAcudiente',null,['class'=>'form-control','placeholder'=>'Teléfono de contacto del Acudiente','required'])!!}
                              </div>
                          </div>

                          <div class="col-xs-6 col-sm-6 col-md-12">
                              <div class="form-group form-md-line-input">
                                  {!!Form::email('correoAcudiente',null,['class'=>'form-control','placeholder'=>'Correo Electronico Acudiente','required'])!!}
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group form-md-line-input">
                                  {!!Form::number('codigoColegio',null,['class'=>'form-control','placeholder'=>'Codigo Provisionado por el Colegio','required'])!!}
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                      {!! Form::submit('Crear Prematricula', ['class'=>'btn btn-large btn-primary']) !!}
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                      </div>
                  {!! Form::close() !!}
              </div>
              </div>
          </div>
          </div>

      <!-- jquery
  		============================================ -->
      <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
      <!-- bootstrap JS
  		============================================ -->
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- wow JS
  		============================================ -->
      <script src="assets/js/wow.min.js"></script>
      <!-- price-slider JS
  		============================================ -->
      <script src="assets/js/jquery-price-slider.js"></script>
      <!-- meanmenu JS
  		============================================ -->
      <script src="assets/js/jquery.meanmenu.js"></script>
      <!-- owl.carousel JS
  		============================================ -->
      <script src="assets/js/owl.carousel.min.js"></script>
      <!-- sticky JS
  		============================================ -->
      <script src="assets/js/jquery.sticky.js"></script>
      <!-- scrollUp JS
  		============================================ -->
      <script src="assets/js/jquery.scrollUp.min.js"></script>
      <!-- counterup JS
  		============================================ -->
      <script src="assets/js/counterup/jquery.counterup.min.js"></script>
      <script src="assets/js/counterup/waypoints.min.js"></script>
      <script src="assets/js/counterup/counterup-active.js"></script>
      <!-- mCustomScrollbar JS
  		============================================ -->
      <script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/scrollbar/mCustomScrollbar-active.js"></script>
      <!-- metisMenu JS
  		============================================ -->
      <script src="assets/js/metisMenu/metisMenu.min.js"></script>
      <script src="assets/js/metisMenu/metisMenu-active.js"></script>
      <!-- morrisjs JS
  		============================================ -->
      <script src="assets/js/morrisjs/raphael-min.js"></script>
      <script src="assets/js/morrisjs/morris.js"></script>
      <script src="assets/js/morrisjs/morris-active.js"></script>
      <!-- morrisjs JS
  		============================================ -->
      <script src="assets/js/sparkline/jquery.sparkline.min.js"></script>
      <script src="assets/js/sparkline/jquery.charts-sparkline.js"></script>
      <script src="assets/js/sparkline/sparkline-active.js"></script>
      <!-- calendar JS
  		============================================ -->
      <script src="assets/js/calendar/moment.min.js"></script>
      <script src="assets/js/calendar/fullcalendar.min.js"></script>
      <script src="assets/js/calendar/fullcalendar-active.js"></script>
      <!-- plugins JS
  		============================================ -->
      <script src="assets/js/plugins.js"></script>
      <!-- main JS
  		============================================ -->
      <script src="assets/js/main.js"></script>
  </body>

  </html>
