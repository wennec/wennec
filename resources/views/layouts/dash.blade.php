@extends('material.layouts.new-dashboard')

{{--
  Dash del usuario, los links cambian segun el rol del usuario
--}}
@php
  $rol = auth()->user()->rol->nombre;
@endphp

@section('links')
    @includeWhen($rol == 'Super Administrador', 'Wennec.super-admin.super-admin-new-dash')
    @includeWhen($rol == 'Administrador', 'Wennec.admin.administrador-new-dash')
    @includeWhen($rol == 'Estudiante', 'Wennec.estudiante.estudiante-new-dash')
    @includeWhen($rol == 'Acudiente', 'Wennec.acudiente.acudiente-new-dash')
    @includeWhen($rol == 'Docente', 'Wennec.docente.docente-new-dash')
@endsection
