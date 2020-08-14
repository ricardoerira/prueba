<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('images/admin/logo/logo-idpac.png') }}" alt="Logotipo de idpac"
            class="brand-image  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Home</font>
            </font>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/admin/users/user.jpg') }}" class="img-circle elevation-2"
                    alt="Imagen de usuario">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ Auth::user()->name }}</font>
                    </font>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ setActive(route('admin.index'), 'active') }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Administración
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @can('view_survey_vigilant')
                <li class="nav-item">
                    <a href="{{ route('survey.doing.index') }}" class="nav-link {{ setActive(route('survey.doing.index'), 'active') }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Control de vigilancia
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_users')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ setActive(route('users.index'), 'active') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Usuarios
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_organizations')
                <li class="nav-item">
                    <a href="{{ route('organizations.index') }}" class="nav-link {{ setActive(route('organizations.index'), 'active') }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Organizaciones
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_inputs')
                <li class="nav-item">
                    <a href="{{ route('inputs.index') }}" class="nav-link {{ setActive(route('inputs.index'), 'active') }}">
                        <i class="nav-icon fas fa-keyboard"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Inputs
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_surveys')
                <li class="nav-item">
                    <a href="{{ route('survey.index') }}" class="nav-link {{ setActive(route('survey.index'), 'active') }}">
                        <i class="nav-icon fas fa-keyboard"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Encuestas
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_gestion_permissions')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Gestión Permisos
                                </font>
                            </font><i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Roles</font>
                                    </font>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Permisos</font>
                                    </font>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Asignar Permisos</font>
                                    </font>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('view_follow_up')
                <li class="nav-item">
                    <a href="{{route('cases_follow.index', 'positive')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Seguimiento</font>
                            </font>
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Cerrar Sesión
                                </font>
                            </font>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>