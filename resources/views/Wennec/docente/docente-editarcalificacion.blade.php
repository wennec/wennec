@extends('layouts.dash')

@section('content')
<link rel='stylesheet' href='//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css'>
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
                                        <img src="{{ asset('new-assets/img/icon/CALIFICACIONES COLOR MENU PLEGABLE.png') }}" height="30" alt="">
                                        <span> Calificaciones</span>
                                    </header>

                                    <br>

                                    {{--Inicio Mensaje Confirmar--}}
                                    @include('Wennec.alerts.success')
                                    @include('Wennec.alerts.error')
                                    @include('Wennec.alerts.errors')
                                    {{--Fin Mensaje Confirmar--}}
                                </section>
                            </div>

                            <div class="row" style="width: 100%;">
                                <div class="col-xs-4 formTrans" style="padding: .5em 1.5em 1.5em;
                                ">
                                    <aside style="text-align: center;position:relative; margin-top:1em;">
                                        <a href="#modalEditarEncuesta" style="position: absolute; right: 5px; top:2px;"><img src="img/icon/editGris.png" alt=""></a>
                                       <img src="{{ asset('new-assets/img/iconEncuestas.png') }}" alt="" style="width: 100%;">
                                    </aside>

                                    <aside class="text-left" style="border-top:.75px solid #E2E2E2;padding:.5em 0 0; border-bottom:.75px solid #E2E2E2;">
                                        <h3 style="font-size:1.52em;margin-bottom: 0px !important; line-height: 1;">Efrain Andres Vergara </h3>
                                        <p>Sociales</p>
                                    </aside>

                                </div>
                                <div class="col-xs-4" style="padding: .5em 1.5em 1.5em;width:55%;">
                                {!!Form::model($calificacionesEstudiante, ['route' => ['calificacion.update',$calificacionesEstudiante], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])!!}
                                        <div class="row">
                                        {!!Form::text('calificacion',null,['class'=>'form-control','placeholder'=>'Calificacion','required'])!!}
                                        <input type="hidden" name="FK_Logro" value="{{$calificacionesEstudiante->FK_Logro}}">
                                                    
                                        </div>
                                        <button class="btn btn-success"  type="submit" name="button"><a style="color:white;">Modificar</a></button>

                                        <button class="btn btn-danger"  type="button" name="button"><a style="color:white;" href="{{URL::previous()}}">Cancelar</a></button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>

<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous">
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script type="text/javascript">

    $(document).on("click", ".open-homeEvents", function () {
        var logro_id = $(this).data('logro-id');
        $('#FK_Logro').val( logro_id );

        var estudiante = $(this).data('estudiante-id');
        $('#FK_Estudiante').val( estudiante );
    });
</script>
@endsection

