@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Agenda General',
    'link' => route('eventoEstudiante.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Agenda Acudiente',
    'link' => route('agendaAcudiente.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-check',
    'title' => 'Calificaciones',
    'link' => route('acudienteEstudianteCalificaciones.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-comments',
    'title' => 'Noticias',
    'link' => route('noticiasA.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-money',
    'title' => 'Pagos',
    'link' => route('pagosAcudiente.index')
])
@endcomponent
