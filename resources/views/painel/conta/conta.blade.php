@extends('layouts.painel.app')
@section('titulo', 'Conta')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <div class="row">
            <!-- Informações gerais -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="card border-0 bg-white mt-4">
                    <div class="card-body p-4">
                        <h2 class="h5 card-title fw-bold mb-4 text-center">Informações gerais <img
                                src="{{ asset('assets/img/emot_sorrindo.png') }}" width=17 height=17></h2>

                        <!-- Formulário -->
                        <form action="{{ route('painel.conta.atualizar') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                    id="nome" name="nome" placeholder="Nome"
                                    value="{{ old('nome', Auth::user()->nome) }}" required>
                                <label for="nome">Nome</label>
                                @error('nome')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('sobrenome') is-invalid @enderror"
                                    id="sobrenome" name="sobrenome" placeholder="Sobrenome"
                                    value="{{ old('sobrenome', Auth::user()->sobrenome) }}" required>
                                <label for="sobrenome">Sobrenome</label>
                                @error('sobrenome')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select @error('sexo') is-invalid @enderror" id="sexo"
                                    name="sexo" required>
                                    <option value="" selected>Selecione seu sexo</option>
                                    <option value="Masculino" @if (old('sexo', Auth::user()->sexo) == 'Masculino') selected @endif>
                                        Masculino
                                    </option>
                                    <option value="Feminino" @if (old('sexo', Auth::user()->sexo) == 'Feminino') selected @endif>
                                        Feminino
                                    </option>
                                    <option value="Outro" @if (old('sexo', Auth::user()->sexo) == 'Outro') selected @endif>
                                        Outro
                                    </option>
                                </select>
                                <label for="sexo">Sexo</label>
                                @error('sexo')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('dt_nasc') is-invalid @enderror"
                                    id="dt_nasc" name="dt_nasc" placeholder="Data de nascimento"
                                    value="{{ old('dt_nasc', Auth::user()->dt_nasc) }}" required>
                                <label for="dt_nasc">Data de nascimento</label>
                                @error('dt_nasc')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="E-mail"
                                    value="{{ old('email', Auth::user()->email) }}" required>
                                <label for="email">E-mail</label>
                                @error('email')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('telefone') is-invalid @enderror"
                                    id="telefone" name="telefone" placeholder="Telefone"
                                    value="{{ old('telefone', Auth::user()->telefone) }}" required>
                                <label for="telefone">Telefone</label>
                                @error('telefone')
                                    <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                @enderror
                            </div>

                            @can('colaborador')
                                <div class="mb-3">
                                    <label for="sobre" class="form-label visually-hidden">Sobre</label>
                                    <textarea class="form-control input-custom @error('sobre') is-invalid @enderror" name="sobre" id="sobre"
                                        rows="4" placeholder="Sobre" required>{{ old('sobre', Auth::user()->sobre) }}</textarea>
                                    @error('sobre')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                            @endcan

                            <div class="text-center pt-2">
                                <button type="submit" class="btn btn-success rounded-3 px-5 py-2">
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-5">
                <div class="row">
                    <!-- Foto do perfil -->
                    <div class="col-12" id="ft">
                        <div class="card border-0 bg-white mt-4">
                            <div class="card-body p-4">
                                <img src="{{ asset(Auth::user()->foto == null ? 'assets/img/profile.png' : Auth::user()->foto) }}"
                                    alt="" class="w-100 border-radius-10px">
                                <div class="mt-2 text-center">

                                    <!-- Carregar Foto -->
                                    <form action="{{ route('painel.conta.atualizar-foto') }}" method="post" id="form-foto"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="foto" class="link-danger fw-semi-bold-1 text-decoration-none small"
                                            style="cursor: pointer">
                                            Carregar uma nova foto
                                            <i class="fa-solid fa-download fa-sm ms-2"></i>
                                        </label>
                                        <input type="file" class="visually-hidden" name="foto" id="foto"
                                            aria-describedby="helpId" placeholder="" accept="image/*" required
                                            onchange="document.querySelector('#form-foto').submit()">

                                        @error('foto')
                                            <div class="text-danger small fw-bold p-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mudar Senha -->
                    <div class="col-12 mb-3">
                        <div class="card border-0 bg-white mt-4">
                            <div class="card-body p-4">
                                <h2 class="h6 text-center card-title fw-bold mb-4">Mudar a senha <img
                                        src="{{ asset('assets/img/icon_lock.png') }}" width=14 height=14>
                                </h2>

                                <!-- Formulário -->
                                <form action="{{ route('painel.conta.atualizar-senha') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-floating mb-3">
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            id="current_password" name="current_password" placeholder="Antiga Senha"
                                            required>
                                        <label for="current_password">Antiga Senha</label>
                                        @error('current_password')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Nova Senha" required>
                                        <label for="password">Nova Senha</label>
                                        @error('password')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirmar Nova Senha" required>
                                        <label for="password_confirmation">Confirmar Nova Senha</label>

                                    </div>

                                    <div class="text-center pt-2">
                                        <button type="submit" class="btn btn-secondary rounded-3 px-5 py-2">
                                            Modificar Senha
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Jquery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 99999-9999');
        });
    </script>
@endsection
