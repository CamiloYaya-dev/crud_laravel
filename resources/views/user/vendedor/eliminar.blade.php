@extends('layout/plantilla')

@section("tituloPagina", "Eliminar un articulo");

@section("contenido")
<div class="card">
    <div class="card-header">
        Eliminar un articulo
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                ¿Estas seguro de eliminar este articulo?
            </div>
            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Precio</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->price }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('showVendedor', $id_user) }}" class="btn btn-light">
                    <i class="fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
                <button class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    Eliminar
                </button>
            </form>
        </p>
    </div>
</div>
@endsection