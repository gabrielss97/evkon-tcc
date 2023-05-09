@extends('layouts.painel.app')
@section('titulo', 'Clientes')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        <!-- Pesquisa -->
        <div class="">
            <div class="mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto" style="max-width: 500px">
                        <form action="{{ route('clientes') }}" method="get">
                            <div class="d-flex align-items-center gap-3 pesquisar-colaborador rounded-3">
                                <div class="d-flex align-items-center w-100">
                                    <label for="local" class="ps-3">
                                        <i class="fa-solid fa-magnifying-glass text-muted fa-sm"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control border-0 shadow-none border-2 bg-transparent w-100"
                                        name="cliente" id="local" aria-describedby="helpId" placeholder="Cliente"
                                        value="{{ request()->get('cliente') }}">
                                </div>

                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-indigo px-3 py-2 rounded-3">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (request()->get('cliente'))
                <!-- Resultado da pesquisa -->
                <div class="pt-4">
                    <div class="fs-5 fw-bold mb-2">{{ $clientes->total() }} Resultados</div>
                </div>
            @endif
        </div>

        <!-- Clientes -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">

                <!-- Meus Clientes -->
                <h2 class="h4 card-title fw-bold mb-4 pb-2">Clientes</h2>
                @if ($clientes->total() == 0)
                    <div class="">Não há clientes.</div>
                @endif
                <!-- Lista clientes -->
                <div class="text-center">
                    <div class="row gy-3">
                        @foreach ($clientes as $cliente)
                            <div class="col-12 col-lg-4">
                                <div class="mb-4 ">
                                    <div class="">
                                        <a href="{{ route('clientes.visualizar-cliente', $cliente->id) }}" class="">
                                            <img src="{{ asset($cliente->foto == null ? 'assets/img/profile.png' : $cliente->foto) }}"
                                                alt="" class="border-radius-10px mb-3" style="width: 120px">
                                        </a>
                                    </div>
                                    <div class="me-auto mt-3 mt-md-0">

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
                    <div class="text-center pt-4 pb-3 d-flex justify-content-center">
                        {{ $clientes->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
