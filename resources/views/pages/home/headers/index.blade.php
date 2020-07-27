@extends('layouts.home.layout')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">EC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">
                        Administración
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="w-100 mx-auto">
    <h1>Bienvenidos</h1>
</div>

<div class="">

    <div class="card">
        <div class="card-header">
            <h2>Encuestas</h2>
        </div>
        <div class="card-body">
                <span>
                    <a href="{{ route('headers.info', 1) }}">
                        {{ $header->survey_name }}</a>
                    <br>
                    <p>
                        {{ $header->instructions }}
                    </p>
                    <br>
                    <p>
                        {{ $header->other_header_info }}
                    </p>
                </span>
        </div>
    </div>
</div>
@endsection