@extends('layouts.main')

@section('title', 'Blog')

@section('content')

<div>

<section class="container py-5">
    <div class="mb-4 intro-productos">
        <p class="text-muted">
        <a href="{{ route('blogs.index') }}">Blog</a></p>
        <h2 class=" text-primary">Todas las Entradas</h2>
        <p class="text-muted">Resultados totales: {{ $blogs->count() }}</p>
        @if(auth()->check() && Auth::user()->role_id === 1)
        <a href="{{ route('blogs.create.form') }}" class="btn btn-primary">Publicar Nueva Entrada</a>
        @endif
    </div>
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-lg-3 col-md-5 col-sm-12 col-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text text-muted mb-2">{{ $blog->category }}</p>
                        @if ($blog->cover)
                            <img src="{{ Storage::url($blog->cover) }}" alt="{{ $blog->cover_description }}" class="img-fluid" style="width: 300px; border-radius: 10px; font-size:14px; margin-bottom: 0.5rem">
                        @endif
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <p class="card-text text-muted">{{ $blog->release_date }}</p>
                        <p class="card-text text-muted">{{ $blog->description }}</p>
                        <a href="{{ route('blogs.view', ['id' => $blog->blog_id]) }}" class="btn btn-primary mt-3">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

</div>

@endsection
