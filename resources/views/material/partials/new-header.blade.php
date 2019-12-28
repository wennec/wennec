<!-- Top LEFT -->
<section>
        <header>
            <nav class="rad-navigation">
                <div class="rad-logo-container rad-nav-min">
                    <a href="#" class="rad-logo"><i><img src="new-assets/img/logoWennecHorizontal.png" alt=""
                                style="width:60%;"></i></a>
                    <a href="#" class="rad-toggle-btn pull-right"><i class="fa fa-bars"></i></a>
                </div>
                <a href="#" class="rad-logo-hidden"><img src="new-assets/img/logoWennecHorizontal.png" alt=""
                        style="width:100%;"></a>
                <!--NAV TOP -->
                <div class="rad-top-nav-container">
                    <a href="" class="brand-icon"><i class="fa fa-recycle"></i></a>
                    <ul class="pull-right links">
                        <li class="rad-dropdown no-color">
                                    <?php 
                                        if((Auth::user()->foto) == ""){
                                        echo '<a class="rad-menu-item" href="#"><img class="rad-list-img sm-img"
                                        src="/assets/iconos/usuario3.png"
                                        alt="me" />' .Auth::user()->name. '</a>';
                                        }else{

                                        echo '<a class="rad-menu-item" href="#"><img class="rad-list-img sm-img"
                                        src="/Foto/Usuarios/'.Auth::user()->foto.'"
                                        alt="me" />' .Auth::user()->name. '</a>';
                                        }
                                    ?>
                            <ul class="rad-dropmenu-item sm-menu">
                                <li class="rad-notification-item">
                                    <a class="rad-notification-content lg-text" href="#"><i class="fa fa-edit"></i> Mi
                                        Perfil</a>
                                </li>
                                <form id="f_subir_imagen" name="f_subir_imagen" method="POST"  action="{{route('perfil.foto')}}" class="formarchivo" enctype="multipart/form-data">
                                                        
                                                            {{csrf_field()}}

                                                            @component('components.fileinput-photo-profile',[
                                                                'name'=>'foto',
                                                                'attributes'=>'required',
                                                                'url' => auth()->user()->foto,
                                                            ])
                                                            @endcomponent

                                                            <div class="margin-top-10">
                                                                <button type="submit" class="btn red left-block">
                                                                <i class="fa fa-refresh"></i>Actualizar foto
                                                                </button>
                                                            </div>

                                                        </form>
                                <li class="rad-notification-item">
                                    <a class="rad-notification-content lg-text" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        Salir</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                                                            </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><img src="new-assets/img/icon/top/cogwheel.png" width="24" height="24" alt=""></a>
                        </li>
                    </ul>
                    <ul class="pull-right links">
                        <li>
                            <a class="rad-menu-item" href="#"><img src="new-assets/img/icon/top/loupe.png" width="24" height="24"
                                    alt=""></a>
                        </li>

                        <li class="rad-dropdown"><a class="rad-menu-item" href="#"><i><img src="new-assets/img/icon/top/bell.png"
                                        width="24" height="24" alt=""><span class="rad-menu-badge"></span></i></a>
                            <ul class="rad-dropmenu-item">

                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left"><i class="fa fa-image"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Title 1</div>
                                            <div class="sm-text">example text</div>
                                            <small class="pull-right sm-text"><i class="fa fa-clock-o"></i> 2 sec
                                                ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left"><i class="fa fa-image"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Title 2</div>
                                            <div class="sm-text">example text</div>
                                            <small class="pull-right sm-text"><i class="fa fa-clock-o"></i> 4 sec
                                                ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left"><i class="fa fa-image"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Title 3</div>
                                            <div class="sm-text">example text</div>
                                            <small class="pull-right sm-text"><i class="fa fa-clock-o"></i> 4 sec
                                                ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer" style="margin-top: 1em;"><a href="#">Ver todos</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
    </section>