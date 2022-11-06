@extends('layout/plantilla')

@section("tituloPagina", "crear un nuevo registro");

@section("contenido")
<div class="card">
    <div class="card-header">
        Registrar usuario
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                    @error('name')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control"/>
                    @error('password_confirmation')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Rol</label>
                    <select class="form-control" id="type" name="rol_type">
                        <option value="">Seleccione el rol</option>
                        <option value="Comprador">Comprador</option>
                        <option value="Vendedor">Vendedor</option>
                    </select>
                    @error('rol_type')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <br>
                <a href="{{ route('login') }}" class="btn btn-light">
                    <i class="fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
                <button class="btn btn-success">
                    Registrarme
                </button>
            </form>
        </p>
    </div>
</div>
@endsection