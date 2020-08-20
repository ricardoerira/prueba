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
              <h3>Detalle notificaciones</h3>
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
                    <div class="card-body">

                        @if (auth()->user())
                        @forelse ($notifications as $notification)
                        <div class="alert alert-default-warning">
                          Nombre: {{ $notification->notifiable_id }}<br>
                          Documento: {{ $notification->notifiable_id }} <br>
                          Reporte: {{ $notification->data['title'] }}
                          <p>{{ $notification->created_at->diffForHumans() }}</p>
                          <button type="submit" class="mark-as-read btn btn-sm btn-dark" data-id="{{ $notification->id }}">Marcar como leido</button>
                        </div>
                        @if ($loop->last)
                          <a href="#" id="mark-all">Marcar todos como leidos</a>

                        @endif

                        @empty
                            No hay notificaciones
                        @endforelse
                        @endif
                      </div>
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

@section('scripts')
<script>
  function sendMarkRequest(id = null){
    return $.ajax("{{ route('markNotification') }}", {
      method: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        id
      }
    });
  }
  $(function(){
    $('.mark-as-read').click(function(){
      let request = sendMarkRequest($(this).data('id'));
      request.done(() => {
        $(this).parents('div.alert').remove();
      });
    });
    $('#mark-all').click(function(){
      let request = sendMarkRequest();
      request.done(() => {
        $('div.alert').remove();
      })
    });
  });
</script>
@endsection