@extends('layouts.painel.app')
@section('titulo', 'Painel de controle')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        @if (session('registro_cliente'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Registro realizado com sucesso! </strong>
                Vá para <a href="{{ route('painel.conta') }}" class="">conta</a> e preencha seus dados adicionais.
            </div>
        @endif
        @if (session('registro_colaboradro'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Inscrição realizada com sucesso! </strong>
                Vá para <a href="{{ route('painel.conta') }}" class="">conta</a> e preencha seus dados adicionais para
                que clientes possam entrar em contato.
            </div>
        @endif


        @can('colaborador')
            <!-- Meus anúncios -->
            <div class="card border-0 bg-white">
                <div class="card-body p-4">
                    <h2 class="h4 card-title fw-bold mb-4">Meus anúncios</h2>
                    @if (count($meusAnuncios) == 0)
                        <div class="">Não há anúncios.</div>
                    @endif
                    <!-- Itens -->
                    <div class="">
                        @foreach ($meusAnuncios as $anuncio)
                            <div class="d-flex flex-column flex-md-row mb-4">
                                <div class="">
                                    <a href="{{ route('anuncios.show', $anuncio->id) }}" class="">
                                        @php
                                            $imgs = json_decode($anuncio->imgs);
                                            $img = [];
                                            foreach ($imgs as $key => $value) {
                                                $img[] = $value;
                                            }
                                        @endphp
                                        <img src="{{ asset($img[0]) }}" alt="" class="rounded-3"
                                            style="width: 200px">
                                    </a>
                                </div>
                                <div class="me-auto px-md-3 py-2">
                                    <a href="{{ route('anuncios.show', $anuncio->id) }}" class="link-dark text-decoration-none">
                                        <h3 class="h5">{{ $anuncio->titulo }}</h3>
                                        <p class="">
                                            {{ Str::limit($anuncio->descricao_local, 60) }}
                                        </p>
                                        <span class="text-muted">
                                            <i class="fa-regular fa-comment-dots"></i>
                                            ({{ $anuncio->comentarios->count() }})
                                            Comentários
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center pt-2 pb-3">
                            @if (count($meusAnuncios) > 5)
                                <a href="{{ route('anuncios.meus-anuncios') }}"
                                    class="link-danger text-decoration-none fw-semi-bold-1">Ver todos os meus anúncios</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comentários -->
            <div class="card border-0 bg-white mt-4">
                <div class="card-body p-4">
                    <h2 class="h4 card-title fw-bold mb-4">Comentários</h2>
                    @if (count($comentariosParaColaborador) == 0)
                        <div class="">Não há comentários.</div>
                    @endif
                    <!-- Itens -->
                    <div class="text-center text-md-start">
                        @foreach ($comentariosParaColaborador as $comentario)
                            <div class="d-flex flex-column flex-md-row mb-4 pb-3 pb-md-0 ">
                                <div class="">
                                    <a href="{{ route('anuncios.show', 1) }}" class="">
                                        <img src="{{ asset($comentario->user->foto == null ? 'assets/img/profile.png' : $comentario->user->foto) }}"
                                            alt="" class="rounded-circle" style="width: 60px; height: 60px">
                                    </a>
                                </div>
                                <div class="me-lg-auto px-md-3 mt-3 mt-md-0">
                                    <h3 class="h5">
                                        {{ $comentario->user->nome }} {{ $comentario->user->sobrenome }}
                                    </h3>
                                    <p class="">
                                        {{ Str::limit($comentario->msg, 150) }}
                                    </p>
                                    <div class="text-muted small">
                                        Publicado em <a class="link-secondary"
                                            href="{{ route('anuncios.show', $comentario->anuncio->id) }}"
                                            class="">{{ $comentario->anuncio->titulo }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center pt-2 pb-3">
                            @if (count($comentariosParaColaborador) > 5)
                                <a href="{{ route('painel.comentarios') }}"
                                    class="link-warning text-decoration-none fw-semi-bold-1">Ver todos os
                                    comentários</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('cliente')
            <div class="card border-0 bg-white">
                <div class="card-body p-4">
                    <!-- Meus anúncios -->
                    <h2 class="h4 card-title fw-bold mb-4">Anúncios</h2>
                    @if (count($anuncios) == 0)
                        <div class="">Não há anúncios.</div>
                    @endif
                    <!-- Itens -->
                    <div class="">
                        @foreach ($anuncios as $anuncio)
                            <div class="d-flex flex-column flex-md-row mb-4">
                                <div class="">
                                    <a href="{{ route('anuncios.show', $anuncio->id) }}" class="">
                                        @php
                                            $imgs = json_decode($anuncio->imgs);
                                            $img = [];
                                            foreach ($imgs as $key => $value) {
                                                $img[] = $value;
                                            }
                                        @endphp
                                        <img src="{{ asset($img[0]) }}" alt="" class="rounded-3"
                                            style="width: 200px">
                                    </a>
                                </div>
                                <div class="me-auto px-md-3 py-2">
                                    <a href="{{ route('anuncios.show', $anuncio->id) }}"
                                        class="link-dark text-decoration-none">
                                        <h3 class="h5">{{ $anuncio->titulo }}</h3>
                                        <p class="">
                                            {{ Str::limit($anuncio->descricao_local, 60) }}
                                        </p>
                                        <span class="text-muted">
                                            <i class="fa-regular fa-comment-dots"></i>
                                            ({{ $anuncio->comentarios->count() }})
                                            Comentários
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center pt-2 pb-3">
                            @if (count($anuncios) > 5)
                                <a href="{{ route('anuncios.index') }}"
                                    class="link-danger text-decoration-none fw-semi-bold-1">Ver
                                    todos os anúncios</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin')
            <div class="card border-0 bg-white">
                <div class="card-body p-4">
                    <!-- Colaboradores -->
                    <h2 class="h4 card-title fw-bold mb-4">Colaboradores</h2>
                    @if (count($colaboradores) == 0)
                        <div class="">Não há colaboradores.</div>
                    @endif

                    <!-- Itens -->
                    <div class="text-center text-md-start">
                        @foreach ($colaboradores as $colaborador)
                            <div class="d-flex flex-column flex-md-row mb-4 pb-3 pb-md-0">
                                <div class="">
                                    <a href="{{ route('colaboradores.show', $colaborador->id) }}" class="">
                                        <img src="{{ asset($colaborador->foto == null ? 'assets/img/profile.png' : $colaborador->foto) }}"
                                            alt="" class="rounded-circle" style="width: 60px; height: 60px">
                                    </a>
                                </div>
                                <div class="me-auto px-md-3 mt-3 mt-md-0">

                                    <a href="{{ route('colaboradores.show', $colaborador->id) }}"
                                        class="link-dark text-decoration-none">
                                        <h3 class="h5">
                                            {{ $colaborador->nome }} {{ $colaborador->sobrenome }}
                                            @if ($colaborador->status == 'ativo')
                                                <span class="badge rounded-pill bg-success text-white px-2 py-1"
                                                    style="font-size: 11px">
                                                    Ativo
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-danger text-white px-2 py-1"
                                                    style="font-size: 11px">
                                                    Desativado
                                                </span>
                                            @endif
                                        </h3>
                                    </a>
                                    <p class="">
                                        {{ Str::limit($colaborador->sobre, 140) }}
                                    </p>
                                    <div class="text-muted small">
                                        @if ($colaborador->status == 'ativo')
                                            <a name="" id=""
                                                class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                href="{{ route('colaboradores.desativar', $colaborador->id) }}"
                                                role="button">
                                                <i class="fa-solid fa-ban"></i>
                                                Desativar
                                            </a>
                                        @else
                                            <a name="" id=""
                                                class="btn btn-outline-success btn-sm rounded-pill px-3"
                                                href="{{ route('colaboradores.ativar', $colaborador->id) }}" role="button">
                                                <i class="fa-regular fa-circle-check"></i>
                                                Ativar
                                            </a>
                                        @endif
                                        <a name="" id=""
                                            class="btn btn-outline-dark btn-sm rounded-pill px-3"
                                            href="{{ route('colaboradores.remover', $colaborador->id) }}" role="button"
                                            onclick="return confirm('Tem certeza na remoção desse colaborador?')">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Remover
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        <div class="text-center pt-2 pb-3">

                            @if (count($colaboradores) > 5)
                                <a href="{{ route('colaboradores.index') }}"
                                    class="link-danger text-decoration-none fw-semi-bold-1">
                                    Ver todos os colaboradores
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clientes -->
            <div class="card border-0 bg-white mt-4">
                <div class="card-body p-4">
                    <h2 class="h4 card-title fw-bold mb-4">Clientes</h2>
                    @if (count($clientes) == 0)
                        <div class="">Não há clientes.</div>
                    @endif

                    <div class="text-center text-md-start">
                        <div class="row gy-3">

                            @foreach ($clientes as $cliente)
                                <div class="col-12 col-lg-4 text-center">
                                    <div class=" mb-4 pb-3 pb-md-0">
                                        <div class="">
                                            <a href="{{ route('clientes.visualizar-cliente', $cliente->id) }}"
                                                class="">
                                                <img src="{{ asset($cliente->foto == null ? 'assets/img/profile.png' : $cliente->foto) }}"
                                                    alt="" class="rounded-circle" style="width: 90px; height: 90px">
                                            </a>
                                        </div>
                                        <div class="me-auto mt-3 mt-md-0 pt-3">

                                            <a href="{{ route('clientes.visualizar-cliente', $cliente->id) }}"
                                                class="link-dark text-decoration-none">
                                                <h3 class="h5">
                                                    {{ $cliente->nome }} {{ $cliente->sobrenome }}
                                                    @if ($cliente->status == 'ativo')
                                                        <span class="badge rounded-pill bg-success text-white px-2 py-1"
                                                            style="font-size: 11px">
                                                            Ativo
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger text-white px-2 py-1"
                                                            style="font-size: 11px">
                                                            Desativado
                                                        </span>
                                                    @endif
                                                </h3>
                                            </a>

                                            <div class="text-muted small">
                                                @if ($cliente->status == 'ativo')
                                                    <a name="" id=""
                                                        class="btn btn-outline-danger btn-sm rounded-pill"
                                                        href="{{ route('clientes.desativar', $cliente->id) }}" role="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Desativar">
                                                        <i class="fa-solid fa-ban"></i>
                                                        <div class="visually-hidden">
                                                            Desativar
                                                        </div>
                                                    </a>
                                                @else
                                                    <a name="" id=""
                                                        class="btn btn-outline-success btn-sm rounded-pill"
                                                        href="{{ route('clientes.ativar', $cliente->id) }}" role="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Ativar">
                                                        <i class="fa-regular fa-circle-check"></i>
                                                        <span class="visually-hidden">
                                                            Ativar
                                                        </span>
                                                    </a>
                                                @endif
                                                <a name="" id=""
                                                    class="btn btn-outline-dark btn-sm rounded-pill"
                                                    href="{{ route('clientes.remover', $cliente->id) }}" role="button"
                                                    onclick="return confirm('Tem certeza na remoção desse cliente?')"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Remover">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                    <span class="visually-hidden">
                                                        Remover
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center pt-2 pb-3">
                            @if (count($clientes) > 5)
                                <a href="{{ route('clientes') }}" class="link-warning text-decoration-none fw-semi-bold-1">
                                    Ver todos os clientes
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endcan

    </div>
@endsection
