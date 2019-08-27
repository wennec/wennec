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