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
						<button type="submit" class="btnL text-center">Iniciar sesión</button>
						<br/>
						<button type="submit" class="btnR text-center">Registrar</button>
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
	<footer>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</footer>

</body>
</html>