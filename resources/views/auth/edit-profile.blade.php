@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')
<section class="container padding-section" id="SeccionPerfil">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4 text-center text-white gradient-custom">
                        <i class="fa-solid fa-circle-user img-fluid rounded icon-perfil-grande mt-5"></i>
                        <h1 class="h5 mt-3">Editar Perfil</h1>
                        <a href="{{ route('profile') }}" class="btn btn-light btn-sm mb-5"><i class="fa-solid fa-arrow-left me-1"></i> Volver</a>
                    </div>
                    <div class="col-md-8">
                        <article class="card-body p-4">
                            <h2 class="h6">Edita los campos</h2>
                            <hr>
                            <form action="{{ route('profile.edit.process') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label text-muted" for="name">Nombre</label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label text-muted" for="email">Email</label>
                                        <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label text-muted" for="role">Rol</label>
                                        <input class="form-control" type="text" name="role" id="role" value="{{ $user->role->type }}" readonly>
                                    </div>
                                </div>

                                <hr class="mt-3 mb-2">
                                <div class="d-flex gap-4">
                                    <button class="btn btn-primary flex-fill" type="submit">Guardar</button>
                                    <button class="btn btn-secondary w-20" type="reset"><i class="fa-solid fa-broom" title="Limpiar"></i></button>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
