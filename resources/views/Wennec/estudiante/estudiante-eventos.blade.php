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
                                        <td style="text-align: inherit; padding-left: 5rem;"><img
                                                src="new-assets/img/EscudoColegios/GSN.png" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase mx-auto" id="headerText">
                                        <img src="new-assets/img/icon/AGENDA TITULO.png" height="30" alt="">
                                        @foreach($estudianteName as $estudianteName)
                                        <span class="text-wennec-light"> <strong class="text-wennec-bold"> Agenda </strong> - {{ $estudianteName->name }}</span>
                                        @endforeach
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
                                                @foreach($agendaestudiante as $agendaestudiante)
                                                <?php
                                                $date = \Carbon\Carbon::parse($agendaestudiante->fecha)
                                                ?>
                                                <tr class="styleFila">  
                                                    <td style="width: 30%;" class="fechaAgenda">
                                                        <span class="NumFecha"><?php echo $date->day; ?></span>
                                                        <span class="finFecha"><?php echo $date->format('l') ?> <br>/<?php echo $date->month ?> </span>
                                                    </td>

                                                    <td style="width: 70%;position: relative;" >
                                                    {!! Form::open(['route'=>'agendaEstudiante.index','method'=>'POST']) !!}
                                                    {!!Form::hidden('modalIdAgenda', $agendaestudiante->PK_id)!!}
                                                    <button type="button" class="float-right btn btn-simple btn-primary btn-icon edit fa fa-comment" data-toggle="modal"
                                                    data-target="#modalVerAgenda"></button>
                                                    {!! Form::close() !!}

                                                        <aside style="width: 88%;">
                                                            <h4>Agenda</h4>
                                                            <h5>{{ $agendaestudiante->tipo_agenda}}</h5>
                                                            <p>
                                                                {{ $agendaestudiante->descripcion }}
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
<!-- Modal Crear -->
<div class="modal fade" id="modalVerAgenda" tabindex="9" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" style="width: 100%;">COMENTARIOS EN LA ANOTACIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                <span class="text-wennec-light"><strong class="text-wennec-bold">Tipo de Anotacion: </strong> {{ $modalagendaestudiante->tipo_agenda}}</span>
                <br>
                <span class="text-wennec-light"><strong class="text-wennec-bold">Descripción:</strong> {{ $modalagendaestudiante->descripcion }}</span>
                <hr>
                    {!! Form::open(['route'=>'eventoA.store','method'=>'POST']) !!}
                        <div class="form-row">
                          <div class="col-md-12">
                            {!!Form::textarea('comentario_padre', $modalagendaestudiante->comentario_padre,['class'=>'form-control','placeholder'=>'Comentario*','required'])!!}
                          </div>
                        </div>
                        <div class="form-row text-center">
                            <button type="submit" class="btnPublicar text-center mt-3 mb-2">publicar</button>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
    

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



