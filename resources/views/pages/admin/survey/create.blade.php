@extends('layouts.admin.layout')

@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/plugins-forms.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
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
                        <div class="card-header">
                            <h3 class="card-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Crear Encuesta</font>
                                </font>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('survey.create') }}" method="POST" role="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Nombre</font>
                                            </font>
                                        </label>
                                        <textarea name="name" id="" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="instructions">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Instrucciones</font>
                                            </font>
                                        </label>
                                        <textarea name="instructions" id="" cols="30" rows="2"
                                            class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="other_header_info">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Información Adicional</font>
                                            </font>
                                        </label>
                                        <textarea name="other_header_info" id="" cols="30" rows="2"
                                            class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Organización</font>
                                        </font>
                                    </label>
                                    <select name="organization_id" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="0">Seleccione...</option>
                                        @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Guardar</font>
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

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
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
</script>
@endsection