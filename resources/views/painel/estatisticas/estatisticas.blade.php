@extends('layouts.painel.app')
@section('titulo', 'Estatísticas')
@section('content')
    <div class="mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 fw-bold">Estatísticas</h1>
            </div>
            <!-- Estatísticas -->
            <div class="col-12">
                <div class="card border-0 bg-white mt-4">
                    <div class="card-body p-4">
                        <!-- Gráficos -->
                        <div class="pt-2 row gx-4 gy-4 justify-content-lg-center">
                            <!-- Usuários Cadastrados -->
                            <div class="col-12 col-lg-5 p-4">
                                <h2 class="h6 text-center mb-3 fw-bold">Usuários Ativos</h2>
                                <canvas id="usuarios-ativos" style="width: 100%"></canvas>
                            </div>

                            <!-- Usuários Banidos -->
                            <div class="col-12 col-lg-5 p-4">
                                <h2 class="h6 text-center mb-3 fw-bold">Usuários Desativados</h2>
                                <canvas id="usuarios-banidos" style="width: 100%"></canvas>
                            </div>

                            <!-- Colaboradores Cadastrados -->
                            <div class="col-12 col-lg-11 p-4">
                                <h2 class="h6 text-center mb-3 fw-bold">Colaboradores cadastrados em um período de 1 ano
                                </h2>
                                <canvas id="colaboradores-cadastrados" style="width: 100%; height: 250px"></canvas>
                            </div>

                            <!-- Clientes Cadastrados -->
                            <div class="col-12 col-lg-11 p-4">
                                <h2 class="h6 text-center mb-3 fw-bold">Clientes cadastrados em um período de 1 ano </h2>
                                <canvas id="clientes-cadastrados" style="width: 100%; height: 250px"></canvas>
                            </div>

                            <!-- Anúncios Cadastrados em um período de 1 ano -->
                            <div class="col-12 col-lg-11 p-4">
                                <h2 class="h6 text-center mb-3 fw-bold">Anúncios cadastrados em um período de 1 ano </h2>
                                <canvas id="anuncios-cadastrados" style="width: 100%; height: 250px"></canvas>
                            </div>

                            <div class="col-12 col-lg-11">
                                <h2 class="h6 text-center mb-3 fw-bold">Alguns dados</h2>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                <span class="h2 fw-bold text-success">
                                    <i class="fa-solid fa-chart-line fa-sm"></i>
                                    {{ \App\Models\User::where('conta', 'cliente')->count() }}
                                </span>
                                <h2 class="h6  mb-3  mt-2">
                                    Clientes
                                </h2>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                <span class="h2 fw-bold text-warning">
                                    <i class="fa-solid fa-chart-line fa-sm"></i>
                                    {{ \App\Models\User::where('conta', 'colaborador')->count() }}
                                </span>
                                <h2 class="h6  mb-3  mt-2">Colaboradores</h2>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                <span class="h2 fw-bold text-danger">
                                    <i class="fa-solid fa-chart-line fa-sm"></i>
                                    {{ \App\Models\Comentario::count() }}
                                </span>
                                <h2 class="h6  mb-3  mt-2">Comentários</h2>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                <span class="h2 fw-bold text-secondary">
                                    <i class="fa-solid fa-chart-line fa-sm"></i>
                                    {{ \App\Models\Contato::count() }}
                                </span>
                                <h2 class="h6  mb-3  mt-2">Contatos</h2>
                            </div>

                            <div class="col-12 text-center py-4">
                                <!-- Formulário para baixar o pdf com estatísticas -->
                                <form action="{{ route('estatisticas.pdf') }}" method="post">
                                    @csrf
                                    <textarea name="usuarios_ativos" id="usuarios_ativos" rows="3" class="d-none"></textarea>
                                    <textarea name="usuarios_banidos" id="usuarios_banidos" rows="3" class="d-none"></textarea>
                                    <textarea name="cols_1ano" id="cols_1ano" rows="3" class="d-none"></textarea>
                                    <textarea name="clientes_1ano" id="clientes_1ano" rows="3" class="d-none"></textarea>
                                    <textarea name="anuncios_1ano" id="anuncios_1ano" rows="3" class="d-none"></textarea>
                                    <button type="submit" class="btn btn-dark px-4 rounded-pill fw-semi-bold-1 d-none"
                                        id="btn-pdf">
                                        <i class="fa-solid fa-file-pdf"></i>
                                        Exportar gráficos
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <script>
        const cores = [
            'rgba(54, 162, 235, .9)',
            'rgba(255, 206, 86, .9)',
            'rgba(75, 192, 192, .9)',
            'rgba(255, 99, 132, .9)',
            'rgba(153, 102, 255, .9)',
            'rgba(255, 159, 64, .9)'
        ];

        // Anúncios Cadastrados
        const anunciosCadastrados = new Chart(document.getElementById('anuncios-cadastrados'), {
            type: 'bar',
            data: {
                labels: JSON.parse(`{!! json_encode($anuncios_ano['labels']) !!}`),
                datasets: [{
                    label: '# of Votes',
                    data: JSON.parse(`{!! json_encode($anuncios_ano['data']) !!}`),
                    backgroundColor: cores,
                    borderColor: cores,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Usuários Ativos
        const usersAtivos = new Chart(document.getElementById('usuarios-ativos'), {
            type: 'doughnut',
            data: {
                labels: [
                    'Clientes',
                    'Colaboradores',
                    'Total'
                ],
                datasets: [{
                    label: 'Usuários ativos',
                    data: [
                        {{ $usuarios_ativos['clientes'] }},
                        {{ $usuarios_ativos['colaboradores'] }},
                        {{ $usuarios_ativos['total'] }}
                    ],
                    backgroundColor: cores,
                    hoverOffset: 4
                }]
            },
        });

        // Usuários Banidos
        const usersBanidos = new Chart(document.getElementById('usuarios-banidos'), {
            type: 'doughnut',
            data: {
                labels: [
                    'Clientes',
                    'Colaboradores',
                    'Total'
                ],
                datasets: [{
                    label: 'Usuários banidos',
                    data: [
                        {{ $usuarios_banidos['clientes'] }},
                        {{ $usuarios_banidos['colaboradores'] }},
                        {{ $usuarios_banidos['total'] }}
                    ],
                    backgroundColor: cores,
                    hoverOffset: 4
                }]
            },

        });

        // Colaboradores Cadastrados
        const colCadastrados = new Chart(document.getElementById('colaboradores-cadastrados'), {
            type: 'line',
            data: {
                labels: JSON.parse(`{!! json_encode($colaboradores_ano['labels']) !!}`),
                datasets: [{
                    label: 'Colaboradores',
                    data: JSON.parse(`{!! json_encode($colaboradores_ano['data']) !!}`),
                    fill: false,
                    borderColor: 'rgba(54, 162, 235)',
                    tension: 0.1
                }]
            },

            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                    },
                },
            }
        });

        // Clientes Cadastrados
        const clientesCadastrados = new Chart(document.getElementById('clientes-cadastrados'), {
            type: 'line',
            data: {
                labels: JSON.parse(`{!! json_encode($clientes_ano['labels']) !!}`),
                datasets: [{
                    label: 'Clientes Cadastrados',
                    data: JSON.parse(`{!! json_encode($clientes_ano['data']) !!}`),
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },

            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                    },
                },
            }
        });


        // img chart
        window.onload = function() {
            setTimeout(() => {
                let image = usersAtivos.toBase64Image();
                document.querySelector('#usuarios_ativos').value = image

                image = usersBanidos.toBase64Image();
                document.querySelector('#usuarios_banidos').value = image

                image = colCadastrados.toBase64Image();
                document.querySelector('#cols_1ano').value = image

                image = clientesCadastrados.toBase64Image();
                document.querySelector('#clientes_1ano').value = image

                image = anunciosCadastrados.toBase64Image();
                document.querySelector('#anuncios_1ano').value = image

                document.querySelector('#btn-pdf').classList.remove('d-none')

            }, 2000);
        }
    </script>


@endsection
