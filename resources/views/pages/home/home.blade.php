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

<div class="w-100">

    <div class="card">
        <div class="card-header">
            <h2>Encuestas</h2>
        </div>
        <div class="card-body row">
            @foreach ($headers as $key => $header)
                <span class="col-12">
                    <a href="#">{{ ++$key }} - {{ $header->survey_name }}</a>
                </span>
            @endforeach
        </div>
    </div>
</div>
@endsection