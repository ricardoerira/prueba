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
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active">Encuestas Publicas</li>
                @foreach ($headers as $key => $header)
                <li class="list-group-item">
                    <a href="{{ route('headers.info', $header->slug) }}">{{ ++$key }} - {{ $header->name }}</a>
                </li>
            @endforeach
              </ul>
        </div>
    </div>
</div>
@endsection