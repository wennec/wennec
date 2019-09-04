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
    'icon' => 'fa fa-bullhorn',
    'title' => 'Comunicados',
    'link' => route('agendaAcudiente.index')
])
@endcomponent
