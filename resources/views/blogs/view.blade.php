@extends('layouts.main')


@section('title', $blog->title)

@section('content')

<section class="container py-5">
    <div class="mb-4 intro-productos">
        <p class="text-muted">
            <a href="{{ route('blogs.index') }}">Blog</a> > 
            <a href="{{ route('blogs.view', ['id' => $blog->blog_id]) }}">{{ $blog->title }} </a></p>
        <h2 class=" text-primary">Detalles de la Entrada</h2>
    </div>
    <article>
        <p class="text-muted mb-2"> {{$blog->category}}</p>
        <h3 class="h2 text-balance">{{ $blog->title }}</h3>
        @if ($blog->cover)
            <img src="{{ Storage::url($blog->cover) }}" alt="{{ $blog->cover_description }}" class="img-fluid" style="width: 300px; border-radius: 10px; font-size:14px; margin-bottom: 0.5rem">
        @else 
            <p class="text-muted">Sin portada</p>
        @endif
        <h4 class="text-muted">{{ $blog->description }}</h4>
        <p class="text-muted">{{ $blog->release_date }}</p>
        <hr class="mb-3">
        <h5>Contenido</h5>
        <p>{{ $blog->content }}</p>
        <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-4 d-block">Volver a Blog</a>

        <div class="mt-4">
            <h6 class="fw-bold">Acciones:</h6>

            @guest 

            <p class="text-danger">Debes iniciar sesión para editar y eliminar esta entrada.</p>

            @else
            @if(Auth::user()->role_id === 1)
            <a href="{{ route('blogs.edit.form',['id' => $blog->blog_id])}}" class="btn btn-primary btn-sm mt-2"><i class="fa-solid fa-pen-to-square" title="Editar"></i> Editar</a>

            <form action="{{ route('blogs.delete.process', ['id' => $blog->blog_id]) }}"
                method="post" class="mt-2">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('¿Está usted seguro que quiere borrar la entrada?')"
                type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Eliminar"></i> Eliminar</button>
            </form>
            @else
            <p class="text-danger">No tienes permisos suficientes para administrar el blog.</p>
            @endif
            @endguest

        </div>


    </article>
</section>

@endsection
