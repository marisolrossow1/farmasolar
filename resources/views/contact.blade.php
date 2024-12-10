@extends('layouts.main')

@section('title', 'Contacto')

@section('content')

<div>
<section class="container padding-section">
    <div class="row align-items-center justify-content-around">
        <div class="encabezado col-md-6">
            <h2 class="linea-debajo mb-5">Para <span class="text-primary">Ayuda y Contacto</span></h2>
            <p>Para enviarnos <strong>un comentario, sugerencia o bien realizar un reclamo</strong>, te solicitamos contactar a cualquiera de las encargadas de Farmasolar.</p>
            <a href="#SeccionContacto" class="btn btn-primary mt-3">Contactar</a>
        </div>
        <div class="col-md-6 imagen-encabezado">
            <img src="img/contacto_portada.png" alt="Mujer aplicándose protector solar con un sol en la playa" class="img-fluid">
        </div>
    </div>
</section>

<section class="container padding-section " id="SeccionContacto">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="linea-debajo-medio mb-5 text-center">Datos de <span class="text-primary">Creadoras</span> del Proyecto</h2>
        </div>
        <div class="row">
        <article class="row align-items-center justify-content-center col-lg-6">
            <div class="col-md-6 imagen-encabezado d-flex justify-content-center">
                <img src="img/foto-perfil-mel.png" alt="Foto de alumna Melina Ortiz" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 encabezado">
                <h3>Ortiz <span class="text-primary">Melina</span> Ailen</h3>
                <ul class="list-unstyled datos-alumna">
                    <li>
                        <p><strong>22</strong> años</p>
                    </li>
                    <li class="mb-3"><a href="mailto:melina.ortiz@davinci.edu.ar">melina.ortiz@davinci.edu.ar</a></li>
                    <li>
                        <ul class="list-unstyled d-flex gap-2 redes-sociales">
                            <li><a href="https://www.instagram.com/melttespring/" target="_blank"><i class="fa-brands fa-instagram"></i><span class="texto-no-visible">Instagram</span></a></li>
                            <li><a href="https://github.com/melinel1" target="_blank"><i class="fa-brands fa-github"></i><span class="texto-no-visible">Github</span></a></li>
                            <li><a href="https://www.behance.net/melina-ortiz" target="_blank"><i class="fa-brands fa-behance"></i><span class="texto-no-visible">Behance</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </article>
        <article class="row align-items-center justify-content-center col-lg-6">
            <div class="col-md-6 imagen-encabezado d-flex justify-content-center">
                <img src="img/foto-perfil-mari.jpg" alt="Foto de alumna Marisol Rossow" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 encabezado">
                <h3>Rossow <span class="text-primary">Marisol</span></h3>
                <ul class="list-unstyled datos-alumna">
                    <li>
                        <p><strong>20</strong> años</p>
                    </li>
                    <li class="mb-3"><a href="mailto:marisol.rossow@davinci.edu.ar">marisol.rossow@davinci.edu.ar</a></li>
                    <li>
                        <ul class="list-unstyled d-flex gap-2 redes-sociales">
                            <li><a href="https://www.instagram.com/marisolrossow/" target="_blank"><i class="fa-brands fa-instagram"></i><span class="texto-no-visible">Instagram</span></a></li>
                            <li><a href="https://github.com/marisolrossow1" target="_blank"><i class="fa-brands fa-github"></i><span class="texto-no-visible">Github</span></a></li>
                            <li><a href="https://www.behance.net/marisolrossow" target="_blank"><i class="fa-brands fa-behance"></i><span class="texto-no-visible">Behance</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </article>
        </div>
    </div>
</section>
</div>

@endsection