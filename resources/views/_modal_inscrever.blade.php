<!-- Modal -->
<div class="modal fade" id="modal-inscrever" tabindex="-1" role="dialog" aria-labelledby="modalInscrever"
    aria-hidden="true">
    <!-- Botão fechar modal -->
    <button type="button" class="btn p-1 btn-link position-absolute text-light" data-bs-dismiss="modal" aria-label="fechar"
        style="top: 10px; right: 15px">
        <i class="fa-solid fa-xmark fa-2x"></i>
    </button>

    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 450px">
        <div class="modal-content border-radius-20px">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-center fs-3 fw-bold w-100 pt-4">
                    Inscrever-se
                </h5>
            </div>
            <div class="modal-body p-4">
                <div class="px-4 pb-2">
                    <!-- Formulário de Inscrever-se -->
                    <form action="{{ route('registro.cliente') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nome" class="form-label visually-hidden">Nome</label>
                                <input type="text"
                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('nome') is-invalid @enderror"
                                    name="nome" id="nome" placeholder="Nome" value="{{ old('nome') }}"
                                    required>
                                @error('nome')
                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="sobrenome" class="form-label visually-hidden">Sobrenome</label>
                                <input type="text"
                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('sobrenome') is-invalid @enderror"
                                    name="sobrenome" id="sobrenome" placeholder="Sobrenome"
                                    value="{{ old('sobrenome') }}" required>
                                @error('sobrenome')
                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="email" class="form-label visually-hidden">E-mail</label>
                                <input type="email"
                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="E-mail" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12">
                                <label for="sexo" class="form-label visually-hidden">Sexo</label>
                                <select
                                    class="form-select form-control-login rounded-0 shadow-none bg-F5F5F5 @error('sexo') is-invalid @enderror"
                                    name="sexo" id="sexo" required>
                                    <option value="" selected>Selecione seu sexo</option>
                                    <option value="Masculino" @if (old('sexo') == 'Masculino') selected @endif>
                                        Masculino
                                    </option>
                                    <option value="Feminino" @if (old('sexo') == 'Feminino') selected @endif>Feminino
                                    </option>
                                    <option value="Outro" @if (old('sexo') == 'Outro') selected @endif>Outro
                                    </option>
                                </select>
                                @error('sexo')
                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3  col-12">
                                <label for="password" class="form-label visually-hidden">Senha</label>
                                <input type="password"
                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Senha" required>
                                @error('password')
                                    <div class="fw-semi-bold-1 invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3  col-12">
                                <label for="password-confirm" class="form-label visually-hidden">Confirmar senha</label>
                                <input type="password"
                                    class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5"
                                    name="password_confirmation" id="password-confirm" placeholder="Confirmar senha"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="fw-bold fs-5 btn btn-danger w-100"
                                    style="padding: 10px 15px">
                                    <i class="fa-regular fa-envelope me-1"></i>
                                    Inscrição por e-mail
                                </button>
                            </div>
                            <div class="col-12 d-flex gap-2 mt-2">
                                <a href="{{ route('socialite.redirect', ['provider' => 'facebook', 'conta' => 'cliente']) }}"
                                    class="fw-bold fs-5 btn btn-facebook w-50" style="padding: 10px 15px"><i
                                        class="fa-brands fa-facebook me-1"></i> <span class="d-none d-lg-inline">Facebook</span></a>
                                <a href="{{ route('socialite.redirect', ['provider' => 'google', 'conta' => 'cliente']) }}"
                                    class="fw-bold fs-5 btn btn-google w-50" style="padding: 10px 15px"><i
                                        class="fa-brands fa-google-plus me-1"></i> <span class="d-none d-lg-inline">Google</span></a>
                            </div>
                        </div>
                    </form>
                    <div class="text-center fw-bold pt-4 pb-3">
                        Você já tem uma conta?
                        <a href="#" class="link-danger text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#modal-login">Conecte-se</a>
                    </div>
                    <div class="text-muted text-center pb-3 lh-0" style="font-weight: 500; font-size: 12px">
                        Ao se inscrever por e-mail ou Facebook, você estará de acordo com as nossas
                        <a class="link-dark" href="{{ route('politica-de-privacidade') }}">
                            políticas de privacidade
                        </a> e
                        <a class="link-dark" href="{{ route('termos-de-uso') }}">
                            termos de uso
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any() && session('registro_cliente_erro'))
    <!-- Exibir errors de validação no formulário -->
    <script>
        var modalInscrever = new bootstrap.Modal(document.getElementById('modal-inscrever'))
        modalInscrever.show()
    </script>
@endif
