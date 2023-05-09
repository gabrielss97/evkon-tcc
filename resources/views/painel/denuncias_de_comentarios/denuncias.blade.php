@extends('layouts.painel.app')
@section('titulo', 'Denúncias de comentários')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        <!-- Denúncias de comentários -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">

                <h2 class="h4 card-title fw-bold mb-4">Denúncias de comentários
                    ({{ \App\Models\DenunciaComentario::where('status', 'pendente')->count() }} pendentes)</h2>
                <!-- Itens -->
                <div class="text-center text-md-start">
                    @if ($denuncias->total() == 0)
                        <div class="">
                            Não há denúncias.
                        </div>
                    @endif
                    @foreach ($denuncias as $denuncia)
                        <div class="d-flex flex-column flex-md-row mb-4 pb-3 pt-2 pb-md-0">

                            <div class="me-auto px-md-3 mt-3 mt-md-0">

                                <h3 class="h5">
                                    {{ $denuncia->user->nome }} {{ $denuncia->user->sobrenome }}
                                    @if ($denuncia->status == 'pendente')
                                        <span class="badge rounded-pill bg-warning text-dark px-2 py-1"
                                            style="font-size: 11px">Pendente</span>
                                    @endif
                                    @if ($denuncia->status == 'removido')
                                        <span class="badge rounded-pill bg-danger text-dark px-2 py-1"
                                            style="font-size: 11px">Removido</span>
                                    @endif
                                    @if ($denuncia->status == 'nao_removido')
                                        <span class="badge rounded-pill bg-success text-dark px-2 py-1 text-white"
                                            style="font-size: 11px">Não removido</span>
                                    @endif
                                </h3>

                                <div class="mb-2 small">
                                    Motivo: {{ $denuncia->motivo }}
                                </div>
                                <p class="">
                                    Comentário: {{ $denuncia->comentario->msg }}
                                </p>
                                <div class="text-muted small">
                                    <a name="" id="" class="btn btn-outline-primary btn-sm rounded-pill"
                                        href="{{ route('anuncios.show', $denuncia->comentario->anuncio->id) }}?den={{ $denuncia->comentario->id }}#com{{ $denuncia->comentario->id }}"
                                        role="button">
                                        <i class="fa-regular fa-eye"></i>
                                        Visualizar
                                    </a>
                                    <a name="" id="" class="btn btn-outline-danger btn-sm rounded-pill"
                                        href="{{ route('remover-comentario', $denuncia->comentario->id) }}" onclick="return confirm('Tem certeza na remoção desse comentário?')">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Remover
                                    </a>
                                    @if ($denuncia->status == 'pendente')
                                        <a name="" id="" class="btn btn-outline-success btn-sm rounded-pill"
                                            href="{{ route('nao-remover-comentario-denunciado', [$denuncia->id, $denuncia->comentario->id]) }}"
                                            role="button">
                                            <i class="fa-regular fa-circle-check"></i>
                                            Não remover
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="text-center pt-4 pb-3 d-flex justify-content-center">
                        <!-- Paginação -->
                        {{ $denuncias->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
