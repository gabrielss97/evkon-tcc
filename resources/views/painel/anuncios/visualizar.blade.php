@extends('layouts.painel.app')
@section('titulo')
    {{ $anuncio->titulo }}
@endsection
@section('content')
    <div class="container px-0 px-lg-3 pt-lg-5 mt-5 pb-5">

        <div class="row gy-3 mt-3">
            <div class="col-12 col-md-9">
                <div class="bg-F5F5F5 p-lg-4 border-radius-10px">
                    <h1 class="fw-bold text-center h2 mb-3 ">{{ $anuncio->titulo }}</h1>
                    <!-- Imagens carousel -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                            @foreach (json_decode($anuncio->imgs) as $key => $img)
                                @if ($key == 0)
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                        aria-label="Slide {{ $key }}"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}"
                                        aria-label="Slide {{ $key }}"></button>
                                @endif
                            @endforeach

                        </div>
                        <div class="carousel-inner">

                            @foreach (json_decode($anuncio->imgs) as $key => $img)
                                <div class="carousel-item @if ($key == 0) active @endif">
                                    <img src="{{ asset($img) }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                                </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Avalizções e descrição do evento -->
                    <div class="mt-3 fw-bold">
                        <span class="text-muted"><i class="fa-regular fa-comment-dots"></i> ({{ $comentarios->count() }})
                            comentários</span>
                    </div>
                    <!-- Descricão do local -->
                    <div class="pt-2">
                        {{ $anuncio->descricao_local }}
                    </div>

                    <!-- Localização -->
                    <div class="mt-4 py-4 p-3 border-radius-10px text-center" style="background: rgba(196, 196, 196, 1)">
                        <strong>Localização </strong>
                        <div class="text-center col-12 col-md-9 mx-auto mt-2">
                            <iframe
                                src="https://maps.google.com/maps?q={{ json_decode($anuncio->local_lat_lng)->lat }},{{ json_decode($anuncio->local_lat_lng)->lng }}&t=k&z=16&output=embed"
                                width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="w-100"></iframe>
                        </div>
                    </div>

                    <!-- Sobre o colaborador -->
                    <div class="text-center text-md-start py-4 px-3 px-lg-4 mt-3 border-radius-10px"
                        style="background: rgba(223, 208, 208, 1)">
                        <h2 class="fw-bold fs-5">Sobre o colaborador</h2>

                        <div class="d-flex flex-column flex-md-row gap-2 mt-3 justify-content-center">
                            <div class=" mx-auto" style="width: 90px; height: 75px">
                                <img src="{{ asset($anuncio->user->foto == null ? 'assets/img/profile.png' : $anuncio->user->foto) }}"
                                    alt="" class="rounded-circle img-thumbnail"
                                    style="padding: 2px; width: 70px; height: 70px">
                            </div>
                            <div class="w-100">
                                <h3 class="fw-bold h6">{{ $anuncio->user->nome }} {{ $anuncio->user->sobrenome }}</h3>
                                <p class="">
                                    {{ $anuncio->user->sobre }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Descrição do serviço -->
                    <div class="mt-4">
                        <h2 class="h3 pt-2">Descrição do serviço</h2>
                        <p class="">
                            {{ $anuncio->descricao_servico }}
                        </p>
                    </div>

                    <!-- Comentários -->
                    <div class="mt-4">
                        <h2 class="h3 pt-2">Comentários ({{ $comentarios->count() }})</h2>

                        @if ($comentarios->count() == 0)
                            <div class="">
                                Não há comentáios.
                            </div>
                        @endif

                        @foreach ($comentarios as $item)
                            <div class="d-flex flex-column flex-md-row gap-2 mt-3 justify-content-center p-3 border-radius-10px @if (request()->get('den') == $item->id) bg-warning @endif"
                                style="background: rgba(208, 208, 208, 1)" id="com{{ $item->id }}">
                                <div class=" mx-lg-auto" style="width: 80px; height: 65px">
                                    <img src="{{ asset($item->user->foto == null ? 'assets/img/profile.png' : $item->user->foto) }}"
                                        alt="" class="rounded-circle"
                                        style="padding: 2px; width: 60px; height: 60px">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="fw-bold h6">{{ $item->user->nome }} {{ $item->user->sobrenome }}</h3>
                                    </div>
                                    <p class="pb-0 mb-0">
                                        {{ $item->msg }}
                                    </p>
                                    @if (Auth::user()->id == $anuncio->user_id)
                                        <div class=" mt-2">
                                            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#denunciar-comentario"
                                                onclick="document.querySelector('#form-denunciar-comentario').action=`{{ route('denunciar-comentario', $item->id) }}`">
                                                Denunciar Comentário
                                            </button>
                                        </div>
                                    @endif
                                    @can('admin')
                                        <div class=" mt-2 text-end">
                                            <a name="" id="" class="btn btn-danger btn-sm rounded-pill"
                                                href="{{ route('remover-comentario', [$item->id]) }}" role="button">
                                                <i class="fa-regular fa-trash-can"></i>
                                                Remover
                                            </a>
                                        </div>
                                    @endcan

                                </div>

                            </div>
                        @endforeach

                        @canany(['cliente', 'colaborador'])
                            <!-- Adiconar Comentário -->
                            <div class="mt-4">
                                <button type="button" class="btn btn-dark border-radius-10px" data-bs-toggle="modal"
                                    data-bs-target="#add-comentario">
                                    <i class="fa-solid fa-comment-medical"></i>
                                    Adiconar Comentário
                                </button>
                            </div>
                            @include('painel.anuncios._moda_add_comentario', ['anuncio' => $anuncio])
                        @endcanany

                    </div>

                </div>
            </div>

            <!-- Pedir orçamento -->
            <div class="col-12 col-md-3 mt-5 mt-lg-0">
                <div class="border-radius-10px px-3 py-4" style="background: rgba(245, 238, 214, 1)">
                    <div class="text-center">
                        <img src="{{ asset($anuncio->user->foto == null ? 'assets/img/profile.png' : $anuncio->user->foto) }}"
                            alt="" width="100" height="100" class="border-radius-15px shadow">
                        <div class="fs-4" style="font-weight: 500">
                            {{ $anuncio->user->nome }} {{ $anuncio->user->sobrenome }}
                        </div>

                        <div class="" style="font-weight: 500">
                            <div class="d-flex justify-content-between mt-3 mb-1">
                                <span class="">Preço:</span>
                                <span class="">R${{ number_format($anuncio->preco, 2, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="">Tempo de Resposta:</span>
                                <span class="">{{ $anuncio->tempo_resposta }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            @if ($anuncio->user_id == Auth::user()->id)
                                <a name="" id="" class="btn btn-primary border-radius-10px px-4"
                                    href="{{ route('anuncios.edit', $anuncio->id) }}" role="button"
                                    style="font-weight: 500">
                                    Editar Anúncio
                                </a>
                                <div class="mt-2">
                                    <form action="{{ route('anuncios.destroy', $anuncio->id) }}" method="post"
                                        onsubmit="return confirm('Tem certeza na remoção desse anúncio?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border-radius-10px px-4">
                                            Remover Anúncio
                                        </button>
                                    </form>
                                </div>
                            @endif
                            @can('cliente')
                                <a name="" id="" class="btn btn-light border-radius-10px px-4"
                                    href="https://web.whatsapp.com/send?phone=55{{ str_replace(['(', ')', ' ', '-'], [''], $anuncio->user->telefone) }}"
                                    role="button" style="background: rgba(208, 208, 208, 1); font-weight: 500"
                                    target="_blank">
                                    Pedir orçamento
                                </a>
                            @endcan
                            @canany('admin')
                                <div class="mt-2">
                                    <form action="{{ route('anuncios.destroy', $anuncio->id) }}" method="post"
                                        onsubmit="return confirm('Tem certeza na remoção desse anúncio?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border-radius-10px px-4">
                                            Remover Anúncio
                                        </button>
                                    </form>
                                </div>
                            @endcanany
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Denúncia -->
        <div class="text-center mt-4 pt-3">
            <a class="btn btn-light px-4 py-2 fs-5 border-radius-15px" data-bs-toggle="modal"
                data-bs-target="#denunciar-anuncio" style="background: rgba(208, 208, 208, 1); font-weight: 500">
                Denunciar anúncio <i class="fa-solid fa-circle-exclamation ms-2 text-secondary"></i>
            </a>
        </div>
    </div>

    @can('colaborador')
        <!-- Modal denunciar comentário -->
        @include('painel.anuncios._modal_denunciar_comentario')
    @endcan
    <!-- Modal denunciar anúncio -->
    @include('painel.anuncios._modal_denunciar_anuncio', ['anuncio' => $anuncio])
@endsection
