@extends('layouts.dash')
@section('content')
<section>
            <div class="rad-body-wrapper rad-nav-min">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row spacenameSchool">
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

                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="new-assets/img/icon/AGENDA TITULO.png" height="30" alt="">
                                        <span> Agenda</span>
                                    </header>


                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-9 col-xs-9">
                                                <form name="FilterForm" id="FilterForm" action="" method="">
                                                    <input type="text" id="buscarAgenda" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar">
                                                </form>
                                            </div>
                                            <br>
                                        </div>

                                        <table id="tablaAgenda">
                                            <thead>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach($eventos as $evento)
                                                <?php
                                                $date = \Carbon\Carbon::parse($evento->fecha)
                                                ?>
                                                <tr class="styleFila">  
                                                    <td style="width: 30%;" class="fechaAgenda">
                                                        <span class="NumFecha"><?php echo $date->day; ?></span>
                                                        <span class="finFecha"><?php echo $date->format('l') ?> <br>/<?php echo $date->month ?> </span>
                                                    </td>

                                                    <td style="width: 70%;position: relative;" >
                                                       
                                                        <aside style="width: 88%;">
                                                            <h4>Agenda</h4>
                                                            <h5>{{ $evento->tipo_agenda}}</h5>
                                                            <p>
                                                                {{ $evento->descripcion }}
                                                            </p>
                                                        </aside>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border-bottom: .75px solid  #E2E2E2;">
                                                        <p class="borderTable"></p>
                                                    </td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>


                                    </aside>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

    

<script>
function myFunction() {
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("buscarAgenda");
	filter = input.value.toUpperCase();
	table = document.getElementById("tablaAgenda");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	  td = tr[i].getElementsByTagName("td")[0];
	  if (td) {
		txtValue = td.textContent || td.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
		  tr[i].style.display = "";
		} else {
		  tr[i].style.display = "none";
		}
	  }       
	}
  }
</script>
@endsection



