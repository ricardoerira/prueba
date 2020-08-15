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
                            @if ($formIni > 0)
                                @if ($header->id == 2 || ($fecha == now()->format('d/m/Y') && $header->id == 3))
                                    bg-info
                                @else
                                    bg-danger
                                @endif
                            @else
                                @if ($header->id == 2)
                                    bg-danger
                                @else
                                    bg-info
                                @endif
                            @endif
                            
                            "
                        >


                            <div class="inner">
                                <p>{{ $header->name }}</p>
                            </div>
                            @if ($formIni > 0)
                                @if (!($header->id == 2 || ($header->id == 3 && ($fecha == now()->format('d/m/Y')))))
                                        <a
                                        href="{{ route('surveys.info', $header->slug) }}" class="small-box-footer"
                                    >
                                        Realizar
                                        <i class="fas fa-arrow-circle-right ml-1"></i>
                                    </a>
                                @endif
                            @else
                                @if (($header->id == 2))
                                        <a
                                        href="{{ route('surveys.info', $header->slug) }}" class="small-box-footer"
                                    >
                                        Realizar
                                        <i class="fas fa-arrow-circle-right ml-1"></i>
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection