@extends('layouts.home.layout')

@section('own-styles')
    <style>
        .bg-survey{
            width: 100%;
            height: 45%;
            /* background: url(./images/home/survey.jpg) no-repeat center center fixed; */
            background-color: red;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
<div class="bg-survey">
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

                    <ul>
                        @foreach ($header->sections as $section)
                            <li>{{ $section->name }}</li>
                            <ul>
                                @foreach ($section->questions as $question)
                                    <li> {{ $question->name }} </li>
                                    <ul>
                                        @foreach ($question->choices as $choice)
                                            <li> {{ $choice->name }} </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                </span>
        </div>
    </div>
</div>
@endsection