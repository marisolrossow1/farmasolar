@extends('layouts.admin')


@section('title', 'Usuarios')


@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de usuarios</span>
        <h1>Listado de Usuarios</h1>
    </div>
    <div class="user-info">
        <a href="{{ route('users.list') }}" class="btn btn-primary">Ver compras</a>
    </div>
</header>

<section class="main-admin">
    <div class="table-section table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="text-center">
                    <td>{{ $user->id }}</td>
                    <td class="text-balance"><a href="{{ route('users.view', ['id' => $user->id]) }}" class="btn-link">{{ $user->name }}</a>  </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->role->type }} </td>
                    <td class="text-muted">No disponible</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection