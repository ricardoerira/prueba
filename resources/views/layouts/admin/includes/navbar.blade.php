<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" id="icon-menu" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">5</font>
                    </font>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('images/admin/users/user.jpg') }}" alt="Avatar de usuario"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Brad Diesel
                                    </font>
                                </font><span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Llámame cuando puedas ...</font>
                                </font>
                            </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> hace 4 horas</font>
                                </font>
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('images/admin/users/user.jpg') }}" alt="Avatar de usuario"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        John Pierce
                                    </font>
                                </font><span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Recibí tu mensaje hermano</font>
                                </font>
                            </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> hace 4 horas</font>
                                </font>
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('images/admin/users/user.jpg') }}" alt="Avatar de usuario"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Silvestre Nora
                                    </font>
                                </font><span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">El tema va aqui</font>
                                </font>
                            </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> hace 4 horas</font>
                                </font>
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Ver todos los mensajes</font>
                    </font>
                </a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="navbar-badge">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            @if(count(auth()->user()->unreadNotifications) > 0 )
                                <span class="badge badge-warning">{{count(auth()->user()->unreadNotifications)}}</span>
                            @endif
                        </font>
                    </font>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{$notification->data['title']}}
                            </font>
                        </font><span class="pull-right text-muted text-sm">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{$notification->created_at->diffForHumans()}}</font>
                            </font>
                    </span>
                </a>
                @endforeach
               
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Ver todas las notificaciones</font>
                    </font>
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->