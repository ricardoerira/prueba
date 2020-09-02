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
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h3>Datos de usuariós</h3>
              <div>
              <a href="{{ route ('positives.excel') }}" class="btn btn-primary">Exportar positivos excel</a>
              </div>
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
                          <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">#</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Navegador: active para ordenar la columna ascendente">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Correo</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Resultado</font>
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
                        @foreach ($cases as $case)
                        <tr role="row" class="odd">
                          <td tabindex="0" class="sorting_1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{ $case->id }}
                              </font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{$case->survey->surveyed->name}}
                              </font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{$case->survey->surveyed->email}}</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{$case->choice->name}}
                              </font>
                            </font>
                          </td>
                          <td class="d-flex aling-item-center">
                            <a href="{{ route('cases_follow_user.index', $case->survey->id) }}" class="btn btn-primary mx-1">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
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
<script src="{{ asset('js/admin/tables/users.js') }}"></script>
@endsection