<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ config( 'app.name' ) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    @include('material.partials.new-head')

</head>

<body>
    @include('material.partials.new-header')
    
    {{-- Links --}}
    @yield('links')
    <!--Content-->
    <main>
    @yield('content')
    </main>


    @include('material.partials.new-dash-scripts')
    {{-- END SCRIPTS --}}
    {{-- BEGIN CUSTOM FUNCTIONS --}}
        
    @stack('functions')

    {{-- END CUSTOM FUNCTIONS --}}

</body>

</html>