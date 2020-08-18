@extends('layouts.admin.layout')

@section('own-styles')
<style>
  .ellipsis {
    width: 300px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
</style>
@endsection

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
            <span class="bg-primary">{{ $dateInit }}</span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <div>
            <i class="fas fa-user bg-info"></i>
            <div class="timeline-item">
              <h3 class="timeline-header">Datos Personales</h3>

              <div class="timeline-body">
                <div class="row container-fluid">
                  @foreach ($dataHealthCondition as $dataCondition)
                  @if ($dataCondition->choice)
                  <div class="form-group col-4 mw-100">
                    <label for="name" class="ellipsis">{{$dataCondition->question->name}}</label>
                    <input class="form-control" type="text" value="{{$dataCondition->choice->name}}" disabled>
                  </div>
                  @else
                  <div class="form-group col-4 mw-100">
                    <label for="name" class="ellipsis">{{$dataCondition->question->name}}</label>
                    <input class="form-control" type="text" value="{{$dataCondition->text}}" disabled>
                  </div>
                  @endif
                  @endforeach
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
          @foreach ($observations as $key => $observation)
          @if($observation->level_id == 1)
          @php
          $bg = "bg-danger"
          @endphp
          @elseif($observation->level_id == 2)
          @php
          $bg = "bg-warning"
          @endphp
          @else
          @php
          $bg = "bg-success"
          @endphp
          @endif
          <div class="time-label">
            <span class="{{$bg}}">{{ \Carbon\Carbon::parse($observation->created_at)->format('d/m/Y')}}</span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <div>
            <i class="fa fa-envelope {{$bg}}""></i>
            <div class=" timeline-item">
              <h3 class="timeline-header">Seguimiento numero {{++$key}}</h3>
              <div class="timeline-body">
                <p>{{ $observation->observation }}</p>
                <div>
                  <span>Se realizo llamada : {{ $observation->call }}</span>
                  <br>
                  <span>Se envió Correo : {{ $observation->email }}</span>
                </div>
              </div>
          </div>
        </div>
        @endforeach

        <!-- END timeline item -->
        <!-- timeline item -->
        <div>
          <i class="fa fa-plus bg-primary"></i>
          <div class="timeline-item">
            <h3 class="timeline-header">Crear Seguimiento</h3>
            <div class="timeline-body">
              <form action="{{route('cases_follow_user.store')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$surveyed->id}}">
                <div class="row">

                  <div class="form-group col-12">
                    <label class="form-check-label" for="inlineRadio1">Observación General</label>
                    <textarea name="observation" id="" cols="10" rows="3"
                      class="w-100 form-control @error('observation') is-invalid @enderror"></textarea>
                    @error('observation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <div class="row">

                  <div class="form-group col-3">
                    <label class="form-check-label" for="inlineRadio1">Se realizo llamada</label>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input @error('call') is-invalid @enderror" type="radio" name="call"
                        value="Si">
                      <label class="form-check-label" for="call">Si</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input @error('call') is-invalid @enderror" type="radio" name="call"
                        value="No">
                      <label class="form-check-label" for="call">No</label>
                    </div>
                  </div>

                  <div class="form-group col-3">
                    <label class="form-check-label" for="inlineRadio1">Se envió correo</label>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input @error('email') is-invalid @enderror" type="radio" name="email"
                        value="Si">
                      <label class="form-check-label" for="email">Si</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input @error('email') is-invalid @enderror" type="radio" name="email"
                        value="No">
                      <label class="form-check-label" for="email">No</label>
                    </div>
                  </div>

                  <div class="form-group col-6">
                    <label for="level_id" class="form-check-label">Nivel de riesgo</label>
                    <select name="level_id" class="form-control @error('level_id') is-invalid @enderror">
                      <option value="0">Seleccione...</option>
                      @foreach ($levels as $level)
                      <option value="{{$level->id}}">{{$level->name}}</option>
                      @endforeach
                    </select>
                    @error('level_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>


                <div class="form-group col-12 mb-0">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END timeline item -->
    </div>
  </div>
  <!-- /.col -->
  </div>
  </div>
  <!-- /.timeline -->

</section>
@endsection