@extends('layouts.home.layout')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">Cambia tu contraseña</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña Nueva">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña">
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
                        <button type="submit" class="btn btn-primary w-100">Cambiar Contraseña</button>
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
@endsection

@section('own-js')
<script>
    $(function(){
        const $body = $('#body');
        $body.addClass('login-page');
    });
</script>
@endsection