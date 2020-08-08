@extends('layouts.home.layout')

@section('content')
<title>{{ $user->name }}</title>
<section class="content-header">
   
      <section class="content col-sm-11">
      
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ route('profile.update', $user) }}" method="POST" role="form">
                @csrf
                @method('PUT')
                <div class="content-wrapper" style="min-height: 1416.81px;">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-2">
                          <h1>Perfil</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Perfil de Usuario</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>
              
                  <!-- Main content -->
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-3">
              
                          <!-- Profile Image -->
                          <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/home/user.png') }}" alt="User profile picture">
                              </div>
              
                              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              
                              <p class="text-muted text-center">{{ implode(" ", $user->getRoleNames()->toArray() )}}</p>
              
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>Reporte Diario</b> <a class="float-right">{{ $repDiario }}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Trayectos Realizados</b> <a class="float-right">{{ $repTray }}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Seguimiento</b> <a class="float-right">{{ $repSeg }}</a>
                                </li>
                              </ul>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
              
                          
                          <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                          <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                               
                                <li class="nav-item"><a class="nav-link info" href="#settings" data-toggle="tab">Informacion</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane" id="activity">
                                  <!-- Post -->
                                  <div class="post">
              
                                    <form class="form-horizontal">
                                      <div class="input-group input-group-sm mb-0">
                                        <input class="form-control form-control-sm" placeholder="Response">
                                        <div class="input-group-append">
                                          <button type="submit" class="btn btn-danger">Send</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>

                                </div>
  
              
                           
                                  <form action="{{ route('profile.update', $user) }}" method="POST" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                      <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                      <div class="col-sm-10">
                                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Ingrese Nombre" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                      <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="Ingrese Correo" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                      <label for="inputSkills" class="col-sm-2 col-form-label">Documento</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="id" class="form-control" value="{{ $user->id }}" readonly>
                                      </div>
                                    </div>

                                      <div class=" d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                          <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Actualizar</font>
                                          </font>
                                        </button>
                                      </div>
                                    
                                  </form>
                              </div>  
                            </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  
@endsection