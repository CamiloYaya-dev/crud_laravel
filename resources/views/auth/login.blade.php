@extends('layout/plantilla')

@section("tituloPagina", "crear un nuevo registro");

@section("contenido")
<div class="card">
    <div class="card-header">
        Login
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action="" method="POST">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small>
                            {{ session('success') }}
                        </small>
                    </div>
                @endif
                @error('invalid_credentials')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Correo Electronico</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}"/>
                    @error('email')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control"/>
                    @error('password')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <br>
                <button class="btn btn-success">
                    Login
                </button>
                <div class="mt-3 text-center">
                    <a href="{{ route('register') }}">
                        Registrarme
                    </a>
                </div>
            </form>
        </p>
    </div>
</div>
@endsection