@extends('layouts.main')

@section('title', 'Inicio de Sesión')

@section('content')

<div>
<section class="container padding-section">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="linea-debajo-medio mb-5 text-center">Iniciar sesión</h2>
        </div>
        <form action="{{ route('auth.login.process') }}" method="post"  class="col-lg-5" id="login">
        @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label text-muted">Correo electrónico <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label text-muted">Contraseña <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>

            <input class="btn btn-primary mt-3 w-100 mb-3" type="submit" value="Iniciar sesión">
            <p class="text-muted fs-6 mb-0 text-center">¿No tiene cuenta?</p>
            <a class="btn btn-secondary mt-2 w-100" href="{{ route('auth.register.form') }}">Registrarse</a>
        </form>
    </div>
</section>
</div>

    
@endsection