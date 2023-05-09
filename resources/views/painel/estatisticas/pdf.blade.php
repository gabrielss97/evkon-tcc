<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estatísticas</title>
</head>

<body>

    <h1 style="text-align: center; margin-bottom: 20px">Evkon</h1>

    <!-- Users Ativos -->
    <div class="" style="width: 50%; float:left">
        <div class="" style="text-align: center">Usuários Ativos</div>
        <img src="{!! request()->post('usuarios_ativos') !!}" alt="" style="width: 100%">
    </div>
    <!-- Users Banidos -->
    <div class="" style="width: 50%; float:left">
        <div class="" style="text-align: center">Usuários Banidos</div>
        <img src="{!! request()->post('usuarios_banidos') !!}" alt="" style="width: 100%">
    </div>

    <!-- Divisor -->
    <div style="border-top: 1px solid #ddd; margin: 30px 0 30px 0"></div>
    <!-- Colaboradores em 1 ano -->
    <div class="" style="width: 100%; float:left;">
        <div class="" style="text-align: center">Colaboradores cadastrados em um período de 1 ano</div>
        <img src="{!! request()->post('cols_1ano') !!}" alt="" style="width: 100%">
    </div>

    <!-- Divisor -->
    <div style="border-top: 1px solid #ddd; margin: 30px 0 30px 0"></div>
    <!-- Clientes em 1 ano -->
    <div class="" style="width: 100%; float:left;">
        <div class="" style="text-align: center">Clientes cadastrados em um período de 1 ano</div>
        <img src="{!! request()->post('clientes_1ano') !!}" alt="" style="width: 100%">
    </div>

    <!-- Divisor -->
    <div style="border-top: 1px solid #ddd; margin: 30px 0 30px 0"></div>
    <!-- Anúncios em 1 ano -->
    <div class="" style="width: 100%; float:left;">
        <div class="" style="text-align: center">Anúncios cadastrados em um período de 1 ano</div>
        <img src="{!! request()->post('anuncios_1ano') !!}" alt="" style="width: 100%">
    </div>

    <!-- Divisor -->
    <div style="border-top: 1px solid #ddd; margin: 30px 0 30px 0"></div>
    <!-- Alguns dados -->
    <div class="" style="width: 100%; float:left;">
        <div class="" style="text-align: center; margin-bottom: 20px">Alguns dados</div>

        <div class="col-12 col-md-6 col-lg-3 text-center" style="width: 25%; float:left; text-align: center">
            <span class="h2 fw-bold text-success" style="font-size: 1.7em; font-weight: bold; color: #198754">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22">
                    <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#198754"
                        d="M64 400C64 408.8 71.16 416 80 416H480C497.7 416 512 430.3 512 448C512 465.7 497.7 480 480 480H80C35.82 480 0 444.2 0 400V64C0 46.33 14.33 32 32 32C49.67 32 64 46.33 64 64V400zM342.6 278.6C330.1 291.1 309.9 291.1 297.4 278.6L240 221.3L150.6 310.6C138.1 323.1 117.9 323.1 105.4 310.6C92.88 298.1 92.88 277.9 105.4 265.4L217.4 153.4C229.9 140.9 250.1 140.9 262.6 153.4L320 210.7L425.4 105.4C437.9 92.88 458.1 92.88 470.6 105.4C483.1 117.9 483.1 138.1 470.6 150.6L342.6 278.6z" />
                </svg>
                {{ \App\Models\User::where('conta', 'cliente')->count() }}
            </span>
            <div class="mb-3  mt-2" style="font-size: 1em">
                Clientes
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 text-center" style="width: 25%; float:left; text-align: center">
            <span class="h2 fw-bold text-warning" style="font-size: 1.7em; font-weight: bold; color: #ffc107">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22">
                    <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#ffc107"
                        d="M64 400C64 408.8 71.16 416 80 416H480C497.7 416 512 430.3 512 448C512 465.7 497.7 480 480 480H80C35.82 480 0 444.2 0 400V64C0 46.33 14.33 32 32 32C49.67 32 64 46.33 64 64V400zM342.6 278.6C330.1 291.1 309.9 291.1 297.4 278.6L240 221.3L150.6 310.6C138.1 323.1 117.9 323.1 105.4 310.6C92.88 298.1 92.88 277.9 105.4 265.4L217.4 153.4C229.9 140.9 250.1 140.9 262.6 153.4L320 210.7L425.4 105.4C437.9 92.88 458.1 92.88 470.6 105.4C483.1 117.9 483.1 138.1 470.6 150.6L342.6 278.6z" />
                </svg>
                {{ \App\Models\User::where('conta', 'colaborador')->count() }}
            </span>
            <div class="mb-3  mt-2" style="font-size: 1em">Colaboradores</div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 text-center" style="width: 25%; float:left; text-align: center">
            <span class="h2 fw-bold text-danger" style="font-size: 1.7em; font-weight: bold; color: #dc3545">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22">
                    <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#dc3545"
                        d="M64 400C64 408.8 71.16 416 80 416H480C497.7 416 512 430.3 512 448C512 465.7 497.7 480 480 480H80C35.82 480 0 444.2 0 400V64C0 46.33 14.33 32 32 32C49.67 32 64 46.33 64 64V400zM342.6 278.6C330.1 291.1 309.9 291.1 297.4 278.6L240 221.3L150.6 310.6C138.1 323.1 117.9 323.1 105.4 310.6C92.88 298.1 92.88 277.9 105.4 265.4L217.4 153.4C229.9 140.9 250.1 140.9 262.6 153.4L320 210.7L425.4 105.4C437.9 92.88 458.1 92.88 470.6 105.4C483.1 117.9 483.1 138.1 470.6 150.6L342.6 278.6z" />
                </svg>
                {{ \App\Models\Comentario::count() }}
            </span>
            <div class="mb-3  mt-2" style="font-size: 1em">Comentários</div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 text-center" style="width: 25%; float:left; text-align: center">
            <span class="h2 fw-bold text-secondary" style="font-size: 1.7em; font-weight: bold; color: #6c757d">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22">
                    <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path fill="#6c757d"
                        d="M64 400C64 408.8 71.16 416 80 416H480C497.7 416 512 430.3 512 448C512 465.7 497.7 480 480 480H80C35.82 480 0 444.2 0 400V64C0 46.33 14.33 32 32 32C49.67 32 64 46.33 64 64V400zM342.6 278.6C330.1 291.1 309.9 291.1 297.4 278.6L240 221.3L150.6 310.6C138.1 323.1 117.9 323.1 105.4 310.6C92.88 298.1 92.88 277.9 105.4 265.4L217.4 153.4C229.9 140.9 250.1 140.9 262.6 153.4L320 210.7L425.4 105.4C437.9 92.88 458.1 92.88 470.6 105.4C483.1 117.9 483.1 138.1 470.6 150.6L342.6 278.6z" />
                </svg>
                {{ \App\Models\Contato::count() }}
            </span>
            <div class="mb-3  mt-2" style="font-size: 1em">Contatos</div>
        </div>
    </div>

</body>

</html>
