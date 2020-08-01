@extends('layouts.home.layout')

@section('content')
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