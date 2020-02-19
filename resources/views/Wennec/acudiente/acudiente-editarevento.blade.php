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
                                                src="{{ asset('new-assets/img/EscudoColegios/GSN.png') }}" alt="image colegio" style="width: 40px;">
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>

                                <section id="agenda">
                                    <header class="text-uppercase" id="headerText">
                                        <img src="{{ asset('new-assets/img/icon/AGENDA TITULO.png') }}" height="30" alt="">
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

                                        {!!Form::model($departamento, ['route' => ['agendaAcudiente.update',$departamento], 'method' => 'PUT','files' => true, 'enctype'=>'multipart/form-data'])!!}
                                        <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-12">
                                                        <div class="form-group form-md-line-input">
                                                            <label>Tipo de Agenda</label>
                                                                <select class="form-control" name="FK_agendaId" id="" required="">
                                                                    @foreach($agenda as $agen)
                                                                        <option value="{{$agen->PK_id}}">{{$agen->tipo_agenda}}</option>
                                                                    @endforeach
                                                                </select>                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                    {{link_to_route('agendaAcudiente.index', $title = 'Cancelar', $parameter = [''], $attributes = ['class' => 'btn btn-danger btn-warning'])}}
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



