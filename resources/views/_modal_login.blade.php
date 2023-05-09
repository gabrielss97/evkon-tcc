<!-- Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <!-- Botão fechar modal -->
    <button type="button" class="btn p-1 btn-link position-absolute text-light" data-bs-dismiss="modal" aria-label="fechar"
        style="top: 10px; right: 15px">
        <i class="fa-solid fa-xmark fa-2x"></i>
    </button>

    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 450px">
        <div class="modal-content border-radius-20px">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-center fs-3 fw-bold w-100 pt-4">
                    Login
                </h5>
            </div>
            <div class="modal-body p-4">
                <div class="px-4 pb-2">

                    @if (session('login_erro'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            {{ session('login_erro') }}
                        </div>
                    @endif

                    <!-- Formulário de login -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label visually-hidden">E-mail</label>
                            <input type="text"
                                class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5" name="email"
                                id="" placeholder="E-mail">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label visually-hidden">Senha</label>
                            <input type="password"
                                class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5" name="password"
                                id="" placeholder="Senha">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="fw-bold fs-5 btn btn-indigo w-100"
                                    style="padding: 10px 15px">Entrar</button>
                            </div>
                            <div class="col-12 d-flex gap-2 mt-2">
                                <a href="{{ route('socialite.redirect', ['provider' => 'facebook']) }}"
                                    class="fw-bold fs-5 btn btn-facebook w-50" style="padding: 10px 15px"><i
                                        class="fa-brands fa-facebook me-1"></i> <span class="d-none d-lg-inline">Facebook</span></a>
                                <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="fw-bold fs-5 btn btn-google w-50" style="padding: 10px 15px"><i
                                        class="fa-brands fa-google-plus me-1"></i> <span class="d-none d-lg-inline">Google</span></a>
                            </div>
                        </div>
                    </form>
                    <div class="text-center fw-bold pt-4 pb-1">
                        Você ainda não possui cadastro?
                        <a href="#" class="link-secondary text-indigo text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#modal-inscrever">Inscreva-se</a>
                    </div>
                    <div class="fw-bold text-center pb-3">
                        @if (Route::has('password.request'))
                            <a class="link-secondary" href="{{ route('password.request') }}">
                                Esqueci minha senha
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('login_erro'))
    <!-- Exibir errors de validação no formulário -->
    <script>
        var modalLogin = new bootstrap.Modal(document.getElementById('modal-login'))
        modalLogin.show()
    </script>
@endif
