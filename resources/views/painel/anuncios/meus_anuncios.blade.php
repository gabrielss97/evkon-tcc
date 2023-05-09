@extends('layouts.painel.app')
@section('titulo')
    Meus Anúncios
@endsection
@section('content')
    <div class="container pt-5 mt-2 pb-5">
        <h1 class="fw-bold mb-5">Meus Anúncios</h1>
        @if (request()->get('cat'))
            <h2 class=" h4 fw-bold text-center mt-4">
                Categoria:
                @php
                    $cat= \App\Models\Categoria::find(request()->get('cat'));
                    echo isset($cat->nome) ? $cat->nome: 'Não encontrado';
                @endphp
            </h2>
        @endif

        <!-- Pesquisa -->
        <div class="mt-5">
            <div class="row">
                <div class="col-12 col-md-9 mx-auto div-pesquisa">
                    <form action="{{ route('anuncios.meus-anuncios') }}" method="get">
                        <div class="d-flex align-items-center gap-3 pesquisar-colaborador rounded-3">
                            <!-- Input Pesquisa -->
                            <div class="d-flex align-items-center input-pesq">
                                <label for="local" class="ps-1 ps-lg-3">
                                    <i class="fa-solid fa-magnifying-glass text-muted fa-sm"></i>
                                </label>
                                <input type="text"
                                    class="form-control border-0 shadow-none border-end border-2 bg-transparent"
                                    name="local" id="local" aria-describedby="helpId" placeholder="Local do evento"
                                    style="width: 250px" value="{{ request()->get('local') }}">
                            </div>

                            <div class="d-flex align-items-center input-pesq">
                                <select class="form-select bg-transparent border-0 shadow-none border-end border-2 selecionar-categoria "
                                    name="cat" id="" style="max-width: 190px; min-width: 100px">
                                    <option value="" class="text-muted" selected>Categoria</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}"
                                            @if (request()->get('cat') == $item->id) selected @endif>
                                            {{ $item->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Localização -->
                            <div class="selecionar-endereco input-pesq" style="min-width: 150px; ">
                                <div class="dropdown">
                                    <button class="btn btn-none shadow-none p-0 text-muted text-truncate w-100 text-start"
                                        type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" style="overflow: hidden">
                                        <i class="fa-solid fa-location-dot fa-sm "></i>
                                        <span id="text-localidade">
                                            @if (request()->get('estado') && request()->get('cidade'))
                                                {{ request()->get('cidade') }}, {{ request()->get('estado') }}
                                            @else
                                                Brasil
                                            @endif
                                        </span>
                                    </button>
                                    <div class="dropdown-menu border-radius-10px shadow-lg border-light py-2"
                                        aria-labelledby="triggerId" style="width: 250px">
                                        <div class="px-3">
                                            <!-- Selecionar estado e ciade -->
                                            <div class="mb-3">
                                                <label for="estado" class="form-label">Estado</label>
                                                <select class="form-select shadow-none" name="estado" id="estado">
                                                    <option value="" selected>Selecioner um estado</option>
                                                    <option value="AC">Acre</option>
                                                    <option value="AL">Alagoas</option>
                                                    <option value="AP">Amapá</option>
                                                    <option value="AM">Amazonas</option>
                                                    <option value="BA">Bahia</option>
                                                    <option value="CE">Ceará</option>
                                                    <option value="DF">Distrito Federal</option>
                                                    <option value="ES">Espírito Santo</option>
                                                    <option value="GO">Goiás</option>
                                                    <option value="MA">Maranhão</option>
                                                    <option value="MT">Mato Grosso</option>
                                                    <option value="MS">Mato Grosso do Sul</option>
                                                    <option value="MG">Minas Gerais</option>
                                                    <option value="PA">Pará</option>
                                                    <option value="PB">Paraíba</option>
                                                    <option value="PR">Paraná</option>
                                                    <option value="PE">Pernambuco</option>
                                                    <option value="PI">Piauí</option>
                                                    <option value="RJ">Rio de Janeiro</option>
                                                    <option value="RN">Rio Grande do Norte</option>
                                                    <option value="RS">Rio Grande do Sul</option>
                                                    <option value="RO">Rondônia</option>
                                                    <option value="RR">Roraima</option>
                                                    <option value="SC">Santa Catarina</option>
                                                    <option value="SP">São Paulo</option>
                                                    <option value="SE">Sergipe</option>
                                                    <option value="TO">Tocantins</option>
                                                    <option value="EX">Estrangeiro</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <select class="form-select shadow-none" name="cidade" id="cidade"
                                                    disabled>
                                                </select>
                                            </div>
                                            <div class="mb-2 text-end">
                                                <button type="button" class="btn btn-success  py-1 px-2 rounded-3"
                                                    id="add-localidade" disabled>
                                                    <i class="fa-solid fa-check fa-sm"></i>
                                                    Adicionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto pesquisar-colaborador-btn">
                                <button type="submit" class="btn btn-indigo px-3 py-2 rounded-3">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Resultado da pesquisa -->
        <div class="pt-5">
            <h2 class="h4 fw-bold mb-4 pb-2">{{ $anuncios->total() }} Locais de eventos disponíveis</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-3">
            @foreach ($anuncios as $anuncio)
                <div class="">
                    <a href="{{ route('anuncios.show', $anuncio->id) }}" class="link-dark text-decoration-none">
                        <div class="bg-F5F5F5 rounded-3">
                            <div class="card bg-dark text-white border-0 rounded-3">
                                @php
                                    $imgs= json_decode($anuncio->imgs);
                                    $img= [];
                                    foreach ($imgs as $key => $value) {
                                        $img[]= $value;
                                    }
                                @endphp
                                <img src="{{ asset($img[0]) }}" class="card-img rounded-3"
                                    alt="...">
                                <div class="card-img-overlay d-flex align-items-end ">
                                    <h5 class="card-title text-shadown fw-bold">{{ $anuncio->titulo }}</h5>
                                </div>
                            </div>
                            <div class="pb-4 pt-2 px-3 fw-bold">
                                <div class="">
                                    <span class="text-muted"> <i class="fa-regular fa-comment-dots"></i> ({{ $anuncio->comentarios->count() }}) Comentários</span> 
                                </div>
                                <div class="pt-2">
                                    {{ Str::limit($anuncio->descricao_local, 60) }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Paginate -->
        <div class="mt-4 pt-2 d-flex justify-content-center">
            {{ $anuncios->withQueryString()->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Obter cidade do estado selecionado
        document.getElementById('estado').onchange = function() {

            document.getElementById('cidade').disabled = true
            document.getElementById('add-localidade').disabled = true

            let uf = this.value
            fetch('https://brasilapi.com.br/api/ibge/municipios/v1/' + uf + '?providers=dados-abertos-br,gov,wikipedia')
                .then((resp) => resp.json())
                .then(function(data) {

                    document.getElementById('cidade').innerHTML = ''
                    for (i in data) {
                        let option = document.createElement('option')
                        option.value = data[i].nome
                        option.innerHTML = data[i].nome
                        // codigo_ibge

                        if (data[i].nome == undefined)
                            continue;

                        document.getElementById('cidade').appendChild(option)
                        document.getElementById('cidade').disabled = false
                    }

                    let estado = document.getElementById('estado').value
                    let cidade = document.getElementById('cidade').value

                    if (estado != '' && cidade != '') {
                        document.getElementById('add-localidade').disabled = false
                    }

                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        document.getElementById('cidade').onchange = function() {
            document.getElementById('add-localidade').disabled = false
        }

        document.getElementById('add-localidade').onclick = function(params) {
            let estado = document.getElementById('estado').value
            let cidade = document.getElementById('cidade').value


            console.log(estado, cidade)
            document.getElementById('text-localidade').innerHTML = `${cidade}, ${estado}`;
            document.getElementById('add-localidade').disabled = true
        }
    </script>
@endsection
