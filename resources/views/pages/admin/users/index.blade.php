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
              <a href="#" class="btn btn-primary">Crear Usuario</a>
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
                            aria-sort="ascending"
                            aria-label="Motor de renderizado: actívelo para ordenar la columna descendente">
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
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Plataforma (s): activar para ordenar la columna ascendente">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Correo</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Versión del motor: activar para ordenar la columna ascendente">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Versión del motor</font>
                            </font>
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Grado CSS: activar para ordenar la columna ascendente">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Grado CSS</font>
                            </font>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr role="row" class="odd">
                          <td tabindex="0" class="sorting_1">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Geco</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Firefox 1.0</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Gana 98+ / OSX.2 +</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">1.7</font>
                            </font>
                          </td>
                          <td>
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">UNA</font>
                            </font>
                          </td>
                        </tr>
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