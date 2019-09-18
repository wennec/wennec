@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Agenda General',
    'link' => route('eventoA.index')
])
@endcomponent
@component('components.nav-link', [
    'icon' => 'fa fa-book',
    'title' => 'Calificaciones',
    'link' => route('calificacionDocente.index')
])
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
