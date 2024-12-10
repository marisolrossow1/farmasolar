@extends('layouts.main')

@section('title', 'Farmasolar - Inicio')

@section('content')

<div>
    <section class="container padding-section header">
    <div class="row align-items-center justify-content-around">
        <div class="col-md-6 col-sm-12 encabezado">
        <h2 class="linea-debajo mb-5">Los Mejores Protectores Solares a <span class="text-primary">Un Click</span></h2>
        <p>No importa dónde ni cuándo tomes el sol: <strong>Si usas el protector solar adecuado, tu piel siempre estará protegida</strong>. ¿Quieres encontrar el tuyo?</p>
        <a href="{{ route('sunscreens.index') }}" class="btn btn-primary mt-3">Ver Catálogo</a>
        </div>
        <div class="col-md-6 col-sm-12 imagen-encabezado">
        <img src="{{ asset('img/home_portada.png') }}" alt="Mujer aplicándose protector solar" class="img-fluid">
        </div>
    </div>
    </section>

    <section class="container padding-section header">
    <div>
        <h2 class="linea-debajo-medio mb-5 text-center">Principales <span class="text-primary">Beneficios</span></h2>
    </div>
    <div class="row">
        <div class="col-md-4">
        <div class="content-pill">
            <i class="fa-solid fa-truck mb-3"></i>
            <h3>Compra Online</h3>
            <p>Cómodo y sencillo, a tu casa.</p>
        </div>
        </div>
        <div class="col-md-4">
        <div class="content-pill">
            <i class="fa-solid fa-lock mb-3"></i>
            <h3>Seguro</h3>
            <p>Tu envío y pago estarán a salvo.</p>
        </div>
        </div>
        <div class="col-md-4">
        <div class="content-pill">
            <i class="fa-solid fa-basket-shopping mb-3"></i>
            <h3>Variedad</h3>
            <p>Para todo tipo de pieles y SPF.</p>
        </div>
        </div>
    </div>
    </section>

    <section class="productos-review padding-section">
    <div class="container">
        <div>
        <h2 class="linea-debajo-medio-blanca mb-5 text-center">Protectores <span class="text-light">Populares</span></h2>
        </div>
        <div class="row">
        <div class="col-sm-4">
            <div class="card text-bg-dark">
            <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h3 class="card-title text-light h3 text-center">Actinic control fps100 Eucerin</h3>
                <a href="{{ route('sunscreens.view', ['id' => 7]) }}" class="btn btn-light mt-3">Ver más</a>
            </div>
            <img src="{{ asset('img/protectores/actinic_eucerin_100.jpg') }}" class="card-img" alt="Protector Eucerin">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-bg-dark">
            <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h3 class="card-title text-light h3 text-center">Facial Fps50 toque seco sin color Isdin</h3>
                <a href="{{ route('sunscreens.view', ['id' => 10]) }}" class="btn btn-light mt-3">Ver más</a>
            </div>
            <img src="{{ asset('img/protectores/isdin_50.jpg') }}" class="card-img" alt="Protector Isdin">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-bg-dark">
            <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h3 class="card-title text-light h3 text-center">Ave solar intense protect SPF50+ Avene</h3>
                <a href="{{ route('sunscreens.view', ['id' => 20]) }}" class="btn btn-light mt-3">Ver más</a>
            </div>
            <img src="{{ asset('img/protectores/avene_protect_50.jpg') }}" class="card-img" alt="Protector Popular Avene">
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="container padding-section">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="accordion" id="faqAccordion">
            <h2 class="linea-debajo-medio mb-5 text-center">Preguntas <span class="text-primary">Frecuentes</span></h2>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                ¿Cuáles son los beneficios de usar protector solar?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                Los beneficios de usar protector solar incluyen <strong> protección contra quemaduras solares, reducción del riesgo de cáncer de piel, prevención del envejecimiento prematuro de la piel y mantenimiento de una piel saludable</strong>.
                </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                ¿Cuál es el factor de protección solar (FPS) adecuado para mí?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                El FPS adecuado depende de varios factores, incluyendo tu tipo de piel, la intensidad del sol y la duración de la exposición. Generalmente, <strong>se recomienda un FPS de al menos 30 para la mayoría de las personas</strong>.
                </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                ¿Con qué frecuencia debo aplicar el protector solar?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                <strong>Debes aplicar protector solar cada 2 horas</strong>, especialmente si estás expuesto al sol directo. Además, reaplica después de nadar, sudar o secarte con una toalla.
                </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                ¿Cómo funciona el envío de los productos?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                Ofrecemos envío a domicilio para todos nuestros productos. Una vez realizada tu compra, nuestro equipo se encargará de preparar y enviar tu pedido lo antes posible. <strong>El tiempo de entrega puede variar dependiendo de tu ubicación</strong> y de la opción de envío seleccionada durante el proceso de compra.
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

</div>

@endsection
