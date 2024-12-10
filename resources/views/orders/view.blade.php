@extends('layouts.admin')

@section('title', 'Detalles de Compra')

@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de compras</span>
        <h1>Detalles de la Compra</h1>
    </div>
    <div class="user-info">
        <a href="{{ route('orders.list') }}" class="btn btn-primary">Volver a listado de compras</a>
    </div>
</header>

<section class="main-admin">
    <article class="card-body">
        <h2 class="h6">Información de la Compra</h2>
        <hr class="mt-0 mb-4">
        <div class="row pt-1">
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">ID de Compra</h3>
                <p class="text-muted">{{ $order->id }}</p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Usuario</h3>
                <p class="text-muted">{{ $order->user->name }} <a href="{{ route('users.view', ['id' => $order->user_id]) }}" class="btn  btn-link"><i class="fa-solid fa-up-right-from-square" title="Detalle"></i></a></p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Fecha</h3>
                <p class="text-muted">{{ $order->date }}</p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Estado</h3>
                <p class="text-muted">
                    @if($order->status == 1)
                        <span class="text-success">Completada</span>
                    @elseif($order->status == 2)
                        <span class="text-warning">Pendiente</span>
                    @elseif($order->status == 3)
                        <span class="text-danger">Rechazada</span>
                    @else
                        <span class="text-info">Abierta</span>
                    @endif
                </p>
            </div>
        </div>

        <h2 class="h6">Productos</h2>
        <hr class="mt-0 mb-4">
        <div class="table-section table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th class="text-start">Producto</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $key => $product)
                    <tr>
                        <td class="align-middle text-center">{{ $key + 1 }}</td>
                        <td class="align-middle text-start"><a class="btn btn-link p-0 text-start" href="{{ route('sunscreens.view', ['id' => $product['id']]) }}">{{ $product['title'] }}</a></td>
                        <td class="align-middle text-center">{{ $product['quantity'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="h6 mt-4">Totales</h2>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Cantidad Total</h3>
                <p class="text-muted">{{ array_sum(array_column($order->products, 'quantity')) }} productos</p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Monto Total</h3>
                <p class="text-muted">${{ number_format($order->total) }}</p>
            </div>
        </div>
    </article>
</section>

@endsection
