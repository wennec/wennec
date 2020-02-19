@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Comúnicados',
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
@component('components.nav-link', [
    'icon' => 'fa fa-comments',
    'title' => 'Evaluación Docente',
    'link' => route('evaluacionDocenteE.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-vote-yea',
    'title' => 'Gobierno Escolar',
    'link' => route('eleccionEstudiante.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fa fa-address-book-o',
    'title' => 'Observaciones',
    'link' => route('observacionEstudiante.index')
])
@endcomponent


<li class="nav-item">
    <a href="https://wennec.com/wennecaulas/" target="_blank" class="nav-link">
        <i class="fa fa-window-restore"></i>
        <span class="mini-click-non">Aula Virtual</span>
    </a>
</li>
