<div>
<footer class="footer padding-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('img/icon.png') }}" alt="Logotipo de Farmasolar" class="img-fluid mb-3">
        <ul class="list-unstyled">
          <li><a href="mailto:melina.ortiz@davinci.edu.ar"><i class="fa-solid fa-envelope"></i> farmasolar@gmail.com</a></li>
          <li><a href="tel:1131392797"><i class="fa-solid fa-phone"></i> 11 5556 - 8XXX</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h2 class="h5">Enlaces</h2>
        <ul class="list-unstyled">
        <li>
            <x-footer-link route="home"> Home </x-footer-link>
          </li>
          <li>
            <x-footer-link route="about"> Nosotros </x-footer-link>
          </li>
          <li>
            <x-nav-link route="contact"> Contacto </x-nav-link>
          </li>
          <li>
            <x-footer-link route="sunscreens.index"> Protectores Solares </x-footer-link>
          </li>

          <li>
            <x-footer-link route="blogs.index"> Blog </x-footer-link>
          </li>

          @guest

          <li>
            <x-footer-link route="auth.login.form"> Iniciar sesión </x-footer-link>
          </li>

          @else

          <li>
            <x-footer-link route="admin.dashboard"> Dashboard </x-footer-link>
          </li>

          @endguest
        </ul>
      </div>
      <div class="col-md-4">
        <h2 class="h5">Newsletter</h2>
        <form action="#" enctype="multipart/form-data" method="POST" >
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Tu correo electrónico" aria-label="Tu correo electrónico" required>
            <button class="btn btn-primary" type="submit" id="Newsletter">Suscribirse</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</footer>
</div>