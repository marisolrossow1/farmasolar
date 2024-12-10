@extends('layouts.admin')

@section('title', 'Editar la Entrada '.e($blog->title))

@section('content')

<header class="header-wrapper">
    <div class="header-title">
        <span>Administración de blogs</span>
        <h1>Editar Blog</h1>
    </div>
    <div class="user-info">
        <a href="{{ route('blogs.list') }}" class="btn btn-primary">Volver a listado</a>
    </div>
</header>

<section class="main-admin container-fluid py-4">
    <h2 class="h3">Editar "{{ $blog->title}}" </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hay errores en los datos del formulario. Por favor, revisalos y volvé a intentar.
        </div>
    @endif

    <form class="row gy-3 mt-3" action="{{ route('blogs.edit.process', ['id' => $blog->blog_id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="col-md-6">
            <label class="form-label text-muted" for="title">Título</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $blog->title)}}">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-muted" for="category">Categoría</label>
            <input class="form-control" type="text" name="category" id="category" value="{{ old('category', $blog->category)}}">
            @error('category')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label class="form-label text-muted" for="description">Descripción (corta)</label>
            <textarea class="form-control" name="description" rows="3" id="description">{{ old('description', $blog->description)}}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-muted" for="category">Fecha de Publicación</label>
            <input
                type="date"
                class="form-control"
                id="release_date"
                name="release_date"
                value="{{ old('release_date', $blog->release_date) }}"
            >
            @error('release_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label text-muted" for="cover">Portada actual</label>
            @if ($blog->cover)
            <img src="{{ Storage::url($blog->cover) }}" alt="{{ $blog->cover_description }}" class="img-fluid" style="width: 300px; border-radius: 10px; font-size:14px; margin-bottom: 0.5rem">
            @else 
                <p class="text-muted">Sin portada</p>
            @endif
        </div>

        <div class="col-md-6">
            <label class="form-label text-muted" for="cover">Portada (opcional)</label>
            <input
                type="file"
                class="form-control"
                id="cover"
                name="cover"
            >
            @error('cover')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-muted" for="cover_description">Título de la portada</label>
            <input class="form-control" type="text" name="cover_description" id="cover_description" value="{{ old('cover_description', $blog->cover_description) }}">
            @error('cover_description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <label class="form-label text-muted" for="content">Contenido completo</label>
            <textarea class="form-control" name="content" rows="10" id="content">{{ old('content', $blog->content)}}</textarea>
            @error('content')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <hr class="border border-dark-subtle border-1">
        </div>
        <div class="col-md-12 d-flex gap-4 mt-3">
            <button class="btn btn-primary flex-fill" type="submit">Cargar cambios</button>
            <button class="btn btn-primary w-20" type="reset"><i class="fa-solid fa-broom" title="Limpiar"></i></button>
        </div>
        
    </form>
</section>

@endsection
