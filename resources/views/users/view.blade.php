@extends('layouts.admin')


@section('title', 'Detalle del usuario')


@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de usuarios</span>
        <h1>Detalles de {{ $user->name }}</h1>
    </div>
    <div class="user-info">
        <a href="{{ route('users.list') }}" class="btn btn-primary">Volver a listado</a>
    </div>
</header>

<section class="main-admin">
    <article class="card-body">
        <h2 class="h6">Información</h2>
        <hr class="mt-0 mb-4">
        <div class="row pt-1">
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Nombre</h3>
                <p class="text-muted">{{ $user->name }}</p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">E-mail</h3>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Rol</h3>
                <p class="text-muted">{{ $user->role->type }}</p>

            </div>

            <div class="col-sm-6 col-xl-4 mb-3">
                <h3 class="h6">Cambiar Rol</h3>
                <form action="{{ route('users.update.role', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="role_id" class="form-select">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->type) }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Actualizar rol</button>
                </form>
            </div>

        </div>

        <h2 class="h6"><i class="fa-solid fa-circle-check text-success me-1" title="Completada"></i>Compras finalizadas</h2>
        <hr class="mt-0 mb-4">
        @php $finalizedOrders = $user->orders->where('status', 1); @endphp
        @if($finalizedOrders->isEmpty())
        <p class="text-muted">No tiene compras finalizadas.</p>
        @else
        @include('partials.orders_table', ['orders' => $finalizedOrders])
        @endif

        <h2 class="h6"><i class="fa-solid fa-circle-exclamation text-warning me-1" title="Pendiente"></i>Compras pendientes</h2>
        <hr class="mt-0 mb-4">
        @php $pendingOrders = $user->orders->where('status', 2); @endphp
        @if($pendingOrders->isEmpty())
        <p class="text-muted">No tiene compras pendientes.</p>
        @else
        @include('partials.orders_table', ['orders' => $pendingOrders])
        @endif

        <h2 class="h6"><i class="fa-solid fa-circle-xmark text-danger me-1" title="Rechazada"></i>Compras rechazadas</h2>
        <hr class="mt-0 mb-4">
        @php $rejectedOrders = $user->orders->where('status', 3); @endphp
        @if($rejectedOrders->isEmpty())
        <p class="text-muted">No tiene compras rechazadas.</p>
        @else
        @include('partials.orders_table', ['orders' => $rejectedOrders])
        @endif

        <h2 class="h6"><i class="fa-solid fa-clock text-info me-1" title="Abierta"></i>Compras abiertas</h2>
        <hr class="mt-0 mb-4">
        @php $openOrders = $user->orders->where('status', 0); @endphp
        @if($openOrders->isEmpty())
        <p class="text-muted">No tiene compras abiertas.</p>
        @else
        @include('partials.orders_table', ['orders' => $openOrders])
        @endif
    </article>
</section>


@endsection