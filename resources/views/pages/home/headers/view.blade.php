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

    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active">Encuestas Publicas</li>
                @foreach ($sections as  $section)
                    @foreach ($section->questions()->get() as  $question )

                        <li class="list-group-item">
                            {{ $question->name }}
                            @if( $question->input_type->name== 'text')
                                <div class="input-field col s12">
                                    <input id="answer" type="text" name="{{ $question->id }}[answer]">

                                </div>
                            @else
                                @foreach($question->choices()->get() as $key => $choice)
                                    @if(  $question->input_type->name == 'radio')

                                        <p style="margin:0px; padding:0px;">
                                            <input name="{{ $question->id }}[answer]" type="radio" id="{{ $key }}"/>
                                            <label for="{{ $key }}">{{  $choice->name }}</label>
                                        </p>

                                    @endif
                                    @if(  $question->input_type->name == 'checkbox')
                                        <p style="margin:0px; padding:0px;">
                                            <input name="{{ $question->id }}[answer]" type="checkbox" id="{{ $key }}"/>
                                            <label for="{{ $key }}">{{  $choice->name }}</label>
                                        </p>
                                    @endif
                                        @if(  $question->input_type->name == 'combo')
                                            <p style="margin:0px; padding:0px;">
                                                <select name="select">
                                                    <option value="value1" id={{ $key }}>{{  $choice->name }}</option>
                                             </select>
                                            </p>
                                        @endif

                                @endforeach
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
@endsection
