@extends('layouts.painel.app')
@section('titulo', 'Categorias')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        <!-- Categorias -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">

                <h2 class="h4 card-title fw-bold mb-4">Categorias</h2>
                @if (count($categorias) == 0)
                        <div class="">Não há categorias.</div>
                    @endif
                <!-- Lista de categorias -->
                <div class="row">
                    @foreach ($categorias as $categoria)
                        <div class="col-12 col-lg-6 mb-4">
                            <form action="{{ route('categorias.update', $categoria->id) }}" method="post"
                                id="form-{{ $categoria->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="current" value="{{ $categoria->id }}">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('nome') @if (old('current') == $categoria->id) is-invalid @endif  @enderror"
                                        id="nome" name="nome" placeholder="Nome da categoria"
                                        value="{{ old('current') == $categoria->id ? old('nome') : $categoria->nome }}" required>
                                        
                                    <label for="nome">Nome
                                    da categoria</label>
                                    @error('nome')
                                        @if (old('current') == $categoria->id)
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @endif
                                    @enderror
                                </div>
                            </form>
                            <!-- Formulário pra remover categoria -->
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post"
                                onsubmit="return removerCat(this);">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-success btn-sm"
                                    onclick="document.querySelector('#form-{{ $categoria->id }}').submit()">Salvar</button>
                                <button type="submit" class="btn btn-danger btn-sm me-2">Remover</button>
                                <strong>(10 Eventos)</strong>
                            </form>
                        </div>
                    @endforeach
                </div>

                <hr>
                <!-- Adicionar Categoria -->
                <div class=" pb-2">
                    <h2 class="h4 pt-3">Adicionar Categoria</h2>
                    <div class="col-12 col-lg-6">
                        <form action="{{ route('categorias.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="current" value="adicionar">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('nome') @if (old('current') == 'adicionar') is-invalid @endif @enderror"
                                    id="nome" name="nome" placeholder="Nome da categoria"
                                    @if (old('current') == 'adicionar') value="{{ old('nome') }}" @endif required>
                                <label for="nome">Nome da categoria</label>
                                @error('nome')
                                    @if (old('current') == 'adicionar')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @endif
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function removerCat(form) {
            return confirm('Você tem certeza que deseja remover essa categoria? Os eventos também serão removidos.');
        }
    </script>

@endsection
