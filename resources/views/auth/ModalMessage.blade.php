<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Contacto') }}</h5>
                <button class="close close1" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body text-center">
                    <p>{{ __('Por favor llene el siguiente formuario, el administrador lo contactará lo antes posible.') }}</p>
                    <div class="form-group">
                        <input type="email" class="form-control shadow rounded-pill" placeholder="Ingrese un correo electrónico de contacto" required name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control shadow rounded-pill" placeholder="Ingrese su nombre completo" required name="name">
                    </div>
                    <div class="form-group">
                        <select name="reason" class="form-control shadow rounded-pill" required>
                            <option disabled selected>{{ __('Seleccione una opción') }}</option>
                            <option value="1">{{ __('Mi cuenta está desactivada') }}</option>
                            <option value="2">{{ __('No recuerdo mi correo electónico, ni mi contraseña') }}</option>
                            <option value="3">{{ __('Otro') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="menssage" cols="5" rows="3" class="form-control rounded shadow" placeholder="Descripción corta del problema"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                        <i class="fas fa-times"></i>
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{ __('Enviar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>