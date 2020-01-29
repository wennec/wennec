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
                                             src="{{ asset('new-assets/img/escudoColegio.png') }}" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            <h1>Nombre Colegio</h1>
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="{{ asset('new-assets/img/icon/COMUNICADOS TITULO.png') }}" height="30" alt="">
                                        <span> Agenda</span>
                                    </header>

                                    <br>

                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}


                                    <aside class="formatCard">
                                        <div class="row" id="headertablaAgenda">
                                            <div class="col-md-3 col-xs-3 text-right">
                                                <button type="button" class="btnAgregar" id="btnAgregar"  data-toggle="modal" data-target="#modalCreate"><img src="{{ asset('new-assets/img/icon/editar.png') }}"
                                                        alt="editar dato en agenda"></button>
                                            </div>
                                        </div>

                                        {!!Form::model($departamento, ['route' => ['eventoA.update',$departamento], 'method' => 'PUT','files' => true, 'enctype'=>'multipart/form-data'])!!}
                                            <div class="form-row">
                                            <div class="col-md-8">
                                                {!!Form::text('titulo_evento',null,['class'=>'form-control','placeholder'=>'Titulo*','required'])!!}
                                                {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Fecha*','required'])!!}
                                                <select class="form-control" name="FK_EventosId" id="" required="">
                                                    @foreach($tipoEventos as $tipoEvento)
                                                        <option value="{{$tipoEvento->PK_id}}">{{$tipoEvento->tipo_evento}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 text-center" id="formImage">
                                                <img src="new-assets/img/escudoColegio.png" alt="" width="100">
                                            </div>
                                            </div>
                                            <div class="form-row text-center">
                                                <button type="submit" class="btnPublicar text-center mt-3 mb-2">publicar</button>
                                            </div>
                                        {!! Form::close() !!}


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



