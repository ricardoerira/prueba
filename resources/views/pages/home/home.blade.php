<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Escuentas | Covid') }}</title>
    <link rel="stylesheet" href="{{ asset('css/stylus.css') }}">
</head>

<body class="login-page" style="min-height: 512.391px;">

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Encuestas</b>Covid</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>

                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (session('error_login'))
                    <div class="mb-3">
                        <span class="text-danger">
                            {{ session('error_login') }}
                        </span>
                    </div>
                    @endif
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Inicias Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>