@extends('layouts.admin.layout')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Seguimiento de {{ $surveyed->name }}</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
      <!-- Timelime example  -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-red">{{ $datePositive }}</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-user bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header">Datos Personales</h3>

                <div class="timeline-body">
                  <div class="row container-fluid">
                    <div class="form-group col-4">
                      <label for="name">Nombre</label>
                      <input class="form-control" type="text" value="{{ $surveyed->name }}" disabled>
                    </div>
                    <div class="form-group col-4">
                      <label for="name">Documento</label>
                      <input class="form-control" type="text" value="{{ $surveyed->id }}" disabled>
                    </div>
                    <div class="form-group col-4">
                      <label for="name">Correo</label>
                      <input class="form-control" type="text" value="{{ $surveyed->email }}" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-user bg-warning color-white"></i>
              <div class="timeline-item">
                <h3 class="timeline-header no-border">Contactos Cercanos</h3>
                <div class="timeline-body">
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-green">3 Jan. 2014</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fa fa-camera bg-purple"></i>
              <div class="timeline-item">
                <h3 class="timeline-header">uploaded new photos</h3>
                <div class="timeline-body">
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.timeline -->

  </section>
@endsection