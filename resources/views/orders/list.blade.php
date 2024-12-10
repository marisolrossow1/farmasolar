@extends('layouts.admin')

@section('title', 'Listado de compras')

@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de compras</span>
        <h1>Listado de todas las compras</h1>
    </div>
</header>

<section class="main-admin">
    <article class="card-body">
        @if($orders->isEmpty())
            <p class="text-danger">No hay órdenes registradas.</p>
        @else
        <div class="table-section table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th class="text-start">Usuario</th>
                        <th class="text-start">Productos</th>
                        <th>Cantidad total</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="align-middle text-center"> {{ $order->id }}</td>
                            <td class="align-middle text-start"> {{ $order->user->name }} </td>
                            <td>
                                @foreach($order->products as $product)
                                    {{ $product['title'] }} <em> x {{ $product['quantity'] }}</em><br>
                                @endforeach
                            </td>
                            <td class="align-middle text-center">
                                {{ array_sum(array_column($order->products, 'quantity')) }}
                            </td>
                            <td class="align-middle text-center">${{ number_format($order->total) }}</td>
                            <td class="align-middle text-center">{{ $order->date }}</td>
                            <td class="align-middle text-center">
                            @if($order->status == 1)
                                <i class="fa-solid fa-circle-check text-success fs-3" title="Completada"></i>
                            @elseif($order->status == 2)
                                <i class="fa-solid fa-circle-exclamation text-warning fs-3" title="Pendiente"></i>
                            @elseif($order->status == 3)
                                <i class="fa-solid fa-circle-xmark text-danger fs-3" title="Rechazada"></i>
                            @else
                                <i class="fa-solid fa-clock text-info fs-3" title="Abierta"></i>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <a href="{{ route('orders.view', ['id' => $order->id]) }}" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-up-right-from-square" title="Detalle"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
        @endif
    </article>
</section>

@endsection
