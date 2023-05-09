@extends('layouts.painel.app')
@section('titulo', 'Pedidos de Contato')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        <!-- Pesquisa -->
        <div class="">
            <div class="mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto" style="max-width: 500px">
                        <form action="{{ route('colaboradores.index') }}" method="get">
                            <div class="d-flex align-items-center gap-3 pesquisar-colaborador rounded-3">
                                <div class="d-flex align-items-center w-100">
                                    <label for="local" class="ps-3">
                                        <i class="fa-solid fa-magnifying-glass text-muted fa-sm"></i>
                                    </label>
                                    <input type="text"
                                        class="form-control border-0 shadow-none border-2 bg-transparent w-100"
                                        name="colaborador" id="local" aria-describedby="helpId"
                                        placeholder="Colaborador" value="{{ request()->get('colaborador') }}">
                                </div>

                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-indigo px-3 py-2 rounded-3">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (request()->get('colaborador'))
                <!-- Resultado da pesquisa -->
                <div class="pt-4">
                    <div class="fs-5 fw-bold mb-2">{{ $colaboradores->total() }} Resultados</div>
                </div>
            @endif
        </div>

        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">

                <!-- Colaboradores -->
                <h2 class="h4 card-title fw-bold mb-4">Colaboradores</h2>
                @if ($colaboradores->total() == 0)
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
                                            href="{{ route('colaboradores.desativar', $colaborador->id) }}" role="button">
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
                                    <a name="" id="" class="btn btn-outline-dark btn-sm rounded-pill px-3"
                                        href="{{ route('colaboradores.remover', $colaborador->id) }}" role="button"
                                        onclick="return confirm('Tem certeza na remoção desse colaborador?')">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Remover
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="text-center pt-4 pb-3 d-flex justify-content-center">
                        {{ $colaboradores->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
