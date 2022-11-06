@extends('layout/plantilla')

@section("tituloPagina", "Crear un articulo");

@section("contenido")
<div class="card">
    <div class="card-header">
        Agregar Articulo
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('articles.store', $id)}}" method="POST">
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
                    <label for="">Precio</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}"/>
                    @error('price')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <br>
                <a href="{{ route('showVendedor', $id) }}" class="btn btn-light">
                    <i class="fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
                <button class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Agregar
                </button>
            </form>
        </p>
    </div>
</div>
@endsection