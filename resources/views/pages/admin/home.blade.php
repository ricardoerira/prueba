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
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="row">
    @can('view_basic_statistics')
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
                  {{ $daySurveyCount }}
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
                <font style="vertical-align: inherit;">{{$casesCovid}}</font>
              </font>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    @endcan
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection