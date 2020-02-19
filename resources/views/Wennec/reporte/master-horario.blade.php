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
      <div> Grupo: {{$grupo}} </div>
      <br><br><br><br><br><br>
    </div>
  </header>
  <div class="container-fluid">
  <div class="col-md-12">

<!-- Static Table Start -->
<div class="calender-area mg-b-15-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="calender-inner">
                    <div id='calendario'></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Static Table End -->
</div>



  </div>
</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script type="text/javascript">

function holamundo(){
    document.getElementById("calendario").innerHTML = "hola mundo";
}


</script>
</html>
