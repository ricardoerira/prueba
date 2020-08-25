@extends('layouts.admin.layout')

@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/plugins-forms.css') }}">
@endsection

@section('content')
    <div class="mt-3">
        <div class="bg-primary mx-auto w-75">
            <h3 class="text-center p-3">{{$header->name}}</h3>
        </div>
        <form action="{{ route('surveys.done', $header->id) }}" role="form" method="POST">
            <input type="hidden" name="header_id" id="header_id" value="{{ $header->id }}">
            @csrf
            @foreach ($sections as $key => $section)
            <div class="card card-primary w-75 mx-auto">
                <div class="card-header w-100">
                    <h3 class="card-title">Session - {{ $section->pivot->priority }}</h3>
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
                    <div class="form-group question-{{$question->id}} @if($question->questionsDepended()->exists()) d-none depend @endif">
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

<!-- Conditional fields -->
@section('own-js')
    <script>
        if ( $("#depended").length > 0 ) {
        
            let header = $("#header_id").val();
            if (header == 1) {
                
                $('#radio_depended_160_0').change(() => {
                    $(".depend").each(function() {
                        $(this).addClass("d-none");
                        if ($(this).children("fieldset")){
                            $(this).children("fieldset").find("input").prop("required", false);
                        }else{
                            $(this).children("input").prop("required", false);
                        }
                    }).get();
                });
                $('#radio_depended_160_1').change(() => {
                    $(".depend").each(function() {
                        $(this).removeClass("d-none");
                        if ($(this).children("fieldset")){
                            $(this).children("fieldset").find("input").prop("required", true);
                        }else{
                            $(this).children("input").prop("required", true);
                        }
                    }).get();
                });
            }
        }
    </script>
@endsection