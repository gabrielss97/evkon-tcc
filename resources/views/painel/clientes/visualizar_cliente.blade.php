@extends('layouts.painel.app')
@section('titulo', 'Cliente')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 fw-bold">Cliente</h1>
            </div>
            <!-- Informações gerais -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="card border-0 bg-white mt-4">
                    <div class="card-body p-4">
                        <h2 class="h5 card-title fw-bold mb-4 text-center">Informações gerais</h2>

                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">Nome</small>
                            <div class="">
                                {{ $cliente->nome }}
                                {{ $cliente->sobrenome }}
                            </div>
                        </div>
                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">Status da conta</small>
                            <div class="">
                                @if ($cliente->status == 'ativo')
                                <span class="text-success"><i class="fa-regular fa-circle-check fa-sm"></i> Ativo</span>
                                @else
                                <span class="text-danger"><i class="fa-solid fa-ban fa-sm"></i> Desativado</span>
                                @endif
                            </div>
                        </div>
                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">Sexo</small>
                            <div class="">
                                {{ $cliente->sexo }}
                            </div>
                        </div>
                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">Data de nascimento</small>
                            <div class="">
                                @if ($cliente->dt_nasc)
                                    {{ date('d/m/Y', strtotime($cliente->dt_nasc)) }}
                                @else
                                    Não informado
                                @endif
                            </div>
                        </div>
                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">E-mail</small>
                            <div class="">
                                {{ $cliente->email }}
                            </div>
                        </div>
                        <div class="border rounded px-3 py-2 mb-3">
                            <small class="text-muted">Telefone</small>
                            <div class="">
                                @if ($cliente->telefone)
                                    {{ $cliente->telefone }}
                                @else
                                    Não informado
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-5">
                <div class="row">
                    <!-- Foto do perfil -->
                    <div class="col-12" id="ft">
                        <div class="card border-0 bg-white mt-4">
                            <div class="card-body p-4">
                                <img src="{{ asset($cliente->foto == null ? 'assets/img/profile.png' : $cliente->foto) }}" alt="" class="w-100 border-radius-10px">
                                <div class="mt-2 text-center">
                                    <!-- Carregar Foto -->
                                    <div class="link-danger fw-semi-bold-1 text-decoration-none small">
                                        Foto de perfil
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ações -->
                    <div class="col-12 mb-3">
                        <div class="card border-0 bg-white mt-2">
                            <div class="card-body p-4">
                                <h2 class="h6 text-center card-title fw-bold mb-4">Ações</h2>
                                <div class="text-muted text-center">
                                    @if ($cliente->status == 'ativo')
                                        <a name="" id="" class="btn btn-danger  rounded-pill px-3"
                                            href="{{ route('clientes.desativar', $cliente->id) }}" role="button">
                                            <i class="fa-solid fa-ban"></i>
                                            Desativar
                                        </a>
                                    @else
                                        <a name="" id="" class="btn btn-success  rounded-pill px-3"
                                            href="{{ route('clientes.ativar', $cliente->id) }}" role="button">
                                            <i class="fa-regular fa-circle-check"></i>
                                            Ativar
                                        </a>
                                    @endif
                                    <a name="" id="" class="btn btn-dark  rounded-pill px-3"
                                        href="{{ route('clientes.remover', $cliente->id) }}" role="button"
                                        onclick="return confirm('Tem certeza na remoção desse cliente?')">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Remover
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
