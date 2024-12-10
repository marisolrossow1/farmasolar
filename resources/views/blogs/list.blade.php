@extends('layouts.admin')


@section('title', 'Entradas')


@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de entradas</span>
        <h1>Listado de Entradas</h1>
    </div>
    <div class="user-info">
        <a href="{{ route('blogs.create.form') }}" class="btn btn-primary">Publicar entrada</a>
    </div>
</header>

<section class="main-admin">
    <div class="table-section table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Contenido</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->blog_id }}</td>
                    <td class="text-balance"><a href="{{ route('blogs.view', ['id' => $blog->blog_id]) }}" class="btn-link">{{ $blog->title }}</a>  </td>
                    <td class="text-break"> {{ $blog->category }} </td>
                    <td> {{ $blog->description }} </td>
                    <td> {{ $blog->content }} </td>
                    <td> {{ $blog->release_date }} </td>
                    <td> 
                        <a href="{{ route('blogs.edit.form',['id' => $blog->blog_id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square" title="Editar"></i></a>

                        <form action="{{ route('blogs.delete.process', ['id' => $blog->blog_id]) }}"
                            method="post" class="me-1 mt-2">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('¿Está usted seguro que quiere borrar la entrada?')"
                            type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Eliminar"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection