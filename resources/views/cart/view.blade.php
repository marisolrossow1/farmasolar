@extends('layouts.main')

@section('title', 'Carrito')

@section('content')

<section class="container py-5 pb-5" id="SeccionCarrito">
    <h2 class="linea-debajo mb-5">Tu <span class="text-primary">Carrito</span></h2>
    @if($order)
    <!-- Formulario para actualizar cantidades -->
    <form action="{{ route('cart.update') }}" method="POST" class="row row-gap-3">
        @csrf
        <div class="table-section table-responsive col-lg-8">
            <table class="table table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="align-middle text-center">Datos del producto</th>
                        <th scope="col" class="align-middle text-center">Cantidad</th>
                        <th scope="col" class="align-middle text-center">Precio Unitario</th>
                        <th scope="col" class="align-middle text-center">Subtotal</th>
                        <th scope="col" class="align-middle text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $key => $product)
                    <tr>
                        <td class="text-break h6"><a class="btn btn-link p-0 text-start" href="{{ route('sunscreens.view', ['id' => $product['id']]) }}">{{ $product['title'] }}</a></td>
                        <td class="align-middle">
                            <input type="number" name="quantities[{{ $key }}]" value="{{ $product['quantity'] }}" class="form-control" min="1">
                        </td>
                        <td class="align-middle text-center text-muted">${{ number_format($product['price'], 2) }}</td>
                        <td class="align-middle text-center">${{ number_format($product['price'] * $product['quantity'], 2) }}</td>
                        <td class="align-middle text-center">
                            <a class="btn btn-sm btn-danger" href="{{ route('cart.remove', ['id' => $key]) }}"><i class="fa-solid fa-trash" title="Eliminar"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 container" id="resumen-carrito">
            <div class="container p-0" id="contenido-resumen-carrito">
                <div class="row align-items-start justify-content-between mb-5">
                    <h3 class="col-4 linea-debajo p-0 h4">Resumen</h3>
                    <div class="col text-end">
                        <button type="submit" class="btn btn-link p-0 text-end"><i class="fas fa-sync-alt me-2" title="Actualizar carrito"></i>Actualizar cantidades</button>
                        <a class="btn btn-link text-end text-danger p-0" href="{{ route('cart.empty') }}"><i class="fa-solid fa-trash me-2" title="Vaciar carrito"></i>Vaciar Carrito</a>
                    </div>
                </div>

                <div class="row border-top">
                    <p class="col px-3 py-1 m-0">Cantidad total de productos</p>
                    <p class="col px-3 py-1 text-end m-0">{{ $totalQuantity }}</p>
                </div>

                <div class="row border-top">
                    <p class="col p-3 fw-bold">TOTAL</p>
                    <p class="col p-3 text-end">${{ number_format($order->total, 2) }}</p>
                </div>
            </div>
    </form>

    <form action="{{ route('cart.checkout') }}" method="POST" class="row justify-content-end mt-4">
        @csrf
        <div class="col-sm-6">
            <a class="btn btn-link text-secondary link-without col text-start" href="{{ route('sunscreens.index') }}"><i class="fa-solid fa-left-long me-2" title="Seguir comprando"></i>
                Seguir comprando
            </a>
        </div>
        <div class="col-sm-6">
            <button class="btn btn-primary d-flex align-items-center justify-content-center w-100" type="submit">
                Finalizar compra
            </button>
        </div>
    </form>
    <div id="mercadopago-button"></div>

    {{-- Incluimos el SDK de JS de Mercado Pago --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // const mp = new MercadoPago('TEST-edce4b63-a9fe-4834-b4cb-93af46c4d0f5');
        // const mp = new MercadoPago('APP_USR-a285a08d-cf80-4a92-8e34-c8feee491040');
        // const mp = new MercadoPago('<?= env("MERCADOPAGO_PUBLIC_KEY");?>');
        const mp = new MercadoPago('<?= $mpPublicKey;?>');
        mp.bricks().create('wallet', 'mercadopago-button', {
            initialization: {
                // Noten que preferenceId debe ser un string.
                // El valor del id lo obtenemos del objeto Preference.
                preferenceId: '<?= $preference->id;?>',
            }
        });
    </script>
    </div>

    @else
    <p><strong>Tu carrito se encuentra vacío</strong>, te recomendamos explorar nuestro catálogo y obtener los mejores productos.</p>
    <a href="{{ route('sunscreens.index') }}" class="btn btn-primary mt-3">Seguir comprando</a>
    <img class="img-fluid d-block" src="{{ asset('img/carrito_dibujo.jpg') }}" alt="Hombre con carrito feliz">
    @endif
</section>

@endsection