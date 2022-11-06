@extends('layout/plantilla')

@section('tituloPagina', 'Comprador')
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
        <h5 class="card-title">ARTICULOS EN VENTA</h5>
        <div class="row">
            <div class="col-md-10">
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
                        <td>Comprar</td>
                    </thead>
                    <tbody>
                        @foreach ($Articles as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->price}}</td>
                                <td>
                                    @if ($item->buyed == true)
                                        COMPRADO
                                    @endif
                                    @if ($item->buyed == false)
                                    <form action="{{ route('users.buy', ['id_article' => $item->id, 'id_user' => $user->id]) }}" method="GET">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </form>
                                    @endif
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