@extends('layouts.admin.layout')

@section('plugins-css')
<link rel="stylesheet" href="{{ asset('css/admin/plugins-datatables.css') }}">
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
    @if (session()->has('message'))
      <div id="toast-container" class="alert alert-default-success" role="alert">
        <div class="toast-message">{{session('message')}}</div>
      </div>
    @endif
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h3>Datos de Formatos</h3>
              <a href="{{ route('survey.create') }}" class="btn btn-primary">Crear encuesta</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">#</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Acciones</font>
                            </font>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($surveys as $survey)
                        <tr role="row" class="odd">
                          <td tabindex="0" class="sorting_1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{ $survey->id }}
                              </font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{$survey->name}} - {{$survey->slug}}
                              </font>
                            </font>
                          </td>
                          <td class="d-flex aling-item-center">
                            <a href="{{ route('survey.edit', $survey->slug) }}" class="btn btn-primary mx-1">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                            <form action="{{ route('survey.delete', $survey->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-secondary mx-1">
                                <i class="fas @if($survey->hide == 0)fa-eye-slash @else fas fa-eye @endif"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
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
<script src="{{ asset('js/admin/plugins-datatables.js') }}"></script>
@endsection

@section('own-js')
<script src="{{ asset('js/admin/tables/users.js') }}">
</script>
<script>
setTimeout (function(){
    $('#toast-container').remove();
      }, 4000);
</script>
@endsection