@extends('layouts.main')

@section('title', 'Sobre Nosotros')

@section('content')

<div>
<section class="container padding-section">
    <div class="row align-items-center justify-content-around">
        <div class="encabezado col-md-6">
            <h2 class="linea-debajo mb-5">Sobre <span class="text-primary">Nosotros</span></h2>
            <p>En Farmasolar nos dedicamos a ofrecerte los mejores productos para el cuidado solar. <strong>Nuestra misión es proteger tu piel y promover la salud dermatológica.</strong></p>
            <p>Nuestro equipo está formado por profesionales apasionados por el cuidado de la piel y comprometidos con <strong>brindarte productos de alta calidad y atención personalizada.</strong></p>
            <p>En Farmasolar, <em>nos esforzamos por proporcionarte una experiencia de compra única</em>, combinando la conveniencia del comercio electrónico con el asesoramiento experto de nuestro equipo.</p>
        </div>
        <div class="col-md-6 imagen-encabezado">
            <img src="img/nosotros_portada.jpg" alt="Mujer aplicándose protector solar en la playa" class="img-fluid">
        </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="content-pill">
        <i class="fa-solid fa-face-grin-stars mb-3"></i>
          <h3>Calidad Garantizada</h3>
          <p>Nos comprometemos a ofrecerte productos de la más alta calidad, probados y aprobados por dermatólogos.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content-pill">
        <i class="fa-solid fa-shop-lock mb-3"></i>
          <h3>Seguridad y Confianza</h3>
          <p>Tu seguridad es nuestra prioridad. Realizamos envíos seguros y protegemos tus datos personales.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content-pill">
        <i class="fa-solid fa-thumbs-up mb-3"></i>
          <h3>Atención Personalizada</h3>
          <p>Nuestro equipo está siempre disponible para responder tus preguntas y brindarte asesoramiento personalizado.</p>
        </div>
      </div>
    </div>
</section>
</div>

@endsection