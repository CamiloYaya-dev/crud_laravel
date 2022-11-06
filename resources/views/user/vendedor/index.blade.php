@extends('layout/plantilla')

@section('tituloPagina', 'Vendedor')
@section('contenido')
<div class="card">
    <div class="card-header">
        {{ $user->rol }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="row-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                    </div>
                @endif
            </div>
        </div>
        <h5 class="card-title">LISTADO ARTICULOS</h5>
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('articles.create', $user->id) }}" method="GET">
                    <button class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i>
                        AGREGAR ARTICULO
                    </button>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{route('signOut')}}" class="btn btn-secondary">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    CERRAR SESION
                </a>
            </div>
        </div>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </thead>
                    <tbody>
                        @foreach ($Articles as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->price}}</td>
                                <td>
                                    <form action="{{ route('articles.edit', ['id_article' => $item->id, 'id_user' => $user->id]) }}" method="GET">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('articles.show', ['id_article' => $item->id, 'id_user' => $user->id]) }}" method="GET">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </p>
    </div>
</div>
@endsection