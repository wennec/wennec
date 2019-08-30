@component('components.nav-link', [
    'icon' => 'fa fa-users',
    'title' => 'Usuarios',
    'link' => route('usuariosC.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-calendar-alt',
    'title' => 'Agenda General',
    'link' => route('eventoA.index')
])
@endcomponent

@component('components.nav-dropdown', ['icon' => 'fa fa-percent', 'title' => 'Porcentajes'])

    @component('components.nav-link', [
        'icon' => 'fa fa-pie-chart',
        'link' => route('eventoA.index'),
        'title' => 'Categorias'
    ])
    @endcomponent


    @component('components.nav-link', [
        'icon' => 'fa fa-database',
        'title' => 'Base de Datos',
        'link' => route('eventoA.index')
    ])
    @endcomponent
    @component('components.nav-link',[
        'icon' => 'fa fa-code',
        'title' => 'Codificación',
        'link' => route('eventoA.index')
    ])
    @endcomponent
    
@endcomponent