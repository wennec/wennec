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
    @includeWhen($rol == 'Ayudante', 'Wennec.ayudante.ayudante-dash')
    @includeWhen($rol == 'Jefe de Dependencia', 'Wennec.empleado.empleado-dash')
@endsection
