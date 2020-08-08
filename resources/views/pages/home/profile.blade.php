@extends('layouts.home.layout')

@section('content')
<title>{{ $user->name }}</title>
<section class="content-header">
   
      <section class="content">
        <div class="row">
          <div class="col-9 mx-auto">
            <div class="card card-primary w-75 mx-auto">
              <div class="card-header">
                <h3 class="card-title">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Perfil Usuario</font>
                  </font>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ route('profile.update', $user) }}" method="POST" role="form">
                @csrf
                @method('PUT')
                <div class="container row">
                    <img src="{{ asset('images/home/user.png') }}" alt="Avatar de usuario"
                    class="img-size-70 img-circle mr-3">
                    <div class="card-body">
                    <div class="col">
                        

                        <div class="form-group col-9">
                        <label for="name">                             
                            <font style="vertical-align: inherit;">Nombre</font>
                        </label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Ingrese Nombre" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group col-9">
                        <label for="email">
                            <font style="vertical-align: inherit;">Correo</font>
                        </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="Ingrese Correo" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="email">
                                <font style="vertical-align: inherit;">Documento</font>
                            </label>
                            <input type="text" name="id" class="form-control" value="{{ $user->id }}" readonly>
                            </span>
                        </div>

                       
                    </div>
                   
                    
                    </div>
                    </div>
                <div>
                <!-- /.card-body -->
  
                <div class="card-footer d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Actualizar</font>
                    </font>
                  </button>
                </div>
              </form>
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