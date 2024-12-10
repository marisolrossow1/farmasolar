<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title', 'Main')
    </title>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  <script src="https://kit.fontawesome.com/458b5a9719.js" crossorigin="anonymous" defer></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<x-nav></x-nav>

@if (session()->has('feedback.message'))
        <div class="alert alert-{{ session()->get('feedback.type', 'success') }}">
            {!! session()->get('feedback.message') !!}
        </div>
@endif

@yield('content')

<x-footer></x-footer>

<script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
