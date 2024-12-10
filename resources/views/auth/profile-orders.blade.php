@extends('layouts.main')

@section('title', 'Compras')

@section('content')
<section class="padding-section" id="SeccionPerfil">
    <div class="row justify-content-center p-0 m-0">
        <div class="col-lg-8">
            <article class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4 col-xxl-2 text-center text-white gradient-custom">
                        <i class="fa-solid fa-circle-user icon-perfil-grande mb-4 mt-3"></i>
                        <h1 class="h5 mt-3">Compras de {{ $user->name }}</h1>
                        <a href="{{ route('profile') }}" class="btn btn-light btn-sm mb-5"><i class="fa-solid fa-arrow-left me-1"></i> Volver al perfil</a>
                    </div>
                    <div class="col-md-8 col-xxl-10">
                        <article class="card-body p-4">
                        <h2 class="h6"><i class="fa-solid fa-circle-check text-success me-1" title="Completada"></i>Compras finalizadas</h2>
                        <hr class="mt-0 mb-4">
                        @php $finalizedOrders = $user->orders->where('status', 1); @endphp
                        @if($finalizedOrders->isEmpty())
                            <p class="text-muted">No tiene compras finalizadas.</p>
                        @else
                            @include('partials.orders_table_profile', ['orders' => $finalizedOrders])
                        @endif

                        <h2 class="h6"><i class="fa-solid fa-circle-exclamation text-warning me-1" title="Pendiente"></i>Compras pendientes</h2>
                        <hr class="mt-0 mb-4">
                        @php $pendingOrders = $user->orders->where('status', 2); @endphp
                        @if($pendingOrders->isEmpty())
                            <p class="text-muted">No tiene compras pendientes.</p>
                        @else
                            @include('partials.orders_table_profile', ['orders' => $pendingOrders])
                        @endif

                        <h2 class="h6"><i class="fa-solid fa-circle-xmark text-danger me-1" title="Rechazada"></i>Compras rechazadas</h2>
                        <hr class="mt-0 mb-4">
                        @php $rejectedOrders = $user->orders->where('status', 3); @endphp
                        @if($rejectedOrders->isEmpty())
                            <p class="text-muted">No tiene compras rechazadas.</p>
                        @else
                            @include('partials.orders_table_profile', ['orders' => $rejectedOrders])
                        @endif

                        <h2 class="h6"><i class="fa-solid fa-clock text-info me-1" title="Abierta"></i>Compras abiertas</h2>
                        <hr class="mt-0 mb-4">
                        @php $openOrders = $user->orders->where('status', 0); @endphp
                        @if($openOrders->isEmpty())
                            <p class="text-muted">No tiene compras abiertas.</p>
                        @else
                            @include('partials.orders_table_profile', ['orders' => $openOrders])
                        @endif
                        </article>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
