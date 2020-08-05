@extends('layouts.home.layout')

@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/plugins-forms.css') }}">
@endsection

@section('content')
    <div class="mt-3">
        <div class="bg-primary mx-auto w-75">
            <h3 class="text-center p-3">{{$header->name}}</h3>
        </div>
        <form action="{{ route('surveys.done', $header->id) }}" role="form" method="POST">
            @csrf
            @foreach ($sections as $key => $section)
            <div class="card card-primary w-75 mx-auto seccion-{{$section->pivot->priority}}">
                <div class="card-header w-100">
                    <h3 class="card-title">Sección - {{ $section->pivot->priority }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div>
                        <h5>{{$section->title}}</h5>
                        <span>
                            {{ $section->subheading }}
                        </span>
                    </div>
                    @foreach ($section->questions as $question)
                    <div class="form-group @if($question->questionsDepended()->exists()) d-none @endif">
                        @include('pages.home.includes.inputs.index')
                    </div>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            @endforeach
            <div class="w-75 mx-auto pb-4">
                <div>
                    <button type="submit" class="btn btn-primary m-auto">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('plugins-js')
    <script src="{{ asset('js/plugins-forms.js') }}"></script>
@endsection