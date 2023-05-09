@extends('layouts.painel.app')
@section('titulo', 'Ver Contato')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 fw-bold">Ver Contato</h1>
            </div>
            <!-- Informações -->
            <div class="col-12">
                <div class="card border-0 bg-white mt-4">
                    <div class="card-body p-4">
                        <div class="pt-2">
                            <div class="mb-1">
                                <strong>Nome:</strong> {{ $contato->nome }}
                            </div>
                            <div class="mb-1">
                                <strong>E-mail:</strong> {{ $contato->email }}
                            </div>
                            <div class="mb-1">
                                <strong>Data de envio:</strong> {{ $contato->created_at->format('d/m/Y \\à\\s H:i') }}
                            </div>
                            <div class=" mt-3">
                                <strong>Mensagem:</strong>
                                <p class="">
                                    {{ $contato->mensagem }}
                                </p>
                            </div>
                        </div>
                        <div class="text-muted small pt-2">
                            <a class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                href="{{ route('contatos.remover', $contato->id) }}"
                                onclick="return confirm('Tem certeza na remoção desse contato?')">
                                <i class="fa-regular fa-trash-can"></i>
                                Remover
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
