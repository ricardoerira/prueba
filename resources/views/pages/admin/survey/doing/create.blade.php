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
            <div class="card card-primary w-75 mx-auto seccion-{{$section->pivot->priority}}">
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
                $('.seccion-4').addClass("d-none");
                $('.question-161').addClass("d-none");
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

                $('#radio_depended_1_0').change(() => {
                    $('.question-161').removeClass("d-none");
                    document.getElementById ("select_depended_161") .options.length = 0
                    if($("#radio_depended_1_0").is(':checked')){
                        let data = {
                            area :  $("#radio_depended_1_0").val(),
                        }
                        $.ajax({
                            url: "{{ route ('capacity.check')}}",
                            data: data,
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            dataType: "json",
                            method: "POST",
                            success: function(result)
                            {
                                if (result)
                                {
                                    for (var key in result) {
                                        document.getElementById("select_depended_161").innerHTML += "<option value='"+key+"'>"+result[key]+"</option>";
                                    }
                                }
                            },
                        })
                    }
                });
                $('#radio_depended_1_1').change(() => {
                    $('.question-161').removeClass("d-none");
                    document.getElementById ("select_depended_161") .options.length = 0
                    if($("#radio_depended_1_1").is(':checked')){
                        let data = {
                            area :  $("#radio_depended_1_1").val(),
                        }
                        $.ajax({
                            url: "{{ route ('capacity.check')}}",
                            data: data,
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            dataType: "json",
                            method: "POST",
                            success: function(result)
                            {
                                if (result)
                                {
                                    for (var key in result) {
                                        document.getElementById("select_depended_161").innerHTML += "<option value='"+key+"'>"+result[key]+"</option>";
                                    }
                                }
                            },
                        })
                    }
                });
                $('#select_depended_161').change(() => {
                    let data = {
                            area :  $("#select_depended_161").val(),
                        }
                        $.ajax({
                            url: "{{ route ('capacity.controls')}}",
                            data: data,
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            dataType: "json",
                            method: "POST",
                            success: function(result)
                            {
                                if(result ==  true){
                                }else{
                                    alert("El area destino tiene su maximo aforo permitido");
                                }
                            },
                        })
                });

            }

            if (header == 5) {
                $('.question-10').addClass("d-none");
                $('.question-11').addClass("d-none");
                $('.question-12').addClass("d-none");
                $('.question-14').addClass("d-none");
                $('.question-161').addClass("d-none");
                $("#radio_depended_10_0").prop("required", false);
                $("#radio_depended_10_1").prop("required", false);
                $("#radio_depended_11_0").prop("required", false);
                $("#radio_depended_11_1").prop("required", false);
                $("#radio_depended_12_0").prop("required", false);
                $("#radio_depended_12_1").prop("required", false);
                $("#radio_depended_14_0").prop("required", false);
                $("#radio_depended_14_1").prop("required", false);
                $('#radio_depended_1_0').change(() => {
                    $('.question-161').removeClass("d-none");
                    document.getElementById ("select_depended_161") .options.length = 0
                    if($("#radio_depended_1_0").is(':checked')){
                        let data = {
                            area :  $("#radio_depended_1_0").val(),
                        }
                        $.ajax({
                            url: "{{ route ('capacity.check')}}",
                            data: data,
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            dataType: "json",
                            method: "POST",
                            success: function(result)
                            {
                                if (result)
                                {
                                    for (var key in result) {
                                        document.getElementById("select_depended_161").innerHTML += "<option value='"+key+"'>"+result[key]+"</option>";
                                    }
                                }
                            },
                        })
                    }
                });
                $('#radio_depended_1_1').change(() => {
                    $('.question-161').removeClass("d-none");
                    document.getElementById ("select_depended_161") .options.length = 0
                    if($("#radio_depended_1_1").is(':checked')){
                        let data = {
                            area :  $("#radio_depended_1_1").val(),
                        }
                        $.ajax({
                            url: "{{ route ('capacity.check')}}",
                            data: data,
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            dataType: "json",
                            method: "POST",
                            success: function(result)
                            {
                                if (result)
                                {
                                    for (var key in result) {
                                        document.getElementById("select_depended_161").innerHTML += "<option value='"+key+"'>"+result[key]+"</option>";
                                    }
                                    
                                }
                            },
                        })
                    }
                });
            }
        }

               
    </script>
@endsection