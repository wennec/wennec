<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header class="row">
    <div class="col-xs-6 col-xs-offset-2" style="text-align: center;">
      <br><br><br><br>
      <h3>{{$name_school}}</h3>
      <div> NIT: {{$school_nit}} </div>
      <h2> CERTIFICA </h2>
      <br><br><br><br><br><br>
    </div>
  </header>
  <div class="container-fluid">
    @yield('body')
  </div>
</body>
</html>
