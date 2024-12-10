@extends('layouts.main')


@section('title', $sunscreen->title)


@section('content')

<section class="container py-5">
    <div class="mb-4 intro-productos">
        <p class="text-muted">
            <a href="{{ route('sunscreens.index') }}">Protectores Solares</a> >
            <a href="{{ route('sunscreens.view', ['id' => $sunscreen->sunscreen_id]) }}">{{ $sunscreen->title }} </a>
        </p>
        <h2 class=" text-primary">Detalles del producto</h2>
    </div>
    <article class="card">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 position-relative d-flex flex-column">
                <p class="position-absolute spf"> SPF {{$sunscreen->spf->value}} </p>
                <img src="{{ asset('img/protectores/' . $sunscreen->image) }}" class="card-img-top" alt="{{ $sunscreen->title }}">
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div class="card-body">
                    <p class="card-text text-muted mb-2"> {{$sunscreen->brand->name}}</p>
                    <h3 class="card-title h2">{{ $sunscreen->title }}</h3>
                    <h4 class="card-text h3">${{ number_format($sunscreen->price) }}</h4>
                    <p class="card-text text-muted">{{ $sunscreen->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-light">
                            <h5>Detalles</h5>
                        </li>
                        <li class="list-group-item row d-flex justify-content-between"><strong class="col-6">Aplicación</strong>
                            @foreach ($sunscreen->applications as $application)
                            {{ $application->type }}@if (!$loop->last),@endif
                            @endforeach
                        </li>
                    </ul>
                </div>

                <div class="card-body container">
                    <form action="{{ route('cart.add') }}" method="post" class="row align-items-end row-gap-3">
                        @csrf
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" value="1" class="form-control" min="1">
                            <input type="hidden" name="sunscreen_id" value="{{ $sunscreen->sunscreen_id }}">
                            <input type="hidden" name="title" value="{{ $sunscreen->title }}">
                            <input type="hidden" name="price" value="{{ $sunscreen->price }}">
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary w-100" type="submit">Agregar al carrito</button>
                        </div>
                    </form>
                </div>


                <div class="mx-3 mt-2 mb-3">
                    <a href="{{ route('sunscreens.index') }}" class="btn btn-primary">Volver a Catálogo</a>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection