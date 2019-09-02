@extends('material.layouts.dashboard')

{{--
  Dash del usuario, los links cambian segun el rol del usuario
--}}
@php
  $rol = auth()->user()->rol->nombre;
@endphp

@section('links')
    @includeWhen($rol == 'Super Administrador', 'Wennec.super-admin.super-admin-dash')
    @includeWhen($rol == 'Administrador', 'Wennec.admin.administrador-dash')
    @includeWhen($rol == 'Estudiante', 'Wennec.estudiante.estudiante-dash')
    @includeWhen($rol == 'Acudiente', 'Wennec.acudiente.acudiente-dash')
@endsection
