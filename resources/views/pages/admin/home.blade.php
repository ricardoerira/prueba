@extends('layouts.admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Administración</font>
          </font>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Hogar</font>
              </font>
            </a></li>
          <li class="breadcrumb-item active">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Página en blanco</font>
            </font>
          </li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                Encuestas Realizadas
              </font>
            </font>
          </span>
          <span class="info-box-number">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                10
              </font>
            </font>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1">
          <i class="fas fa-thumbs-up"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Casos Covid</font>
            </font>
          </span>
          <span class="info-box-number">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">41,410</font>
            </font>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1">
          <i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Activos</font>
            </font>
          </span>
          <span class="info-box-number">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">760</font>
            </font>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1">
          <i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Recuperados</font>
            </font>
          </span>
          <span class="info-box-number">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">2,000</font>
            </font>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection