{{-- 
    Link for sidebar
    link -> Ruta
    icon -> icono
    title -> Etiqueta a mostrar
--}}

<li class="nav-item">
    <a href="{{ $link }}" class="nav-link">
        <i class="{{ $icon }}"></i>
        <span class="mini-click-non">{{ $title }}</span>
    </a>
</li>