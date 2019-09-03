@component('components.nav-dropdown', ['icon' => 'fa fa-users', 'title' => 'Usuarios'])

    @component('components.nav-link', [
        'icon' => 'fa fa-user',
        'link' => route('usuariosC.index'),
        'title' => 'Usuarios'
    ])
    @endcomponent


    @component('components.nav-link', [
        'icon' => 'fas fa-user-edit',
        'title' => 'Estudiantes',
        'link' => route('adminStudent.index')
    ])
    @endcomponent
    @component('components.nav-link',[
        'icon' => 'fas fa-chalkboard-teacher',
        'title' => 'Docente',
        'link' => route('adminDocente.index')
    ])
    @endcomponent

@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-calendar-alt',
    'title' => 'Agenda General',
    'link' => route('eventoA.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-chart-line',
    'title' => 'Encuestas',
    'link' => route('encuestas.index')
])
@endcomponent
