@extends('layouts.inicio.app')
@section('titulo', 'Inscrição Colaborador')

@section('css')
    <style>
        #tornar-colaborador {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            <div class="pt-2">
                <div class="row">
                    <div class="col-12 col-md-5 mx-auto">
                        <div class="text-center fs-5 lh-1 pb-3 mb-1 " style="font-weight: 500">
                            Participar de eventos é sua paixão?
                            Então se torne um dos nossos colaboradores
                        </div>
                        <!-- Criar perfil -->
                        <div class="card border-2 border-radius-10px" style="border-color: #fcc748">
                            <div class="card-body p-3 px-md-5 p-md-4">
                                <div class="px-2 py-3">
                                    <h1 class="card-title text-center h3 pb-2">Criar meu perfil</h1>
                                    <!-- Inscrição por redes sociais -->
                                    <div class="mt-3">
                                        <a href="{{ route('socialite.redirect', ['provider' => 'facebook', 'conta' => 'colaborador']) }}"
                                            class="btn btn-facebook w-100 rounded-pill" style="padding: 8px 15px;">
                                            <i class="fa-brands fa-facebook me-3"></i>
                                            Inscrição via Facebook
                                        </a>
                                        <a href="{{ route('socialite.redirect', ['provider' => 'google', 'conta' => 'colaborador']) }}"
                                            class="btn btn-light bg-white border w-100 rounded-pill mt-2"
                                            style="padding: 8px 15px;">
                                            <img src="{{ asset('assets/img/logo_google.svg') }}" alt=""
                                                width="16" height="16" class="me-3">
                                            Inscrição via Google
                                        </a>
                                    </div>
                                    <!-- Divisor -->
                                    <div class="d-flex align-items-center my-3">
                                        <hr class="w-100" style="background: #b2b4b6">
                                        <div class="px-2 pb-1 text-muted">ou</div>
                                        <hr class="w-100" style="background: #b2b4b6">
                                    </div>
                                    <!-- Formulário -->
                                    <form action="{{ route('inscricao-colaborador-post') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-12">
                                                <label for="nome" class="form-label visually-hidden">Nome</label>
                                                <input type="text"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('nome') is-invalid @enderror"
                                                    name="nome" id="nome" placeholder="Nome"
                                                    value="{{ old('nome') }}" required>
                                                @error('nome')
                                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-12 col-md-12">
                                                <label for="sobrenome" class="form-label visually-hidden">Sobrenome</label>
                                                <input type="text"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('sobrenome') is-invalid @enderror"
                                                    name="sobrenome" id="sobrenome" placeholder="Sobrenome"
                                                    value="{{ old('sobrenome') }}" required>
                                                @error('sobrenome')
                                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="email" class="form-label visually-hidden">E-mail</label>
                                                <input type="email"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('email') is-invalid @enderror"
                                                    name="email" id="email" placeholder="E-mail"
                                                    value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-12">
                                                <label for="sexo" class="form-label visually-hidden">Sexo</label>
                                                <select
                                                    class="form-select form-control-login rounded-0 shadow-none bg-F5F5F5 @error('sexo') is-invalid @enderror"
                                                    name="sexo" id="sexo" required>
                                                    <option value="" selected>Selecione seu sexo</option>
                                                    <option value="Masculino"
                                                        @if (old('sexo') == 'Masculino') selected @endif>
                                                        Masculino
                                                    </option>
                                                    <option value="Feminino"
                                                        @if (old('sexo') == 'Feminino') selected @endif>Feminino
                                                    </option>
                                                    <option value="Outro"
                                                        @if (old('sexo') == 'Outro') selected @endif>Outro
                                                    </option>
                                                </select>
                                                @error('sexo')
                                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3  col-12">
                                                <label for="password" class="form-label visually-hidden">Senha</label>
                                                <input type="password"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('password') is-invalid @enderror"
                                                    name="password" id="password" placeholder="Senha" required>
                                                @error('password')
                                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3  col-12">
                                                <label for="password-confirm" class="form-label visually-hidden">Confirmar
                                                    senha</label>
                                                <input type="password"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5"
                                                    name="password_confirmation" id="password-confirm"
                                                    placeholder="Confirmar senha" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-warning w-100 rounded-pill"
                                                    style="padding: 10px 15px; font-weight: 500">
                                                    Inscrição por e-mail
                                                </button>
                                                <div class="text-center mt-2" style="font-size: 11px">
                                                    Ao se cadastrar, você concorda com nossas
                                                    <a class="link-dark" href="{{ route('politica-de-privacidade') }}">
                                                        políticas de privacidade
                                                    </a> e
                                                    <a class="link-dark" href="{{ route('termos-de-uso') }}">
                                                        termos de uso
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Como se tornar um eventer -->
        <section>
            <div class="container mt-5 pt-5 mb-5">
                <h2 class="text-center">Como se tornar um Colaborador</h2>
            </div>
            <div class="py-4" style="background: #fff8e5">
                <div class="container">
                    <div class="col-12 col-md-8 mx-auto ">
                        <div class="pb-3 pt-3 my-4">

                            <div class="row  gy-3 align-items-center">
                                <div class="col-12 col-md-5 order-2 order-lg-1">
                                    <img src="{{ asset('assets/img/ilu_cadastro.svg') }}" alt="" class="w-100">
                                </div>
                                <div class="col-12 col-md-7 order-1 order-lg-2">
                                    <div class="fs-4 fw-bold" style="color: #fa8f24">
                                        <i class="text-dark">1.</i>
                                        Crie uma conta com seus dados pessoais para ter acesso ao painel de usuário.
                                    </div>
                                </div>
                            </div>

                            <div class="row  gy-3 align-items-center mt-4">
                                <div class="col-12 col-md-7">
                                    <div class="fs-4 fw-bold" style="color: #fa8f24">
                                        <i class="text-dark">2.</i>
                                        Crie anúncios para divulgar seu trabalho e conseguir clientes.
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <img src="{{ asset('assets/img/ilu_anunciar.svg') }}" alt="" class="w-100">
                                </div>
                            </div>

                            <div class="row  gy-3 align-items-center mt-4">
                                <div class="col-12 col-md-5 order-2 order-lg-1">
                                    <img src="{{ asset('assets/img/ilu_chat.svg') }}" alt="" class="w-100">
                                </div>
                                <div class="col-12 col-md-7 order-1 order-lg-2">
                                    <div class="fs-4 fw-bold" style="color: #fa8f24">
                                        <i class="text-dark">3.</i>
                                        Fale com os clientes que entram em contato com você para discutir o serviço
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
