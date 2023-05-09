@extends('layouts.painel.app')
@section('titulo', 'Criar Anúncio')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 fw-bold">Criar Anúncio</h1>
            </div>
            <!-- Criar Anúncio -->
            <div class="col-12">
                <div class="card border-0 bg-white mt-4">
                    <div class="card-body p-4">
                        <!-- Formulário -->
                        <form action="{{ route('anuncios.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                            id="titulo" name="titulo" placeholder="Título" value="{{ old('titulo') }}"
                                            required>
                                        <label for="titulo">Título</label>
                                        @error('titulo')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <h2 class="h5 mb-2 mt-2 mb-2">Imagens do anúncio, no mínimo 2 com o tamanho de no máximo 2mb
                                    cada
                                </h2>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="img1" class="form-label">Img1</label>
                                    <input type="file"
                                        class="form-control input-custom @error('img1') is-invalid @enderror" name="img1"
                                        id="img1" accept="image/*" required>
                                    @error('img1')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="img2" class="form-label">Img2</label>
                                    <input type="file"
                                        class="form-control input-custom @error('img2') is-invalid @enderror" name="img2"
                                        id="img2" accept="image/*" required>
                                    @error('img2')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="img3" class="form-label">Img3</label>
                                    <input type="file"
                                        class="form-control input-custom @error('img3') is-invalid @enderror" name="img3"
                                        id="img3" accept="image/*">
                                    @error('img3')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="img4" class="form-label">Img4</label>
                                    <input type="file"
                                        class="form-control input-custom @error('img4') is-invalid @enderror" name="img4"
                                        id="img4" accept="image/*">
                                    @error('img4')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-12 mb-3 pb-3">
                                    <label for="img5" class="form-label">Img5</label>
                                    <input type="file"
                                        class="form-control input-custom @error('img5') is-invalid @enderror" name="img5"
                                        id="img5" accept="image/*">
                                    @error('img5')
                                        <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <!-- Estado e cidade -->
                                <div class="col-12 col-lg-5 mb-3">
                                    <div class="fw-semi-bold-1 mb-2">Selecione um estado e uma cidade</div>
                                    <div class="" style="min-width: 150px; ">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-none shadow-none p-0 text-muted text-truncate w-100 text-start border p-3 d-flex justify-content-between"
                                                type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" style="overflow: hidden">

                                                <div class="">
                                                    <i class="fa-solid fa-location-dot fa-sm "></i>
                                                    <span id="text-localidade">
                                                        @if (old('estado') && old('cidade'))
                                                            {{ old('estado') }}, {{ old('cidade') }}
                                                        @else
                                                            Brasil
                                                        @endif
                                                    </span>
                                                </div>

                                                <i class="fa-solid fa-chevron-down ms-3"></i>
                                            </button>
                                            <div class="dropdown-menu border-radius-10px shadow-lg border-light py-2"
                                                aria-labelledby="triggerId" style="width: 250px">
                                                <div class="px-3">
                                                    <!-- Selecionar estado e ciade -->
                                                    <div class="mb-3">
                                                        <label for="estado" class="form-label">Estado</label>
                                                        <select class="form-select shadow-none" name="estado"
                                                            id="estado">
                                                            <option value="" selected>Selecioner um estado</option>
                                                            <option value="AC"
                                                                @if (old('estado') == 'AC') selected @endif>Acre
                                                            </option>
                                                            <option value="AL"
                                                                @if (old('estado') == 'AL') selected @endif>Alagoas
                                                            </option>
                                                            <option value="AP"
                                                                @if (old('estado') == 'AP') selected @endif>Amapá
                                                            </option>
                                                            <option value="AM"
                                                                @if (old('estado') == 'AM') selected @endif>Amazonas
                                                            </option>
                                                            <option value="BA"
                                                                @if (old('estado') == 'BA') selected @endif>Bahia
                                                            </option>
                                                            <option value="CE"
                                                                @if (old('estado') == 'CE') selected @endif>Ceará
                                                            </option>
                                                            <option value="DF"
                                                                @if (old('estado') == 'DF') selected @endif>Distrito
                                                                Federal</option>
                                                            <option value="ES"
                                                                @if (old('estado') == 'ES') selected @endif>Espírito
                                                                Santo</option>
                                                            <option value="GO"
                                                                @if (old('estado') == 'GO') selected @endif>Goiás
                                                            </option>
                                                            <option value="MA"
                                                                @if (old('estado') == 'MA') selected @endif>Maranhão
                                                            </option>
                                                            <option value="MT"
                                                                @if (old('estado') == 'MT') selected @endif>Mato
                                                                Grosso</option>
                                                            <option value="MS"
                                                                @if (old('estado') == 'MS') selected @endif>Mato
                                                                Grosso do Sul</option>
                                                            <option value="MG"
                                                                @if (old('estado') == 'MG') selected @endif>Minas
                                                                Gerais</option>
                                                            <option value="PA"
                                                                @if (old('estado') == 'PA') selected @endif>Pará
                                                            </option>
                                                            <option value="PB"
                                                                @if (old('estado') == 'PB') selected @endif>Paraíba
                                                            </option>
                                                            <option value="PR"
                                                                @if (old('estado') == 'PR') selected @endif>Paraná
                                                            </option>
                                                            <option value="PE"
                                                                @if (old('estado') == 'PE') selected @endif>
                                                                Pernambuco</option>
                                                            <option value="PI"
                                                                @if (old('estado') == 'PI') selected @endif>Piauí
                                                            </option>
                                                            <option value="RJ"
                                                                @if (old('estado') == 'RJ') selected @endif>Rio de
                                                                Janeiro</option>
                                                            <option value="RN"
                                                                @if (old('estado') == 'RN') selected @endif>Rio
                                                                Grande do Norte</option>
                                                            <option value="RS"
                                                                @if (old('estado') == 'RS') selected @endif>Rio
                                                                Grande do Sul</option>
                                                            <option value="RO"
                                                                @if (old('estado') == 'RO') selected @endif>Rondônia
                                                            </option>
                                                            <option value="RR"
                                                                @if (old('estado') == 'RR') selected @endif>Roraima
                                                            </option>
                                                            <option value="SC"
                                                                @if (old('estado') == 'SC') selected @endif>Santa
                                                                Catarina</option>
                                                            <option value="SP"
                                                                @if (old('estado') == 'SP') selected @endif>São
                                                                Paulo</option>
                                                            <option value="SE"
                                                                @if (old('estado') == 'SE') selected @endif>Sergipe
                                                            </option>
                                                            <option value="TO"
                                                                @if (old('estado') == 'TO') selected @endif>
                                                                Tocantins
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cidade" class="form-label">Cidade</label>
                                                        <select class="form-select shadow-none" name="cidade"
                                                            id="cidade"
                                                            @if (!old('cidade')) disabled @endif>
                                                            <option value="" selected>Selecioner uma cidade</option>
                                                            @if (old('cidade'))
                                                                <option value="{{ old('cidade') }}" selected>
                                                                    {{ old('cidade') }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="mb-2 text-end">
                                                        <button type="button"
                                                            class="btn btn-success  py-1 px-2 rounded-3"
                                                            id="add-localidade" disabled>
                                                            <i class="fa-solid fa-check fa-sm"></i>
                                                            Ok
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @error('estado')
                                        <div class="text-danger fw-bold small mb-1">
                                            {{ $errors->first('estado') }}
                                        </div>
                                    @enderror
                                    @error('cidade')
                                        <div class="text-danger fw-bold small">
                                            {{ $errors->first('cidade') }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 mx-auto mb-4">
                                    <div class="fw-semi-bold-1 mb-2">
                                        <label for="local_lat_lng">Selecione o local no mapa</label>
                                        <input type="text" name="local_lat_lng" id="local_lat_lng"
                                            class="form-controll is-invalid @error('local_lat_lng') is-invalid @enderror visually-hidden"
                                            value="{{ old('local_lat_lng') }}" required>
                                        @error('local_lat_lng')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="rounded-3 py-3" style="background: rgba(196, 196, 196, 1)">
                                        <div class="col-12 col-lg-9 mx-auto">
                                            <div id="map_canvas" class="w-100" style="height:400px"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-4">
                                        <label for="descricao_local" class="visually-hidden">Descrição do Local</label>
                                        <textarea class="form-control input-custom  @error('descricao_local') is-invalid @enderror" id="descricao_local"
                                            name="descricao_local" placeholder="Descrição do Local" rows="8" required>{{ old('descricao_local') }}</textarea>
                                        @error('descricao_local')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-4">
                                        <label for="descricao_servico" class="visually-hidden">Descrição do
                                            Serviço</label>
                                        <textarea class="form-control input-custom  @error('descricao_servico') is-invalid @enderror" id="descricao_servico"
                                            name="descricao_servico" placeholder="Descrição do Serviço" rows="8" required>{{ old('descricao_servico') }}</textarea>
                                        @error('descricao_servico')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('preco') is-invalid @enderror"
                                            id="preco" name="preco" placeholder="Preço (R$)"
                                            value="{{ old('preco') }}" required>
                                        <label for="preco">Preço (R$)</label>
                                        @error('preco')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('tempo_resposta') is-invalid @enderror"
                                            id="tempo_resposta" name="tempo_resposta" placeholder="Tempo de Resposta"
                                            value="{{ old('tempo_resposta', '2h') }}" required>
                                        <label for="tempo_resposta">Tempo de Resposta</label>
                                        @error('tempo_resposta')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-floating">
                                        <select class="form-select @error('categoria_id') is-invalid @enderror"
                                            id="categoria_id" name="categoria_id" required>

                                            <option value="" selected>Selecione uma categoria</option>
                                            @foreach ($categorias as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (old('categoria_id') == $item->id) selected @endif>
                                                    {{ $item->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="categoria_id">Categoria</label>
                                        @error('categoria_id')
                                            <div class="invalid-feedback small fw-bold"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <button type="submit" class="btn btn-success fw-semi-bold-1 px-4 py-2">
                                        Criar Anúncio
                                    </button>
                                </div>
                            </div>
                        </form>
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
            $('#preco').mask('#.##0,00', {
                reverse: true
            });
        });
    </script>


    <!-- APi Google Maps JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMyfW2v2FqfU5BF6YGw3WFv1qFfIxps58"></script>
    <script>
        var lat_long_padrao =
            @if (old('local_lat_lng'))
                JSON.parse(`{!! old('local_lat_lng') !!}`)
            @else
                undefined
            @endif
        console.log(lat_long_padrao)
    </script>
    <script src="{{ asset('assets/js/google_maps.js') }}"></script>


    <!-- API para obter estado e cidade -->
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
