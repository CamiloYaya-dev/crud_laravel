@extends('layout/plantilla')

@section("tituloPagina", "Actualizar un articulo");

@section("contenido")
<div class="card">
    <div class="card-header">
        Comprar Articulo
    </div>
    <div class="card-body">
        @if (isset($discount))
            <div class="alert alert-success" role="alert">
                    Cupon Aplicado con exito!
            </div>
        @endif
        <p class="card-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Datos Articulo</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">Datos Usuario</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nombre Articulo</label>
                        <input type="text" name="name" class="form-control" value="{{ $article->name }}" readonly/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Usuario</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Precio Articulo</label>
                        <input type="text" name="name" class="form-control" value="{{ $article->name }}" readonly/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email Usuario</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->email }}" readonly/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @if (isset($discount))
                            @foreach ($discount as $item)
                                <label for="">Total</label>
                                <input type="number" name="name" class="form-control" value="{{ $article->price - $item->discount }}" readonly/>
                            @endforeach
                        @else
                            <label for="">Total</label>
                            <input type="number" name="name" class="form-control" value="{{ $article->price }}" readonly/>
                        @endif
                            
                       
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="{{ route('users.cupon', ['id_article' => $article->id, 'id_user' => $user->id]) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Cupon</label>
                            <input type="text" name="cupon" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">
                                <i class="fa-solid fa-pen"></i>
                                Aplicar cupon
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <form action="{{ route('users.buyed', ['id_article' => $article->id, 'id_user' => $user->id]) }}" method="POST">
                @csrf
                @method("PUT")
                <br>
                <a href="{{ route('showComprador', $user->id) }}" class="btn btn-light">
                    <i class="fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
                <button class="btn btn-success">
                    <i class="fa-solid fa-pen"></i>
                    Comprar
                </button>
            </form>
        </p>
    </div>
</div>
@endsection