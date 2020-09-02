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
            <h3>Personas de alto riesgo en {{ $nameP }}</h3>
              <a href="{{ route('report.pdf', $name)}}" class="btn btn-primary">Exportar pdf</a>
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
                              <font style="vertical-align: inherit;">Cedula</font>
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
                              <font style="vertical-align: inherit;">Cargo</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Tipo de vinculacion</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Observacion</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Puede trabajar</font>
                            </font>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($dataP as $item) 
                        <tr role="row" class="odd">
                          <td tabindex="0" class="sorting_1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{$item['id']}}
                              </font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">
                                {{$item['name']}}
                              </font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{$item['cargo']}}</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{$item['vinculacion']}}</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{$item['observacion']}}</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{$item['trabaja']}}</font>
                            </font>
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