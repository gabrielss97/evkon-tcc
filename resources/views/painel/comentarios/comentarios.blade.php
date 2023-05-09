@extends('layouts.painel.app')
@section('titulo', 'Comentários')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <!-- Comentários -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">
                <!-- Comentários -->
                <h2 class="h4 card-title fw-bold mb-4">Comentários ({{ $comentarios->total() }} total)</h2>
                @if ($comentarios->total() == 0)
                    <div class="">Não há comentários</div>
                @endif
                <!-- Itens -->
                <div class="text-center text-md-start">
                    @foreach ($comentarios as $comentario)
                        <div class="d-flex flex-column flex-md-row mb-4 pb-3 pb-md-0">
                            <div class="">
                                <img src="{{ asset($comentario->user->foto == null ? 'assets/img/profile.png' : $comentario->user->foto) }}"
                                    alt="" class="rounded-circle" style="width: 60px; height: 60px">
                            </div>
                            <div class="me-lg-auto px-md-3 mt-3 mt-md-0">
                                <h3 class="h5">
                                    {{ $comentario->user->nome }} {{ $comentario->user->sobrenome }}
                                </h3>
                                <p class="">
                                    {{ Str::limit($comentario->msg, 150) }}
                                </p>
                                <div class="text-muted small">
                                    Publicado em <a class="link-secondary"
                                        href="{{ route('anuncios.show', $comentario->anuncio->id) }}"
                                        class="">{{ $comentario->anuncio->titulo }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center pt-4 pb-3 d-flex justify-content-center">
                        {{ $comentarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
