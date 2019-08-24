@component('components.nav-link', [
    'icon' => 'fa fa-users',
    'title' => 'Usuarios',
    'link' => route('usuarios.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-school',
    'title' => 'Colegios',
    'link' => route('departamentos.index')
])
@endcomponent
