@extends('layouts.inicio.app')
@section('titulo', 'Contato')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">

            @if (Session::has('success'))
                <!-- Mensagem de sucesso -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Sua mensagem foi enviada
                </div>
            @endif

            <div class="pt-4">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6 mx-auto">
                        <div class="card mb-5 border-2 border-radius-10px" style="border-color: #cecdcd">
                            <div class="card-body p-3 px-md-5 p-md-4">
                                <div class="px-2 py-3">
                                    <h1 class="card-title text-center h2  pb-3">
                                        Contato
                                    </h1>
                                    <!-- Formulário -->
                                    <form action="{{ route('contato.enviar') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-12">
                                                <label for="nome" class="form-label visually-hidden">Seu nome</label>
                                                <input type="text"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('nome') is-invalid @enderror"
                                                    name="nome" id="nome" placeholder="Seu nome"
                                                    value="{{ old('nome') }}" required>
                                                @error('nome')
                                                    <div class="fw-bold invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="email" class="form-label visually-hidden">E-mail</label>
                                                <input type="email"
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('email') is-invalid @enderror"
                                                    name="email" id="email" placeholder="E-mail"
                                                    value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="fw-bold invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="mensagem" class="form-label visually-hidden">Mensagem</label>
                                                <textarea
                                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('mensagem') is-invalid @enderror"
                                                    name="mensagem" id="mensagem" placeholder="Mensagem" rows="4" maxlength="1000" required>{{ old('mensagem') }}</textarea>
                                                @error('mensagem')
                                                    <div class="fw-bold invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success w-100 rounded-pill"
                                                    style="padding: 10px 15px; font-weight: 500">
                                                    Enviar
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
