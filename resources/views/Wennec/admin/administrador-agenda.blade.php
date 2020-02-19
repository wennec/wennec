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
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="new-assets/img/icon/AGENDA TITULO.png" height="30" alt="">
                                            <span>AGENDA</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </div>
                                </div>

                                    <br>

                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}


                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-9 col-xs-9">
                                                <form name="FilterForm" id="FilterForm" action="" method="">
                                                    <input type="text" id="buscarAgenda" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar">
                                                </form>
                                            </div>
                                            <div class="col-md-3 col-xs-3 text-right">
                                                <button type="button" class="btnAgregar" id="btnAgregar"  data-toggle="modal" data-target="#modalCreate"><img src="new-assets/img/icon/agregar.png"
                                                        alt="agregar dato en agenda"></button>
                                            </div>
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
                                                    <a class="iconEditar" href="agendaA/{{$evento->id}}/edit"><img src="new-assets/img/icon/editar.png"></a>
                                                        <aside style="width: 88%;">
                                                            <h4>Agenda</h4>
                                                            <h5>{{ $evento->titulo}}</h5>
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

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Crear Observación</h4>
                            </div>
                            <div class="modal-body">
                            {!! Form::open(['route'=>'agendaA.store','method'=>'POST']) !!}
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulo','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                                {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Fecha'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                            <select class="form-control" name="estudiante" id="" required="">
                                                <option value="">Seleccione el Curso</option>
                                            @foreach($estudiantes as $estudiantes)
                                                <option value="{{$estudiantes->PK_id}}">{{$estudiantes->name}}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group form-md-line-input">
                                            <select class="form-control" name="estudiante" id="" required="">
                                                <option value="">Seleccione el Estudiante</option>

                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Crear</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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

