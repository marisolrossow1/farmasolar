@extends('layouts.main')

@section('title', 'Perfil de Usuario')

@section('content')
<section class="container padding-section" id="SeccionPerfil">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4 text-center text-white gradient-custom">
                        <i class="fa-solid fa-circle-user icon-perfil-grande mb-4 mt-3"></i>
                        <h1 class="h5 mt-3">{{ $user->name }}</h1>
                        <p class="fst-italic">@ {{ $user->username ?? 'Usuario' }}</p>
                        <ul class="list-unstyled mb-5 d-flex flex-column gap-2">
                            <li><a href="{{ route('profile.edit.form') }}" class="btn btn-light btn-sm"><i class="fa-solid fa-pen-to-square me-1"></i>Editar</a></li>
                            <li><a href="{{ route('cart.view') }}" class="btn btn-light btn-sm"><i class="fa-solid fa-basket-shopping me-1"></i>Carrito</a></li>
                            @if(Auth::user()->role_id === 1)
                            <li><a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm"><i class="fa-solid fa-border-all me-1"></i>Administración</a></li>
                            @endif
                            <li>
                                <form action="{{ route('auth.logout.process') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm"><i class="fa-solid fa-right-from-bracket me-1"></i>Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <article class="card-body p-4">
                            <h2 class="h6">Información</h2>
                            <hr>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <h3 class="h6">Email</h3>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h3 class="h6">Rol</h3>
                                    <p class="text-muted">{{ $user->role->type }}</p>
                                </div>
                            </div>
                            <h2 class="h6">Compras</h2>
                            <hr>
                            @if($user->orders->isEmpty())
                                <p>No tienes compras registradas.</p>
                                <a href="{{ route('sunscreens.index') }}" class="btn btn-primary">Ir a la tienda</a>
                            @else
                                <p>Visualiza todas tus compras ({{$user->orders->count()}}).</p>
                                <a href="{{ route('profile.orders') }}" class="btn btn-primary">Ver mis compras</a>
                            @endif
                        </article>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
