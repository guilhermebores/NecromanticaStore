<link rel="stylesheet" href="{{ asset('css/gothic.css') }}">

<nav class="navbar navbar-expand bg-black px-4 py-3 border-bottom border-secondary">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="navbar-brand text-danger fs-4 fw-bold font-cinzel mb-0 text-decoration-none">
            Necromântica<strong class="text-dark">Store</strong>
        </a>

        <div class="d-flex align-items-center">
            <ul class="list-unstyled d-flex flex-row gap-3 mb-0 me-4 text-secondary">
                <li><a href="#about" class="text-decoration-none text-reset menu-link">Sobre</a></li>
                <li><a href="{{ route('cart.index') }}" class="text-decoration-none text-reset menu-link">Carrinho</a></li>
                <li><a href="{{ route('products') }}" class="text-decoration-none text-reset menu-link">Produtos</a></li>
                <li><a href="{{ route('home') }}" class="text-decoration-none text-reset menu-link">Início</a></li>
            </ul>

            <div class="user-menu">
                <div class="d-none d-sm-flex align-items-center ms-3">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            @auth
                            {{ Auth::user()->name }}
                            @endauth
                            @guest
                            Convidado
                            @endguest
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                           @authadmin
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Painel</a>
                            </li>
                            <li><a href="{{ route('admin.purchases') }}">Compras</a></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sair</button>
                                </form>
                            </li>
                            @endauthadmin
                            @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sair</button>
                                </form>
                            </li>
                            @endauth
                            @guest
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
