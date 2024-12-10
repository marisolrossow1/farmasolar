@extends('layouts.main')

@section('title', 'Registro')

@section('content')

<section class="container padding-section">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="linea-debajo-medio mb-5 text-center">Registro</h2>
        </div>
        <form action="{{ route('auth.register.process') }}" method="post" enctype="multipart/form-data" class="col-xl-5 container" id="registro">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                Hay errores en los datos del formulario. Por favor, revisalos y volvé a intentar.
            </div>
            @endif
            <div class="form-group mb-3">
                <label for="email" class="form-label text-muted">Correo electrónico <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="email" name="email" required value="{{ old('email')}}">
                @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" class="form-label text-muted">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-6">
                    <label for="password" class="form-label text-muted">Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="password_confirmation" class="form-label text-muted">Repetir contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            <input class="btn btn-primary mt-3 w-100 mb-3" type="submit" value="Registrarse">
            <p class="text-muted fs-6 mb-0 text-center">¿Ya tenés una cuenta?</p>
            <a class="btn btn-secondary mt-2 w-100" href="{{ route('auth.login.form') }}">Iniciar sesión</a>
        </form>
    </div>
</section>

@endsection