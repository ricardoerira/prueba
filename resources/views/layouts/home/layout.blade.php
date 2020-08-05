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
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('logout') }}">
              Cerrar Sesión
            </a>
          </li>
          @can('edit articles')
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.index') }}">
              Administración
            </a>
          </li>
          @endcan
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