<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME', 'Escuentas | Covid') }}</title>
  <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
  @yield('plugins-css')
  <link rel="stylesheet" href="{{ asset('css/stylus.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/styles.css') }}">
  @yield('own-styles')
</head>

<body style="min-height: 512.391px;" id="body">

  @auth
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">EC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">

            <a class="nav-link bg-primary img-circle px-2 py-1" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

              <span class="dropdown-item dropdown-header">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">{{ Auth::user()->name }}</font>
                </font>
              </span>

              <div class="dropdown-divider"></div>

            <a href="{{ route('home.profile') }}" class="dropdown-item">

                <i class="fas fa-users mr-2"></i>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Perfil</font>
                
                </font>

              </a>

              @can('view_admin')
              <div class="dropdown-divider"></div>

              <a href="{{ route('admin.index') }}" class="dropdown-item">

                <i class="fas fa-chart-line mr-2"></i>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Administración</font>
                </font>

              </a>
              @endcan

              <div class="dropdown-divider"></div>

              <a href="{{ route('logout') }}" class="dropdown-item">

                <i class="nav-icon fas fa-power-off"></i>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Cerrar Sesión</font>
                </font>

              </a>

            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @endauth

  @yield('content')

  <script src="{{ asset('js/plugins.js') }}"></script>
  @yield('plugins-js')
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('own-js')
</body>

</html>