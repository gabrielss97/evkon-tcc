<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('css')

    <!-- JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('titulo') | Organização de Eventos</title>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="{{ route('inicio') }}">Evkon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <span></span>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            @guest
                                <li class="nav-item">
                                    <a href="#" class="nav-link fs-5 " data-bs-toggle="modal"
                                        data-bs-target="#modal-login">
                                        Entrar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link fs-5 " data-bs-toggle="modal"
                                        data-bs-target="#modal-inscrever">
                                        Inscreva-se
                                    </a>
                                </li>
                            @endguest
                            @cannot('colaborador')
                                <li class="nav-item">
                                    <a href="{{ route('inscricao-colaborador') }}"
                                        class="nav-link @if (Route::is('inscricao-colaborador')) active @endif fs-5 ">
                                        Colaborador
                                    </a>
                                </li>
                            @endcannot
                            <li class="nav-item">
                                <a href="{{ route('contato') }}"
                                    class="nav-link @if (Route::is('contato')) active @endif fs-5 ">
                                    Contato
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sobre') }}"
                                    class="nav-link @if (Route::is('sobre')) active @endif fs-5 ">
                                    Sobre
                                </a>
                            </li>
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-usuario dropdown-toggle text-muted" href="#"
                                        id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="{{ asset(Auth::user()->foto == null ? 'assets/img/profile.png' : Auth::user()->foto) }}"
                                            alt="" style="width: 35px; height: 35px" class="rounded-circle">
                                        <span class="d-inline d-md-none">{{ Auth::user()->nome }}
                                            {{ Auth::user()->sobrenome }}</span>
                                    </a>
                                    <div class="dropdown-menu border-radius-15px overflow-hidden"
                                        aria-labelledby="dropdownId" style="left: -140% !important">
                                        <a class="dropdown-item small" href="{{ route('painel.home') }}"
                                            style="font-weight: 500">
                                            Painel de controle
                                        </a>

                                        @can('cliente')
                                            <a class="dropdown-item small " href="{{ route('inscricao-colaborador') }}" style="font-weight: 500">
                                                Tornar-se colaborador
                                            </a>
                                        @endcan
                                        <a class="dropdown-item small" style="font-weight: 500"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                            Desconectar-ser
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endauth
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Contéudo -->
        @yield('content')
    </main>

    <!-- Tornar colaborador -->
    <section>
        <div class="container px-lg-5 text-center text-md-start " id="tornar-colaborador">
            <div class="px-lg-5">
                <div class="bg-121212 p-4 border-radius-30px">
                    <div class="row p-3 align-items-center">
                        <div class="col-12 col-md-7 text-white p-3 order-2 order-md-1">
                            <h2 class="h1 fw-bold"> Torne-se um colaborador </h2>
                            <a name="" id=""
                                class="btn btn-light text-indigo btn-lg border-radius-10px mt-5 fw-bold fs-4"
                                href="{{ route('inscricao-colaborador') }}" role="button">Saiba mais</a>
                        </div>
                        <div class="col-12 col-md-5 p-3 order-1 order-md-2">
                            <img src="{{ asset('assets/img/ilu_colaboradora.jpg') }}" alt=""
                                class="w-100 border-radius-30px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('layouts._rodape')

    <!-- Modal Login -->
    @include('_modal_login')
    <!-- Modal Inscrever -->
    @include('_modal_inscrever')

    @if (\App\Models\User::where('conta', 'admin')->exists() == false)
        <!-- Modal Inscrever admin -->
        @include('_modal_inscrever_admin')
    @endif

    @yield('scripts')
</body>

</html>
