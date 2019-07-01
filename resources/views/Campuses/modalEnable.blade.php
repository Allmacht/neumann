<div class="modal fade" id="enable" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-success">
                <h5 class="modal-title">{{__('Habilitar plantel')}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.enable')}}" method="post">
                @csrf
                <div class="modal-body text-center">
                    <p>{{__('Ingrese su contraseña para continuar')}}</p>
                    <input type="hidden" name="id" id="modal-enable-id">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-pill shadow" required autofocus placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{__('Aceptar')}}
                    </button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>