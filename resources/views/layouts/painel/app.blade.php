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
    <!-- JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('titulo') | Organização de Eventos</title>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <!-- Navbar do topo -->
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
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-md-center">
                            @can('colaborador')
                                <li class="nav-item">
                                    <a href="{{ route('anuncios.create') }}"
                                        class="btn btn-pink btn-lg px-3 border-radius-10px py-1 me-md-3">
                                        Criar anúncio
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('contato') }}" class="nav-link fs-5 text-muted">
                                    Contato
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-usuario dropdown-toggle text-muted" href="#"
                                    id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ asset(Auth::user()->foto == null ? 'assets/img/profile.png' : Auth::user()->foto) }}"
                                        alt="" style="width: 35px; height:35px" class="rounded-circle">
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
                                        <a class="dropdown-item small " href="{{ route('inscricao-colaborador') }}"
                                            style="font-weight: 500">
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
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar para links -->
        <div class="py-5 mt-md-4"></div>
        <nav class="navbar navbar-dark bg-dark py-1" style="background: #222222 !important">
            <div class="container">
                <ul class="navbar-nav me-auto mt-0">
                    <li class="nav-item py-0 ">
                        <a class="nav-link fs-5 py-0 @if (Route::is('painel.home')) active @endif px-md-0"
                            style="font-weight: 600" href="{{ route('painel.home') }}">
                            <i class="fa-solid fa-house-chimney fa-sm me-1"></i>
                            <span class="d-none d-md-inline-block">Painel de controle</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-0 flex-row ms-auto">
                    <li class="nav-item py-0 px-2 px-md-3">
                        <a class="nav-link fs-5 py-0  @if (Route::is('anuncios.index')) active @endif "
                            style="font-weight: 600" href="{{ route('anuncios.index') }}">
                            <i class="me-md-1 fa-solid fa-bullhorn fa-sm"></i>
                            <span class="d-none d-md-inline-block">Anúncios</span>
                        </a>
                    </li>
                    @canany(['admin', 'colaborador'])
                        <li class="nav-item py-0 px-2 px-md-3">
                            <a class="nav-link fs-5 py-0  @if (Route::is('painel.comentarios')) active @endif "
                                style="font-weight: 600" href="{{ route('painel.comentarios') }}">
                                <i class="fa-regular fa-comments fa-sm me-md-1 "></i>
                                <span class="d-none d-md-inline-block">Comentários</span>
                            </a>
                        </li>
                    @endcanany
                    <li class="nav-item py-0 px-2 px-md-3">
                        <a class="nav-link fs-5 py-0  @if (Route::is('painel.conta')) active @endif  "
                            style="font-weight: 600" href="{{ route('painel.conta') }}">
                            <i class="me-md-1 fa-solid fa-user-large fa-sm"></i>
                            <span class="d-none d-md-inline-block">Conta</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="bg-F5F5F5">
            <div class="container">
                <div class="row">
                    @php
                        // Rotas para exibir o coluna lateral
                        $rotas = ['painel.home', 'painel.comentarios', 'painel.conta', 'colaboradores.index'];
                        $rotas[] = 'colaboradores.show';
                        $rotas[] = 'clientes';
                        $rotas[] = 'clientes.visualizar-cliente';
                        $rotas[] = 'contatos';
                        $rotas[] = 'contatos.visualizar-contato';
                        $rotas[] = 'estatisticas';
                        $rotas[] = 'denuncias-de-anuncios';
                        $rotas[] = 'denuncias-de-anuncios.visualizar-denuncia';
                        $rotas[] = 'denuncias-de-avaliacoes';
                        $rotas[] = 'denuncias-de-avaliacoes.visualizar-denuncia';
                        $rotas[] = 'exportar';
                        $rotas[] = 'categorias.index';
                        $rotas[] = 'anuncios.create';
                        $rotas[] = 'anuncios.edit';

                        $sidebar = false;
                        foreach ($rotas as $vRota) {
                            if (Route::is($vRota)) {
                                $sidebar = true;
                                break;
                            }
                        }
                    @endphp
                    @if ($sidebar)
                        <!-- Parte de lado -->
                        <div class="col-12 col-md-3">
                            <aside>
                                <div class="sidebar">
                                    <!-- Sobre o Usuário -->
                                    <div class="sobre-usuario bg-white p-4">
                                        <div class="text-center pt-5">
                                            <img src="{{ asset(Auth::user()->foto == null ? 'assets/img/profile.png' : Auth::user()->foto) }}"
                                                alt="" class="rounded-circle"
                                                style="width: 120px; height: 120px">
                                            <div class="fs-4 fw-bold text-dark mt-2">
                                                {{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}
                                            </div>
                                            <div class="fw-bold text-muted">
                                                @switch(Auth::user()->conta)
                                                    @case('admin')
                                                        Administrador
                                                    @break

                                                    @case('colaborador')
                                                        Colaborador
                                                    @break

                                                    @default
                                                        Cliente
                                                @endswitch
                                            </div>
                                        </div>
                                        <!-- Status do perfil -->
                                        <div class="d-flex justify-content-between mt-3 pt-3">
                                            <div class="fw-semi-bold-2">
                                                Status do perfil<br>
                                                <span class="text-success small">
                                                    Ativo
                                                </span>
                                            </div>
                                            <div class="">
                                                <i class="fa-solid fa-circle-check text-success"></i>
                                            </div>
                                        </div>
                                        <!-- Dados -->
                                        <div class="">
                                            @can('colaborador')
                                                <!-- Comentários -->
                                                <div class="d-flex justify-content-between mt-3 pt-1">
                                                    <div class="fw-semi-bold-2">
                                                        Comentários
                                                        <a tabindex="0" class="text-decoration-none text-muted small"
                                                            role="button" data-bs-toggle="popover"
                                                            data-bs-trigger="hover"
                                                            data-bs-content="Total de comentários de todos os meus anúncios">
                                                            <i class="fa-solid fa-circle-info fa-sm"></i>
                                                        </a>
                                                    </div>
                                                    <div class="fw-bold">
                                                        @php
                                                            // Total de denúncias de coment
                                                            $totalCom = \App\Models\Comentario::whereHas('anuncio', function ($query) {
                                                                return $query->where('user_id', Auth::user()->id);
                                                            })->count();
                                                        @endphp
                                                        {{ $totalCom }}
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>

                                    @can('cliente')
                                        <div class="card-links-colaborador px-4 py-5 text-white">
                                            <div class="">
                                            </div>
                                        </div>
                                    @endcan

                                    @can('admin')
                                        <!-- Card de links -->
                                        <div class="card-links-colaborador ps-4 pe-2 py-5 text-white">
                                            <div class="">
                                                <a href="{{ route('estatisticas') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Ver Estatísticas
                                                </a>
                                            </div>
                                            <div class="mt-1">
                                                <a href="{{ route('colaboradores.index') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Ver Colaboradores
                                                </a>
                                            </div>
                                            <div class="mt-1">
                                                <a href="{{ route('clientes') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Ver Clientes
                                                </a>
                                            </div>
                                            <div class="mt-1">
                                                <a href="{{ route('categorias.index') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Ver Categorias
                                                </a>
                                            </div>
                                            <div class="mt-1">
                                                <a href="{{ route('contatos') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Contatos
                                                    @php
                                                        // Total de novos contatos
                                                        $totalContatosNovos = \App\Models\Contato::where('status', 'novo')->count();
                                                    @endphp
                                                    @if ($totalContatosNovos > 0)
                                                        <span class="badge bg-warning text-dark rounded-pill ">
                                                            {{ $totalContatosNovos }}
                                                        </span>
                                                    @endif

                                                </a>
                                            </div>

                                            <div class="mt-1">
                                                <a href="{{ route('denuncias-de-anuncios') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Denúncias de anúncios
                                                    @php
                                                        // Total de denúncias de coment
                                                        $totalDenAnun = \App\Models\DenunciaAnuncio::where('status', 'pendente')->count();
                                                    @endphp
                                                    @if ($totalDenAnun > 0)
                                                        <span class="badge bg-warning text-dark rounded-pill ">
                                                            {{ $totalDenAnun }}
                                                        </span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="mt-1 ">
                                                <a href="{{ route('denuncias-de-avaliacoes') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Denúncias de coment...
                                                    @php
                                                        // Total de denúncias de coment
                                                        $totalDenCom = \App\Models\DenunciaComentario::where('status', 'pendente')->count();
                                                    @endphp
                                                    @if ($totalDenCom > 0)
                                                        <span class="badge bg-warning text-dark rounded-pill ">
                                                            {{ $totalDenCom }}
                                                        </span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="mt-1">
                                                <a href="{{ route('exportar') }}"
                                                    class="text-white text-decoration-none fw-semi-bold-2">
                                                    Exportar Dados
                                                </a>
                                            </div>
                                        </div>
                                    @endcan

                                    @can('colaborador')
                                        <!-- Card de links -->
                                        <div class="card-links-colaborador px-4 py-5 text-white">
                                            <div class="">

                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            </aside>
                        </div>
                    @endif
                    <!-- Contéudo -->
                    <div class="col-12 @if ($sidebar) col-md-9 @endif">

                        @if (Session::has('success'))
                            <!-- Mensagem de sucesso -->
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert"
                                style="margin-bottom: -20px">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ Session::get('success') }}
                            </div>
                            <div class="pt-3 pt-lg-0"></div>
                        @endif

                        @if (Session::has('danger'))
                            <!-- Mensagem de sucesso -->
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert"
                                style="margin-bottom: -20px">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ Session::get('danger') }}
                            </div>
                            <div class="pt-3 pt-lg-0"></div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    @include('layouts._rodape')

    <!-- Popover Bootstrap -->
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <!-- Tooltip Bootstrap -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    @yield('scripts')
</body>

</html>
