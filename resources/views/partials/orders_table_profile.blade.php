<div class="table-section table-responsive mb-4">

<table class="table table-striped table-hover table-sm">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th class="text-start">Productos</th>
            <th>Cantidad total</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="align-middle text-center">{{ $order->id }}</td>
                <td>
                    @foreach($order->products as $product)
                        {{ $product['title'] }} <em>x {{ $product['quantity'] }}</em><br>
                    @endforeach
                </td>
                <td class="align-middle text-center">
                    {{ array_sum(array_column($order->products, 'quantity')) }}
                </td>
                <td class="align-middle text-center">${{ number_format($order->total) }}</td>
                <td class="align-middle text-center">{{ $order->date }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('profile.order', ['id' => $order->id]) }}" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-up-right-from-square" title="Detalle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>