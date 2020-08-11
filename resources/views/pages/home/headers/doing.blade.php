@extends('layouts.home.layout')

@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/plugins-forms.css') }}">
@endsection
<br>
<br>
<br>
@section('content')
<div class="mt-3">
    <div class="bg-primary mx-auto w-75">
        <h3 class="text-center p-3">{{$header->name}}</h3>
    </div>
    <form action="{{ route('surveys.done', $header->id) }}" role="form" method="POST">
        <input type="hidden" name="header_id" id="header_id" value="{{ $header->id }}">
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
                <div class="form-group @if($question->questionsDepended()->exists()) d-none depend @endif">
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

@section('own-js')
<script>
    if ( $("#depended").length > 0 ) {

        let header = $("#header_id").val();

        if (header == 2) {
            $('.seccion-18').addClass("d-none")

            $('#radio_depended_0').change(() => {
                $('.seccion-18').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
            });

            $('#radio_depended_1').change(() => {
                $('.seccion-18').addClass("d-none")
                $(".depend").each(function() {
                    $(this).addClass("d-none");
                }).get();
            });
        }

        if (header  == 3) {
            $('.seccion-2').addClass("d-none")
            $('.seccion-3').addClass("d-none")

            $('select#depended').on('change',function(){
                var valor = $(this).val();

                if (valor == 172) {
                    $(".depend").each(function() {
                        $(this).addClass("d-none");
                    }).get();
                    $('.seccion-2').addClass("d-none")
                    $('.seccion-3').addClass("d-none")
                }else{
                    $(".depend").each(function() {
                        $(this).removeClass("d-none");
                    }).get();
                    $('.seccion-2').removeClass("d-none")
                    $('.seccion-3').removeClass("d-none")
                }
            });
        }

        if (header == 6) {
            $('.seccion-4').addClass("d-none")
            $('.seccion-5').addClass("d-none")
            $('.seccion-6').addClass("d-none")
            $('.seccion-7').addClass("d-none")
            $('.seccion-8').addClass("d-none")
            $('.seccion-9').addClass("d-none")
            $('.seccion-10').addClass("d-none")
            $('.seccion-11').addClass("d-none")
            $('.seccion-12').addClass("d-none")
            $('.seccion-13').addClass("d-none")
            $('.seccion-14').addClass("d-none")
            $('.seccion-15').addClass("d-none")
            $('.seccion-16').addClass("d-none")
            $('.seccion-17').addClass("d-none")
            $('.seccion-18').addClass("d-none")
            $('.seccion-19').addClass("d-none")
            $('.seccion-20').addClass("d-none")
            $('.seccion-21').addClass("d-none")
            $('.seccion-22').addClass("d-none")
            $('.seccion-23').addClass("d-none")
            $('.seccion-24').addClass("d-none")

            $('#radio_depended_125_0').change(() => {
                $('.seccion-4').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
            });

            $('#radio_depended_125_1').change(() => {
                $('.seccion-4').addClass("d-none")
                $(".depend").each(function() {
                    $(this).addClass("d-none");
                }).get();
            });

            $('#radio_depended_126_0').change(() => {
                $('.seccion-5').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
            });
        }

    }
</script>
@endsection