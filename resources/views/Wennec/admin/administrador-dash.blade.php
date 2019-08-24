@component('components.nav-link', [
    'icon' => 'fa fa-object-group',
    'title' => 'Departamentos',
    'link' => route('admindepto.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fa fa-handshake-o',
    'title' => 'Plazos Temporales',
    'link' => route('admintempo.index')
])
@endcomponent