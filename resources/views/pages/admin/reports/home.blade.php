
@extends('layouts.admin.layout')
@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/plugins-forms.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    @if (session()->has('message'))
    <div id="toast-container" class="alert alert-default-warning" role="alert">
        <div class="toast-message">{{session('message')}}</div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                    </font>
                </h1>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary w-75 mx-auto">
                        <div class="card-header ">
                            <h3 class="card-title ">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Reporte estado de salud por dependencia / area</font>
                                </font>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('redirect.data') }}" method="POST" role="form">
                            @csrf 
                            <div class="card-body">
                                <div class="mx-aut">
                                    <div class="form-group col-7 mx-auto">
                                        <label for="survey">
                                            <font style="row align-items-center">
                                                <font style="vertical-align: inherit;">dependencia / area</font>
                                            </font>
                                        </label>
                                        <select name="choice" class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="0">TODAS</option>
                                            @foreach($choices as $choice)
                                                <option value = "{{$choice->id}}">{{$choice->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('survey')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Generar</font>
                                    </font>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</section>
@endsection

@section('plugins-js')
<script src="{{ asset('js/plugins-forms.js') }}"></script>
@endsection

@section('own-js')
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
  })

    setTimeout(function(){
      $('#toast-container').remove();
    }, 4000);

</script>
@endsection