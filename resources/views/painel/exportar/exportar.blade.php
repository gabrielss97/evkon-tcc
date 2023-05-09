@extends('layouts.painel.app')
@section('titulo', 'Exportar Dados')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">

        <!-- Exportar Dados -->
        <div class="card border-0 bg-white mt-4">
            <div class="card-body p-4">

                <h2 class="h4 card-title fw-bold mb-4">Exportar Dados</h2>
                <!-- Colaboradores -->
                <div class="mb-4">
                    <h3 class="h5">Dados de Colaboradores</h3>
                    Total de registros: <strong>{{ $num_colaboradores }}</strong>
                    <div class="mt-2">
                        <a href="{{ route('exportar.colaboradores') }}"
                            class="btn btn-primary btn-sm fw-semi-bold-2 @if ($num_colaboradores == 0) disabled @endif">
                            <i class="fa-solid fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>
                <!-- Clientes -->
                <div class="mb-4">
                    <h3 class="h5">Dados de Clientes</h3>
                    Total de registros: <strong>{{ $num_clientes }}</strong>
                    <div class="mt-2">
                        <a href="{{ route('exportar.clientes') }}"
                            class="btn btn-primary btn-sm fw-semi-bold-2 @if ($num_clientes == 0) disabled @endif">
                            <i class="fa-solid fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>
                <!-- Anúncios -->
                <div class="mb-4">
                    <h3 class="h5">Dados de Anúncios</h3>
                    Total de registros: <strong>{{ $num_anuncios }}</strong>
                    <div class="mt-2">
                        <a href="{{ route('exportar.anuncios') }}"
                            class="btn btn-primary btn-sm fw-semi-bold-2 @if ($num_anuncios == 0) disabled @endif">
                            <i class="fa-solid fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
