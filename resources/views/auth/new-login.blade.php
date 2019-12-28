<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login - Wennec</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="new-assets/css/style.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #ffffff;">
	
	<div class="limiter">
		<div class="container-flex">
			<div class="row">
				<div class="col-md-7 col-xs-12" id="loginImage">
				<aside class="text-center">
						<a href="/"><button class="btnL text-center">Regresar</button></a>
						<br/>
						<button type="button" id="mymodal" data-toggle="modal" data-target="#modalCreate" class="btnR text-center">Premátricula</button>
				</aside>
				</div>
				<div class="col-md-5 col-xs-12" style="height: 100vh;">
					<form action="{{ route('login') }}" method="post" class="loginForm">
            {{ csrf_field() }}
						<div class="form-group text-center">
							<img src="new-assets/img/logoWennecVertical.png" alt="Logo Wennec Vertical" id="logovertical">
						</div>
						<div class="form-group">
						  <input type="email" class="form-control" name="email" id="emailLogin" aria-describedby="emailHelp" placeholder="Email">
						</div>
						<div class="form-group">
						  <input type="password" class="form-control" name="password" id="contraLogin" placeholder="Contraseña">
						  <p  class="text-right"><a href="#" style="color: #ced4da;"><small>¿Olvidaste la contraseña?</small></a></p>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btnInicio text-center">Iniciar sesión</button>
              <br>
              <br>
              {{--Inicio Mensaje Confirmar--}}
              @include('Wennec.alerts.success')
              @include('Wennec.alerts.error')
              @include('Wennec.alerts.errors')
              {{--Fin Mensaje Confirmar--}}
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

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
                          <div class="col-xs-6 col-sm-6 col-md-12">
                              <div class="form-group form-md-line-input">
                                  {!!Form::number('codigoColegio',null,['class'=>'form-control','placeholder'=>'Codigo Provisionado por el Colegio','required'])!!}
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
					  <button type="submit" class="btn btn-warning">Crear Prematricula</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                      </div>
                  {!! Form::close() !!}
              </div>
              </div>
          </div>
          </div>
	<footer>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</footer>

</body>
</html>