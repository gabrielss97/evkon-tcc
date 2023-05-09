<!-- Modal -->
<div class="modal fade" id="denunciar-comentario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-radius-10px">
            <div class="modal-header border-0 pb-0 m-0 px-4 pt-4">
                <h5 class="modal-title text-center">Denunciar Comentário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  px-4 pb-3 pt-0 m-0">
                <form action="" method="post" id="form-denunciar-comentario">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"></label>
                        <textarea class="form-control input-custom rounded-3 @error('motivo') is-invalid @enderror" name="motivo" id=""
                            rows="5" placeholder="Digite o motivo" maxlength="300" required></textarea>
                        @error('motivo')
                            <div class="invalid-feedback fw-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-indigo px-4 py-2 ">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@if ($errors->any() && session('denunciar_comentario'))
    <!-- Exibir errors de validação no formulário -->
    <script>
        var modalAddCom = new bootstrap.Modal(document.getElementById('denunciar-comentario'))
        modalAddCom.show()
    </script>
@endif
