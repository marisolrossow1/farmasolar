<nav class="navbar navbar-expand-md">
    <div class="top">
        <div class="logo">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/icon.png') }}" alt="Logo de Farmasolar">
                <h2 class="navbar-text">Farmasolar</h2>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="sidebar">
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <x-nav-link route="admin.dashboard">
                    <i class="fa-solid fa-border-all" title="Dashboard"></i>
                    <h3>Dashboard</h3>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link route="blogs.list">
                    <i class="fa-solid fa-table-cells" title="Entradas"></i>
                    <h3>Entradas</h3>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link route="users.list">
                    <i class="fa-solid fa-users" title="Usuarios"></i>
                    <h3>Usuarios</h3>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link route="orders.list">
                    <i class="fa-solid fa-basket-shopping" title="Carrito"></i>
                    <h3>Compras</h3>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <form action="{{ route('auth.logout.process') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center p-0">
                        <i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i>
                        <h3 class="ms-2 mb-0">Cerrar sesión</h3>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
