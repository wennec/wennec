@component('components.nav-dropdown', ['icon' => 'fa fa-users', 'title' => 'Usuarios'])

    @component('components.nav-link', [
        'icon' => 'fa fa-user',
        'link' => route('usuariosC.index'),
        'title' => 'Administradores'
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

    @component('components.nav-link', [
        'icon' => 'fa fa-user-plus',
        'title' => 'Acudiente',
        'link' => route('acudienteEstudiante.index')
    ])
    @endcomponent

@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-calendar-alt',
    'title' => 'Agenda General',
    'link' => route('eventoA.index')
])
@endcomponent

@component('components.nav-dropdown', ['icon' => 'fa fa-users', 'title' => 'Horarios'])
    @component('components.nav-link', [
        'icon' => 'fas fa-calendar-alt',
        'title' => 'Crear Horarios',
        'link' => route('horarios.index')
    ])
    @endcomponent
@endcomponent

@component('components.nav-dropdown', ['icon' => 'fa fa-comments', 'title' => 'Noticias'])

    @component('components.nav-link', [
        'icon' => 'fa fa-commenting-o',
        'link' => route('noticiasA.index'),
        'title' => 'Noticias'
    ])
    @endcomponent
    @component('components.nav-link', [
        'icon' => 'fa fa-comment-o',
        'title' => 'Nueva Noticia',
        'link' => route('noticiasA.create')
    ])
    @endcomponent
@endcomponent

@component('components.nav-link',[
    'icon' => 'fas fa-chalkboard-teacher',
    'title' => 'Evaluacion Docente',
    'link' => route('fechaevaluaciondocenteA.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'fas fa-vote-yea',
    'title' => 'Eleccion Estudiantil',
    'link' => route('eleccionEscolar.index')
])
@endcomponent

@component('components.nav-link', [
    'icon' => 'far fa-file-alt',
    'title' => 'PreMatricula',
    'link' => route('prematricula.index')
])
@endcomponent
