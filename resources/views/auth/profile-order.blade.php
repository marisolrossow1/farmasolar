@extends('layouts.main')

@section('title', 'Detalle de compra')

@section('content')
<section class="padding-section" id="SeccionPerfil">
    <div class="row justify-content-center p-0 m-0">
        <div class="col-lg-8">
            <article class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4 col-xxl-2 text-center text-white gradient-custom">
                        <i class="fa-solid fa-circle-user icon-perfil-grande mb-4 mt-3"></i>
                        <h1 class="h5 mt-3">Detalle de compra</h1>
                        <ul class="list-unstyled mb-5 d-flex flex-column gap-2">
                            <li><a href="{{ route('profile.orders') }}" class="btn btn-light btn-sm"><i class="fa-solid fa-arrow-left me-1"></i> Volver a compras</a></li>
                            <li><a href="{{ route('profile') }}" class="btn btn-light btn-sm"><i class="fa-solid fa-arrow-left me-1"></i> Volver al perfil</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8 col-xxl-10">
                        <article class="card-body p-4">
                        <h2 class="h6">Información de la Compra</h2>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                            <div class="col-sm-6 col-xl-4 mb-3">
                                <h3 class="h6">ID de Compra</h3>
                                <p class="text-muted">{{ $order->id }}</p>
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
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
