@extends('layouts.main')

@section('title', 'Protectores Solares')

@section('content')

<div>

<section class="container py-5">
    <div class="mb-4 intro-productos">
        <p class="text-muted">
            <a href="{{ route('sunscreens.index') }}">Protectores Solares</a></p>
        <h2 class=" text-primary">Todos los Productos</h2>
        <p class="text-muted">Resultados totales: {{ $sunscreens->count() }}</p>
    </div>
    <div class="row">
        @foreach ($sunscreens as $sunscreen)
            <div class="col-lg-3 col-md-5 col-sm-12 col-card">
                <div class="card">
                    <div class="position-relative">
                        <p class="position-absolute spf">SPF {{ $sunscreen->spf->value }}</p>
                        <img src="{{ asset('img/protectores/' . $sunscreen->image) }}" class="card-img-top" alt="{{ $sunscreen->title }}">
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted mb-2">{{ $sunscreen->brand->name }}</p>
                        <h3 class="card-title">{{ $sunscreen->title }}</h3>
                        <p class="card-text precio">${{ number_format($sunscreen->price) }}</p>
                        <p class="card-text text-muted">{{ Str::limit($sunscreen->description, 60, '...') }}</p>
                        <a href="{{ route('sunscreens.view', ['id' => $sunscreen->sunscreen_id]) }}" class="btn btn-primary w-100 mt-2">Ver más</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</section>

</div>

@endsection
