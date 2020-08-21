@extends('layouts.home.layout')

@section('own-styles')
<style>
    .bg-survey {
        width: 100%;
        height: 60vh;
        background: url('../../images/home/survey.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .bg-text-survey {
        background-color: rgba(131, 131, 131, 0.842);
        max-width: 60%;
    }
</style>
@endsection

@section('content')
<div class="bg-survey">
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="bg-text-survey">
            <h4 class="p-5 text-center text-white">{{ $header->name }}</h4>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-md-12">
            <div>
                <h2>Instrucciones</h2>
            </div>
            <span>
                <p>
                    {{ $header->instructions }}
                </p>
                <p>
                    {{ $header->other_header_info }}
                </p>

                <hr>
                <div>
                    <div>
                        <span>Duracion : 10 - 20 min</span>
                        <br>
                        <span>Secciones : {{ $sections_count }}</span>
                        <br>
                        {{-- <span>Preguntas : {{ $questions_count }}</span> --}}
                    </div>
                </div>

                <hr>

                <div>
                    <h6>Secciones</h6>

                    <ul>
                        @foreach ($sections as $key =>  $section)
                            <li>{{ ++$key }} - {{ $section->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </span>

            <a href="{{ route('surveys.running', $header->slug) }}" class="btn btn-primary">Diligenciar Formato</a>

        </div>
    </div>
</div>
@endsection
