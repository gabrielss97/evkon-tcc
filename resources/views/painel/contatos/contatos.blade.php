@extends('layouts.painel.app')
@section('titulo', 'Contatos')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <!-- Contatos -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">
                <h2 class="h4 card-title fw-bold mb-4">Contatos
                    ({{ \App\Models\Contato::where('status', 'novo')->count() }} novos)
                </h2>
                @if (count($contatos) == 0)
                        <div class="">Não há contatos.</div>
                    @endif
                <!-- Itens -->
                <div class="text-center text-md-start">
                    @foreach ($contatos as $contato)
                        <div class="d-flex flex-column flex-md-row mb-4 pb-3 pt-2 pb-md-0">

                            <div class="me-auto px-md-3 mt-3 mt-md-0">

                                <a href="{{ route('contatos.visualizar-contato', $contato->id) }}"
                                    class="link-dark text-decoration-none">
                                    <h3 class="h5">
                                        {{ $contato->nome }}
                                        @if ($contato->status == 'novo')
                                            <span class="badge rounded-pill bg-success text-white px-2 py-1"
                                                style="font-size: 11px">
                                                Novo
                                            </span>
                                        @endif
                                    </h3>
                                    <p class="mb-2">
                                        {{ Str::limit($contato->mensagem, 200) }}
                                    </p>
                                    <div class="mb-3 small text-muted">
                                        <i class="fa-solid fa-calendar-days fa-sm"></i> Enviado em
                                        {{ $contato->created_at->format('d/m/Y \\à\\s H:i') }}
                                    </div>
                                </a>
                                <div class="text-muted small">
                                    @if ($contato->status == 'novo')
                                        <a name="" id=""
                                            class="btn btn-outline-success btn-sm rounded-pill px-3"
                                            href="{{ route('contatos.visualizado', $contato->id) }}">
                                            <i class="fa-regular fa-circle-check"></i>
                                            Visualizado
                                        </a>
                                    @endif

                                    <a class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                        href="{{ route('contatos.remover', $contato->id) }}"
                                        onclick="return confirm('Tem certeza na remoção desse contato?')">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Remover
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="text-center pt-4 pb-3 d-flex justify-content-center">
                        {{ $contatos->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
