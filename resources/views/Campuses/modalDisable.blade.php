<div class="modal fade" id="disable" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <h5 class="modal-title">{{__('Desactivar plantel')}}</h5>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.disable')}}" method="post">
                @csrf
                <div class="modal-body">
                    <p class="text-center">{{__('Ingrese su contraseña para continuar')}}</p>
                    <input type="hidden" id="modal-disable-id" name="id">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control rounded-pill shadow" required placeholder="Contraseña" autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-double"></i>
                        {{__('Aceptar')}}
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>