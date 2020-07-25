<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME', 'Escuentas | Covid') }}</title>
  <link rel="stylesheet" href="{{ asset('css/stylus.css') }}">
</head>

<body>
  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.admin.includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1589.56px;">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.admin.includes.footer')
    <!-- /.Footer -->

    <div id="sidebar-overlay"></div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>