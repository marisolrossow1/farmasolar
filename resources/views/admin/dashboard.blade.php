@extends('layouts.admin')

@section('title', 'Farmasolar - Dashboard')

@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Panel de control</span>
        <h1>Dashboard</h1>
    </div>
    <div class="user-info">
        <div class="info">
            <p>Hola, <strong>{{ auth()->user()->email }}</strong></p>
            <small class="text-muted">Administrador</small>
        </div>
        <div class="perfil-icon">
            <i class="fa-solid fa-circle-user" title="User ícono"></i>
        </div>
        
    </div>
</header>

<section class="main-info">
    <article class="info-bienvenida">
        <h2>Bienvenido</h2>
        <p>Bienvenido al panel de control de Farmasolar. <strong>Edita, agrega, elimina, y gestiona</strong> la base de datos de la tienda.</p>
        <img src="{{ asset('img/dashboard.svg') }}" alt="Ilustración de administración" class="img-fluid">
    </article>
    <article class="acciones-rapidas">
        <h2>Acciones Rápidas</h2>
        <p>Aquí tienes algunas acciones que puedes realizar de forma rápida desde el panel de control:</p>
        <ul class="list-group list-group-flush background-none">
            <li class="list-group-item"><a class="icon-link text-white" href="{{ route('blogs.list') }}">Ver listado de entradas<i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
            <li class="list-group-item"><a class="icon-link text-white" href="{{ route('users.list') }}">Ver listado de usuarios<i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
            <li class="list-group-item"><a class="icon-link text-white" href="{{ route('orders.list') }}">Ver listado de compras<i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
            <li class="list-group-item"><a class="icon-link text-white" href="{{ route('home') }}">Volver al home de Farmasolar<i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
            <li class="list-group-item"><a class="icon-link text-white" href="{{ route('sunscreens.index') }}">Volver a la tienda<i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
        </ul>
    </article>
</section>

<section class="contenedor-acciones">
    <div class="accion-info py-3">
        <div class="header-title">
            <span>Acciones rápidas</span>
            <h2>Entradas</h2>
        </div>
        <a href="{{ route('blogs.list') }}" class="btn btn-primary">Ver listado</a>
    </div>
    <div class="accion-info">
        <div class="header-title">
            <span>Acciones rápidas</span>
            <h2>Usuarios</h2>
        </div>
        <a href="{{ route('users.list') }}" class="btn btn-primary">Ver listado</a>
    </div>
    <div class="accion-info">
        <div class="header-title">
            <span>Acciones rápidas</span>
            <h2>Compras</h2>
        </div>
        <a href="{{ route('orders.list') }}" class="btn btn-primary">Ver listado</a>
    </div>
    <div class="accion-info">
        <div class="header-title">
            <span>Acciones rápidas</span>
            <h2>Tienda</h2>
        </div>
        <a href="{{ route('sunscreens.index') }}" class="btn btn-primary">Ir a la tienda</a>
    </div>
</section>

@endsection