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
    <form action="{{ route('surveys.edit', $header->id) }}" role="form" method="POST">
        <input type="hidden" name="header_id" id="header_id" value="{{ $header->id }}">
        @csrf
        @foreach ($sections as $key => $section)

        <div class="card card-primary w-75 mx-auto @if (sectionExist($section->id, $ant) == false) seccion-{{$section->pivot->priority}} @else {{$aux = $section->id}} @endif">
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
                <button type="submit" class="btn btn-primary m-auto">Actualizar</button>
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
            $('.seccion-19').addClass("d-none")
            $('#radio_depended_79_0').change(() => {
                $('.seccion-15').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
                $("#text_depended_80").prop("required", true)
                $("#radio_depended_81_0").prop("required", true)
                $("#radio_depended_81_1").prop("required", true)
                $("#radio_depended_81_2").prop("required", true)
                $("#radio_depended_82_0").prop("required", true)
                $("#radio_depended_82_1").prop("required", true)
                $("#radio_depended_82_2").prop("required", true)
                $("#radio_depended_82_3").prop("required", true)
            });

            $('#radio_depended_79_1').change(() => {
                $(".depend").each(function() {
                    $(this).addClass("d-none");
                }).get();
                $("#text_depended_80").prop("required", false)
                $("#radio_depended_81_0").prop("required", false)
                $("#radio_depended_81_1").prop("required", false)
                $("#radio_depended_81_2").prop("required", false)
                $("#radio_depended_82_0").prop("required", false)
                $("#radio_depended_82_1").prop("required", false)
                $("#radio_depended_82_2").prop("required", false)
                $("#radio_depended_82_3").prop("required", false)
            });

            $('#radio_depended_83_0').change(() => {
                $('.seccion-16').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
                $("#radio_depended_83_0").prop("required", true)
                $("#radio_depended_83_1").prop("required", true)
                $("#radio_depended_84_0").prop("required", true)
                $("#radio_depended_84_1").prop("required", true)
            });
            $('#radio_depended_83_1').change(() => {
                $(".depend").each(function() {
                    $(this).addClass("d-none");
                }).get();
                $("#radio_depended_83_0").prop("required", false)
                $("#radio_depended_83_1").prop("required", false)
                $("#radio_depended_84_0").prop("required", false)
                $("#radio_depended_84_1").prop("required", false)
            });

            $('#radio_depended_85_0').change(() => {
                $('.seccion-18').removeClass("d-none")
                $('.seccion-19').removeClass("d-none")
                $("#radio_depended_86_0").prop("required", true)
                $("#radio_depended_86_1").prop("required", true)
                $("#radio_depended_86_2").prop("required", true)
                $("#radio_depended_86_3").prop("required", true)
                $("#select_depended_87").prop("required", true)
                $("#radio_depended_88_0").prop("required", true)
                $("#radio_depended_88_1").prop("required", true)
                $("#radio_depended_88_2").prop("required", true)
                $("#radio_depended_89_0").prop("required", true)
                $("#radio_depended_89_1").prop("required", true)
                $("#radio_depended_89_2").prop("required", true)
                $("#radio_depended_89_3").prop("required", true)
                $("#radio_depended_90_0").prop("required", true)
                $("#radio_depended_90_1").prop("required", true)
                $("#radio_depended_90_2").prop("required", true)
                $("#radio_depended_90_3").prop("required", true)
                $("#radio_depended_90_4").prop("required", true)
                $("#radio_depended_90_5").prop("required", true)
                $("#radio_depended_91_0").prop("required", true)
                $("#radio_depended_91_1").prop("required", true)
                $("#radio_depended_91_2").prop("required", true)
                $("#radio_depended_91_3").prop("required", true)

            });
            $('#radio_depended_85_1').change(() => {
                $('.seccion-18').addClass("d-none")
                $('.seccion-19').addClass("d-none")
                $("#radio_depended_86_0").prop("required", false)
                $("#radio_depended_86_1").prop("required", false)
                $("#radio_depended_86_2").prop("required", false)
                $("#radio_depended_86_3").prop("required", false)
                $("#select_depended_87").prop("required", false)
                $("#radio_depended_88_0").prop("required", false)
                $("#radio_depended_88_1").prop("required", false)
                $("#radio_depended_88_2").prop("required", false)
                $("#radio_depended_89_0").prop("required", false)
                $("#radio_depended_89_1").prop("required", false)
                $("#radio_depended_89_2").prop("required", false)
                $("#radio_depended_89_3").prop("required", false)
                $("#radio_depended_90_0").prop("required", false)
                $("#radio_depended_90_1").prop("required", false)
                $("#radio_depended_90_2").prop("required", false)
                $("#radio_depended_90_3").prop("required", false)
                $("#radio_depended_90_4").prop("required", false)
                $("#radio_depended_90_5").prop("required", false)
                $("#radio_depended_91_0").prop("required", false)
                $("#radio_depended_91_1").prop("required", false)
                $("#radio_depended_91_2").prop("required", false)
                $("#radio_depended_91_3").prop("required", false)
            });

            $('#radio_depended_158_1').change(() => {
                $('.question-27').removeClass("d-none")
                $("#select_depended_27").prop("required", true)
            });
            $('#radio_depended_158_0').change(() => {
                $('.question-27').addClass("d-none")
                $("#select_depended_27").prop("required", false)
            });

            $('#radio_depended_23_0').change(() => {
                $('.question-159').removeClass("d-none")
                $("#select_depended_159").prop("required", true)
            });
            $('#radio_depended_23_1').change(() => {
                $('.question-159').addClass("d-none")
                $("#select_depended_159").prop("required", false)
            });

            $('#radio_depended_67_0').change(() => {
                $('.question-68').removeClass("d-none")
                $("#text_depended_68").prop("required", true)
            });
            $('#radio_depended_67_1').change(() => {
                $('.question-68').addClass("d-none")
                $("#text_depended_68").prop("required", false)
            });

            $('#radio_depended_69_0').change(() => {
                $('.question-70').removeClass("d-none")
                $("#text_depended_70").prop("required", true)
            });
            $('#radio_depended_69_1').change(() => {
                $('.question-70').addClass("d-none")
                $("#text_depended_70").prop("required", false)
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
            $('.seccion-27').addClass("d-none")
            $('.seccion-14').addClass("d-none")
            $('.seccion-28').addClass("d-none")
            $('.seccion-29').addClass("d-none")
            $('.seccion-17').addClass("d-none")
            $('.seccion-18').addClass("d-none")
            $('.seccion-20').addClass("d-none")
            $('.seccion-21').addClass("d-none")
            $('.seccion-22').addClass("d-none")
            $('.seccion-23').addClass("d-none")
            $('.seccion-24').addClass("d-none")
            $('.seccion-25').addClass("d-none")
            $('.seccion-26').addClass("d-none")

            $('#radio_depended_125_0').change(() => {
                $('.seccion-4').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
                $("#radio_depended_126_0").prop("required", true)
                $("#radio_depended_126_1").prop("required", true)
            });

            $('#radio_depended_125_1').change(() => {
                $("#radio_depended_126_0").prop("required", false)
                $("#radio_depended_126_1").prop("required", false)
                $('.seccion-4').addClass("d-none")
                $('.seccion-5').addClass("d-none")
                $('.seccion-6').addClass("d-none")
                $('.seccion-7').addClass("d-none")
                $('.seccion-8').addClass("d-none")
                $('.seccion-9').addClass("d-none")
                $('.seccion-10').addClass("d-none")
                $('.seccion-11').addClass("d-none")
                $('.seccion-12').addClass("d-none")
                $('.seccion-27').addClass("d-none")
                $('.seccion-14').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $('.seccion-17').addClass("d-none")
                $('.seccion-18').addClass("d-none")
                $('.seccion-20').addClass("d-none")
                $('.seccion-21').addClass("d-none")
                $('.seccion-22').addClass("d-none")
                $('.seccion-23').addClass("d-none")
                $('.seccion-24').addClass("d-none")
                $('.seccion-25').addClass("d-none")
                $('.seccion-26').addClass("d-none")

            });
            $('#radio_depended_126_0').change(() => {
                $('.seccion-6').removeClass("d-none")
                $("#radio_depended_128_0").prop("required", true)
                $("#radio_depended_128_1").prop("required", true)
                $('.seccion-5').addClass("d-none")
                $('.seccion-17').addClass("d-none")
                $('.seccion-23').addClass("d-none")
                $('.seccion-24').addClass("d-none")
                $('.seccion-26').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")

                $('#radio_depended_128_0').change(() => {
                    $('.seccion-7').removeClass("d-none")
                    $("#date_depended_129").prop("required", true)
                    $("#radio_depended_130_0").prop("required", true)
                    $("#radio_depended_130_1").prop("required", true)
                    $('.seccion-11').addClass("d-none")
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $('.seccion-22').addClass("d-none")
                    $('.seccion-27').addClass("d-none")
                });

                $('#radio_depended_128_1').change(() => {
                    $('.seccion-11').removeClass("d-none")
                    $("#radio_depended_134_0").prop("required", true)
                    $("#radio_depended_134_1").prop("required", true)
                    $("#date_depended_129").prop("required", false)
                    $("#radio_depended_130_0").prop("required", false)
                    $("#radio_depended_130_1").prop("required", false)
                    $('.seccion-7').addClass("d-none")
                    $('.seccion-8').addClass("d-none")
                    $('.seccion-9').addClass("d-none")
                    $('.seccion-10').addClass("d-none")
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                });
            });

            $('#radio_depended_126_1').change(() => {
                $("#radio_depended_127_0").prop("required", true)
                $("#radio_depended_127_1").prop("required", true)
                $("#radio_depended_128_0").prop("required", false)
                $("#radio_depended_128_1").prop("required", false)
                $('.seccion-5').removeClass("d-none")
                $('.seccion-6').addClass("d-none")
                $('.seccion-11').addClass("d-none")
                $('.seccion-7').addClass("d-none")
                $('.seccion-8').addClass("d-none")
                $('.seccion-9').addClass("d-none")
                $('.seccion-10').addClass("d-none")
                $('.seccion-20').addClass("d-none")
                $('.seccion-22').addClass("d-none")
                $('.seccion-26').addClass("d-none")
                $('.seccion-27').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $('#radio_depended_127_0').change(() => {
                    $('.seccion-17').removeClass("d-none")
                    $("#radio_depended_139_0").prop("required", true)
                    $("#radio_depended_139_1").prop("required", true)
                    $("#radio_depended_139_2").prop("required", true)
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $('.seccion-8').addClass("d-none")
                    $('#radio_depended_139_0').change(() => {
                        $('.seccion-23').addClass("d-none")
                        $('.seccion-22').addClass("d-none")
                        $('.seccion-26').addClass("d-none")
                        $('.seccion-24').addClass("d-none")
                        $('.seccion-28').addClass("d-none")
                        $('.seccion-29').addClass("d-none")
                        $('.seccion-18').removeClass("d-none")
                        $("#radio_depended_142_0").prop("required", true)
                        $("#radio_depended_142_1").prop("required", true)
                        $('#radio_depended_142_0').change(() => {
                            $("#date_depended_149").prop("required", true)
                            $("#radio_depended_151_0").prop("required", true)
                            $("#radio_depended_151_1").prop("required", true)
                            $('.seccion-20').removeClass("d-none")
                            $('.seccion-21').addClass("d-none")
                            $('.seccion-22').addClass("d-none")
                            $('.seccion-27').addClass("d-none")
                            $('.seccion-28').addClass("d-none")
                            $('.seccion-29').addClass("d-none")
                        });
                        $('#radio_depended_142_1').change(() => {
                            $('.seccion-20').addClass("d-none")
                            $('.seccion-27').addClass("d-none")
                            $('.seccion-28').addClass("d-none")
                            $('.seccion-29').addClass("d-none")
                            $('.seccion-21').removeClass("d-none")
                            $("#date_depended_149").prop("required", false)
                            $("#radio_depended_151_0").prop("required", false)
                            $("#radio_depended_151_1").prop("required", false)
                        });
                    });
                    $('#radio_depended_139_1').change(() => {
                        $('.seccion-20').addClass("d-none")
                        $('.seccion-21').addClass("d-none")
                        $('.seccion-22').addClass("d-none")
                        $('.seccion-27').addClass("d-none")
                        $('.seccion-28').addClass("d-none")
                        $('.seccion-29').addClass("d-none")
                        $('.seccion-18').addClass("d-none")
                        $('.seccion-26').addClass("d-none")
                        $('.seccion-23').removeClass("d-none")
                        $("#radio_depended_142_0").prop("required", true)
                        $("#radio_depended_142_1").prop("required", true)
                        $("#radio_depended_142_0").prop("required", false)
                        $("#radio_depended_142_1").prop("required", false)
                        $('#radio_depended_143_0').change(() => {
                            $('.seccion-28').addClass("d-none")
                            $('.seccion-29').addClass("d-none")
                            $('.seccion-25').addClass("d-none")
                            $('.seccion-24').removeClass("d-none")
                            $("#radio_depended_144_0").prop("required", true)
                            $("#radio_depended_144_1").prop("required", true)
                            $("#radio_depended_145_0").prop("required", true)
                            $("#radio_depended_145_1").prop("required", true)
                        });
                        $('#radio_depended_143_1').change(() => {
                            $('.seccion-24').addClass("d-none")
                            $('.seccion-25').removeClass("d-none")
                            $("#radio_depended_144_0").prop("required", false)
                            $("#radio_depended_144_1").prop("required", false)
                            $("#radio_depended_145_0").prop("required", false)
                            $("#radio_depended_145_1").prop("required", false)
                            $("#radio_depended_153_0").prop("required", true)
                            $("#radio_depended_153_1").prop("required", true)
                        });
                    });
                    $('#radio_depended_139_2').change(() => {
                        $('.seccion-18').addClass("d-none")
                        $('.seccion-23').addClass("d-none")
                        $('.seccion-24').addClass("d-none")
                        $('.seccion-28').addClass("d-none")
                        $('.seccion-29').addClass("d-none")
                        $('.seccion-20').addClass("d-none")
                        $('.seccion-26').removeClass("d-none")
                        $("#radio_depended_154_0").prop("required", true)
                        $("#radio_depended_154_1").prop("required", true)
                        $("#radio_depended_146_0").prop("required", true)
                        $("#radio_depended_146_1").prop("required", true)
                        $("#radio_depended_147_0").prop("required", true)
                        $("#radio_depended_147_1").prop("required", true)
                        $('#radio_depended_146_0').change(() => {
                            $('.seccion-28').removeClass("d-none")
                            $("#radio_depended_137_0").prop("required", true)
                            $("#radio_depended_137_1").prop("required", true)
                            $('#radio_depended_137_0').change(() => {
                                $('.seccion-29').removeClass("d-none")
                                $("#date_depended_138").prop("required", true)
                            });
                            $('#radio_depended_137_1').change(() => {
                                $('.seccion-29').addClass("d-none")
                                $("#date_depended_138").prop("required", false)
                            });
                        });
                        $('#radio_depended_146_1').change(() => {
                            $('.seccion-28').removeClass("d-none")
                            $("#radio_depended_137_0").prop("required", true)
                            $("#radio_depended_137_1").prop("required", true)
                            $('#radio_depended_137_0').change(() => {
                                $('.seccion-29').removeClass("d-none")
                            });
                            $('#radio_depended_137_1').change(() => {
                                $('.seccion-29').addClass("d-none")
                                $("#date_depended_138").prop("required", true)
                            });
                        });
                    });
                });
                $('#radio_depended_127_1').change(() => {
                    $("#radio_depended_137_0").prop("required", true)
                    $("#radio_depended_137_1").prop("required", true)
                    $("#radio_depended_139_0").prop("required", false)
                    $("#radio_depended_139_1").prop("required", false)
                    $("#radio_depended_139_2").prop("required", false)
                    $('.seccion-28').removeClass("d-none")
                    $('.seccion-17').addClass("d-none")
                    $('.seccion-8').addClass("d-none")
                    $('.seccion-9').addClass("d-none")
                    $('.seccion-18').addClass("d-none")
                    $('.seccion-20').addClass("d-none")
                    $('.seccion-21').addClass("d-none")
                    $('.seccion-22').addClass("d-none")
                    $('.seccion-23').addClass("d-none")
                    $('.seccion-24').addClass("d-none")
                    $('.seccion-26').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $('#radio_depended_137_0').change(() => {
                        $('.seccion-29').removeClass("d-none")
                        $("#date_depended_138").prop("required", true)
                    });
                    $('#radio_depended_137_1').change(() => {
                        $('.seccion-29').addClass("d-none")
                        $("#date_depended_138").prop("required", false)
                    });
                });
            });
            
            $('#radio_depended_130_0').change(() => {
                $('.seccion-8').removeClass("d-none")
                $("#radio_depended_131_0").prop("required", true)
                $("#radio_depended_131_1").prop("required", true)
                $('#radio_depended_131_0').change(() => {
                    $('.seccion-10').addClass("d-none")
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $('.seccion-9').removeClass("d-none")
                    $("#radio_depended_132_0").prop("required", true)
                    $("#radio_depended_132_1").prop("required", true)
                    $('#radio_depended_132_0').change(() => {
                        $('.seccion-28').removeClass("d-none")
                        $("#radio_depended_137_0").prop("required", true)
                        $("#radio_depended_137_1").prop("required", true)
                        $('#radio_depended_137_0').change(() => {
                            $('.seccion-29').removeClass("d-none")
                            $("#date_depended_138").prop("required", true)
                        });
                        $('#radio_depended_137_1').change(() => {
                            $('.seccion-29').addClass("d-none")
                            $("#date_depended_138").prop("required", false)
                        });
                    });
                });
                $('#radio_depended_131_1').change(() => {
                    $('.seccion-9').addClass("d-none")
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $('.seccion-22').addClass("d-none")
                    $('.seccion-27').addClass("d-none")
                    $('.seccion-10').removeClass("d-none")
                    $("#radio_depended_132_0").prop("required", false)
                    $("#radio_depended_132_1").prop("required", false)
                    $("#radio_depended_133_0").prop("required", true)
                    $("#radio_depended_133_1").prop("required", true)
                    $('#radio_depended_133_0').change(() => {
                        $('.seccion-28').removeClass("d-none")
                        $("#radio_depended_137_0").prop("required", true)
                        $("#radio_depended_137_1").prop("required", true)
                        $('#radio_depended_137_0').change(() => {
                            $('.seccion-29').removeClass("d-none")
                            $("#date_depended_138").prop("required", true)
                        });
                        $('#radio_depended_137_1').change(() => {
                            $('.seccion-29').addClass("d-none")
                            $("#date_depended_138").prop("required", false)
                        });
                    });


                });
            });
            $('#radio_depended_130_1').change(() => {
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $('.seccion-10').addClass("d-none")
                $('.seccion-8').addClass("d-none")
                $('.seccion-9').addClass("d-none")
                $("#radio_depended_131_0").prop("required", false)
                $("#radio_depended_131_1").prop("required", false)
            });

            $('#radio_depended_134_0').change(() => {
                $('.seccion-22').removeClass("d-none")
                $("#radio_depended_135_0").prop("required", true)
                $("#radio_depended_135_1").prop("required", true)
            });
            $('#radio_depended_134_1').change(() => {
                $('.seccion-27').addClass("d-none")
                $('.seccion-22').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_135_0").prop("required", false)
                $("#radio_depended_135_1").prop("required", false)
            });

            $('#radio_depended_137_0').change(() => {
                $('.seccion-29').removeClass("d-none")
                $(".depend").each(function() {
                    $(this).removeClass("d-none");
                }).get();
                $("#date_depended_138").prop("required", true)
            });
            $('#radio_depended_137_1').change(() => {
                $('.seccion-29').addClass("d-none")
                $("#date_depended_138").prop("required", false)
            });

            $('#radio_depended_135_0').change(() => {
                $('.seccion-27').removeClass("d-none")
                $('.seccion-14').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#date_depended_148").prop("required", true)
                $("#radio_depended_150_0").prop("required", true)
                $("#radio_depended_150_1").prop("required", true)
            });
            $('#radio_depended_135_1').change(() => {
                $('.seccion-28').removeClass("d-none")
                $('.seccion-27').addClass("d-none")
                $("#date_depended_148").prop("required", false)
                $("#radio_depended_150_0").prop("required", false)
                $("#radio_depended_150_1").prop("required", false)
                $("#radio_depended_137_0").prop("required", true)
                $("#radio_depended_137_1").prop("required", true)
                $('#radio_depended_137_0').change(() => {
                    $('.seccion-29').removeClass("d-none")
                    $("#date_depended_138").prop("required", true)
                });
                $('#radio_depended_137_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_138").prop("required", false)
                });
            });

            $('#radio_depended_152_0').change(() => {
                $('.seccion-29').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-22').removeClass("d-none")
                $("#radio_depended_135_0").prop("required", true)
                $("#radio_depended_135_1").prop("required", true)
                $('#radio_depended_135_0').change(() => {
                    $('.seccion-27').removeClass("d-none")
                    $('.seccion-14').addClass("d-none")
                    $('.seccion-28').addClass("d-none")
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_148").prop("required", true)
                    $("#radio_depended_150_0").prop("required", true)
                    $("#radio_depended_150_1").prop("required", true)
                });
                $('#radio_depended_135_1').change(() => {
                    $('.seccion-28').removeClass("d-none")
                    $('.seccion-27').addClass("d-none")
                    $("#date_depended_148").prop("required", false)
                    $("#radio_depended_150_0").prop("required", false)
                    $("#radio_depended_150_1").prop("required", false)
                    $("#radio_depended_137_0").prop("required", true)
                    $("#radio_depended_137_1").prop("required", true)
                    $('#radio_depended_137_0').change(() => {
                        $('.seccion-29').removeClass("d-none")
                        $("#date_depended_138").prop("required", true)
                    });
                    $('#radio_depended_137_1').change(() => {
                        $('.seccion-29').addClass("d-none")
                        $("#date_depended_138").prop("required", false)
                    });
                });

                $('#radio_depended_135_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#radio_depended_137_0").prop("required", false)
                    $("#radio_depended_137_1").prop("required", false)
                });
            });

            $('#radio_depended_152_1').change(() => {
                $('.seccion-22').addClass("d-none")
                $('.seccion-27').addClass("d-none")
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_135_0").prop("required", true)
                $("#radio_depended_135_1").prop("required", true)
            });

            $('#radio_depended_151_0').change(() => {
                $('.seccion-28').removeClass("d-none")
                $('#radio_depended_137_0').change(() => {
                    $('.seccion-29').removeClass("d-none")
                });
                $("#radio_depended_137_0").prop("required", true)
                $("#radio_depended_137_1").prop("required", true)
                $('#radio_depended_137_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_138").prop("required", false)
                });
            });

            $('#radio_depended_151_1').change(() => {
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_137_0").prop("required", false)
                $("#radio_depended_137_1").prop("required", false)
            });
            $('#radio_depended_150_0').change(() => {
                $('.seccion-28').removeClass("d-none")
                $('#radio_depended_137_0').change(() => {
                    $('.seccion-29').removeClass("d-none")
                });
                $("#radio_depended_137_0").prop("required", true)
                $("#radio_depended_137_1").prop("required", true)
                $('#radio_depended_137_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_138").prop("required", false)
                });
            });
            $('#radio_depended_150_1').change(() => {
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_137_0").prop("required", false)
                $("#radio_depended_137_1").prop("required", false)
            });

            $('#radio_depended_153_0').change(() => {
                $('.seccion-28').removeClass("d-none")
                $("#radio_depended_137_0").prop("required", true)
                $("#radio_depended_137_1").prop("required", true)
                $('#radio_depended_137_0').change(() => {
                    $('.seccion-29').removeClass("d-none")
                    $("#date_depended_138").prop("required", true)
                });
                $('#radio_depended_137_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_138").prop("required", false)
                });

            });
            $('#radio_depended_153_1').change(() => {
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_137_0").prop("required", false)
                $("#radio_depended_137_1").prop("required", false)
            });

            $('#radio_depended_145_0').change(() => {
                $('.seccion-28').removeClass("d-none")
                $("#radio_depended_137_0").prop("required", true)
                $("#radio_depended_137_1").prop("required", true)
                $('#radio_depended_137_0').change(() => {
                    $('.seccion-29').removeClass("d-none")
                    $("#date_depended_138").prop("required", true)
                });
                $('#radio_depended_137_1').change(() => {
                    $('.seccion-29').addClass("d-none")
                    $("#date_depended_138").prop("required", false)
                });
            });
            $('#radio_depended_145_1').change(() => {
                $('.seccion-28').addClass("d-none")
                $('.seccion-29').addClass("d-none")
                $("#radio_depended_137_0").prop("required", false)
                $("#radio_depended_137_1").prop("required", false)
                $("#date_depended_138").prop("required", false)
            });
        }
            
    }


</script>
@endsection