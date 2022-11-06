@extends('layout/plantilla')

@section("tituloPagina", "Actualizar un articulo");

@section("contenido")
<div class="card">
    <div class="card-header">
        Actualizar Articulo
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $article->name }}"/>
                    @error('name')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Precio</label>
                    <input type="number" name="price" class="form-control" value="{{ $article->price }}"/>
                    @error('price')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <br>
                <a href="{{ route('showVendedor', $id_user) }}" class="btn btn-light">
                    <i class="fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
                <button class="btn btn-warning">
                    <i class="fa-solid fa-pen"></i>
                    Actualizar
                </button>
            </form>
        </p>
    </div>
</div>
@endsection