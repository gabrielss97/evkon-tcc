@extends('layouts.inicio.app')
@section('titulo', 'Tenha seu evento')

@section('content')
    <section>
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-12 col-md-7 order-2 order-lg-1">
                    <div class="pt-5 pt-lg-0"></div>
                    <div class="pt-5 pt-lg-0"></div>
                    <h1 class="display-4 fw-bold text-center text-lg-start">Encontre os melhores profissionais para ter o evento dos sonhos</h1>
                    <!-- Opções de festas -->
                    <div class="mt-5 selecionar-festa">
                        <button
                            class="btn border border-secondary w-auto fs-4 text-indigo border-radius-10px px-4 botao-selecionar-festa-inicio shadow-sm"
                            type="button" data-bs-toggle="collapse" data-bs-target="#selecionar-festa-opcoes"
                            aria-expanded="false" aria-controls="collapseExample">
                            Qual festa vamos organizar?
                            <i class="fa-solid fa-chevron-down text-muted  ms-3"></i>
                        </button>
                        <div class="collapse shadow bg-white" id="selecionar-festa-opcoes">
                            <div class="px-2 p-3 c-body">

                                @foreach ($categorias as $item)
                                    <a class="dropdown-item rounded-pill"
                                        href="{{ route('anuncios.index', ['cat' => $item->id]) }}">
                                        {{ $item->nome }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Imagens -->
                <div class="col-12 col-md-5 pt-5 mt-5 pt-lg-0 mt-lg-0 order-1 order-lg-2">
                    <div class="pt-5 pt-lg-0 mt-3 mt-lg-0"></div>
                    <div class="d-flex justify-content-center">
                        <div class=" text-end" style="margin-top: -70px">
                            <img src="{{ asset('assets/img/img_perfil_3.jpg') }}" alt=""
                                class="rounded-circle d-inline-block" width="200" height="200">
                            <img src="{{ asset('assets/img/img_perfil_2.jpg') }}" alt=""
                                class="rounded-circle d-inline-block mt-2" width="200" height="200">
                        </div>
                        <div class="" style="margin-bottom: -70px; margin-left: -5px">
                            <img src="{{ asset('assets/img/img_perfil_1.jpg') }}" alt=""
                                class="rounded-circle d-inline-block" width="200" height="200">
                            <img src="{{ asset('assets/img/img_perfil_4.jpg') }}" alt=""
                                class="rounded-circle d-inline-block mt-2" width="200" height="200">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Passo a passo -->
    <section>
        <div class="bg-F5F5F5 pt-5 pt-lg-0 mt-5 mt-lg-0">
            <div class="container py-5">
                <h2 class="h1 fw-bold mx-auto text-center" style="max-width: 850px;">
                    Monte sua festa sem stress, pode deixar tudo com a gente, tudo que precisa fazer é:
                </h2>

                <div class="row gy-3 py-2 pt-5 justify-content-center align-items-center">
                    <div class="col-12 col-md-5">
                        <h3 class="h2 text-indigo fw-bold">1. Selecionar o tipo de festa</h3>
                        <p class="fs-5 " style="font-weight: 600">
                            Pense bem no tipo de festa que pretende montar e selecione, isso afetara a lista de indicações
                            que passaremos na sua conta
                        </p>
                    </div>
                    <div class="col-12 col-md-5 text-center">
                        <img src="{{asset('assets/img/ilu_selecionar_festa.svg')}}" alt="" class="img-oq-fazer" width="300">
                    </div>
                </div>

                <div class="row gy-3 py-2 pt-5 justify-content-center align-items-center">
                    <div class="col-12 col-md-5 text-center order-2 order-lg-1">
                        <img src="{{asset('assets/img/ilu_escolher_local.svg')}}" alt="" class=" img-oq-fazer" width="300">
                    </div>
                    <div class="col-12 col-md-5 order-1 order-lg-2">

                        <h3 class="h2 text-indigo fw-bold">2. Escolha o melhor local para sua festa</h3>
                        <p class="fs-5 " style="font-weight: 600">
                            Listaremos todos os locais disponíveis para você e você poderá selecionar sua cidade para obter
                            um resultado de pesquisa mais preciso.
                        </p>
                    </div>
                </div>

                <div class="row gy-3 py-2 pt-5 justify-content-center align-items-center">
                    <div class="col-12 col-md-5">
                        <h3 class="h2 text-indigo fw-bold">3. Conecte-se com nossos colaboradores</h3>
                        <p class="fs-5 " style="font-weight: 600">
                            Iremos recomendar todos os tipos de profissionais que se encaixam no perfil de festa que você
                            está montando, porém sinta-se a vontade para incluir ou excluir qualquer tipo de serviço
                        </p>
                    </div>
                    <div class="col-12 col-md-5 text-center">
                        <img src="{{asset('assets/img/ilu_conectar_com_colaborador.svg')}}" alt="" class="img-oq-fazer" width="300">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Carousel com imagens -->
    <section>
        <div class="bg-white">
            <div class="container pb-4 py-5">
                <h2 class="h1 fw-bold mx-auto text-center" style="max-width: 850px;">
                    Aonde a magia acontece
                </h2>
            </div>
        </div>
        <div class="bg-F5F5F5 mb-5 py-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width: 100vw">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex flex-carousel">
                            <img src="/assets/img/ilu_eventos_1.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_2.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_3.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_4.jpg" class="carousel-img" alt="Ilustração de evento">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex flex-carousel">
                            <img src="/assets/img/ilu_eventos_5.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_6.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_7.jpg" class="carousel-img" alt="Ilustração de evento">
                            <img src="/assets/img/ilu_eventos_8.jpg" class="carousel-img" alt="Ilustração de evento">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-circle-chevron-left fa-2x"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <i class="fa-solid fa-circle-chevron-right fa-2x"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

@endsection
