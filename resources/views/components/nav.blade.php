<div class="sticky-top">
  <nav class="navbar navbar-expand-lg py-3 bg-body-tertiary" id="Menu">
    <ul class="container listas">
      <li>
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('img/icon.png') }}" alt="Ir a Inicio de la Farmacia" width="40">
          <h1 class="navbar-text">Farmasolar</h1>
        </a>
      </li>
      <li>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hamburguesa" aria-controls="hamburguesa" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </li>
      <li class="collapse navbar-collapse" id="hamburguesa">
        <ul class="navbar-nav ms-auto">
          <li>
            <x-nav-link route="home"> Inicio </x-nav-link>
          </li>
          <li>
            <x-nav-link route="about"> Nosotros </x-nav-link>
          </li>
          <li>
            <x-nav-link route="contact"> Contacto </x-nav-link>
          </li>
          <li>
            <x-nav-link route="sunscreens.index"> Protectores Solares </x-nav-link>
          </li>
          <li>
            <x-nav-link route="blogs.index"> Blog </x-nav-link>
          </li>

          <li>
            <a class="nav-link carrito" href="{{ route('cart.view') }}"><i class="fa-solid fa-basket-shopping me-1 text-primary" title="Carrito"></i> 
            @if ($cartCount > 0)
            <span class="badge bg-primary text-white">{{ $cartCount }}</span>
            @endif</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user me-1 text-primary" title="Perfil"></i> Perfil</a>
            <ul class="dropdown-menu dropdown-menu-md-end">
              @guest 
              <li><span class="dropdown-header">Regístrate y mejora aún más tu experiencia.</strong></span></li>   
              <li><a class="dropdown-item" href="{{ route('auth.register.form')}}"><i class="fa-solid fa-user-plus me-1 text-primary" title="Registrarse"></i> Registrarse</a></li>
              <li><span class="dropdown-header">¿Ya eres usuario? Ingresa a tu cuenta.</strong></span></li>   
              <li><a class="dropdown-item" href="{{ route('auth.login.form')}}"><i class="fa-solid fa-right-to-bracket me-1 text-primary" title="Iniciar sesión"></i> Iniciar sesión</a></li>
                
            @else

            <li><span class="dropdown-item-text">Hola, <strong>{{ auth()->user()->email }}</strong></span></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-gear me-1 text-primary" title="Perfil"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('cart.view') }}"><i class="fa-solid fa-basket-shopping me-1 text-primary" title="Carrito"></i> Tu carrito</a></li>
            @if(Auth::user()->role_id === 1)
            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-border-all me-1 text-primary" title="Dashboard"></i> Dashboard</a></li>
            @endif
              
            <li><hr class="dropdown-divider"></li>
              <form action="{{ route('auth.logout.process') }}" method="POST" class="">
                @csrf
                <button class="dropdown-item"> <i class="fa-solid fa-right-from-bracket me-1 text-primary" title="Cerrar sesión"></i> Cerrar sesión</a> </button>
            </form>
              @endguest
            </ul>
          </li>

        </ul>
      </li>
    </ul>
  </nav>
</div>