@extends('layouts.home.layout')

@section('content')
<header class="header__home">
    <h1 class="header__home_title">Encuestas IDPAC</h1>
</header>

<div class="container mt-5">
    <div class="card">
        <div>
            <h3>Encuestas</h3>

        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                @foreach ($headers as $header)
                    <div class="col-lg-3 col-6">
                        <div
                            class="small-box

                            @if (($header->id == 2 && $formIni > 0) || ($header->id == 3 && !$header->surveys()->exists()))
                                bg-info
                            @else
                                bg-danger
                            @endif
                            "
                        >

                            <div class="inner">
                                <p>{{ $header->name }}</p>
                            </div>

                            @if (!(($header->id == 2 && $formIni > 0) || ($header->id == 3 && !$header->surveys()->exists())))
                                <a
                                    href="{{ route('surveys.info', $header->slug) }}" class="small-box-footer"
                                >
                                    Realizar
                                    <i class="fas fa-arrow-circle-right ml-1"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection