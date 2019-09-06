@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Agenda General',
    'link' => route('eventoA.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Agenda Estudiante',
    'link' => route('agendaEstudiante.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-calendar-check-o',
    'title' => 'Horario',
    'link' => route('horarioE.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-check',
    'title' => 'Calificaciones',
    'link' => route('calificacionEstudiante.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-clock-o',
    'title' => 'Asistencia',
    'link' => route('asistenciaEstudiante.index')
])
@endcomponent