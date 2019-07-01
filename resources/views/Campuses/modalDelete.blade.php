<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <h5 class="modal-title">{{__('Eliminar plantel')}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.destroy')}}" method="post">
                @csrf
                <div class="modal-body text-center">
                    <p>{{__('Ingrese su contraseña para continuar')}}</p>
                    <p class="text-danger">{{__('Esta acción no se puede revertir')}}</p>
                    <input type="hidden" name="id" id="modal-delete-id">
                    <div class="form-group">
                        <input type="password" class="form-control rounded-pill shadow" name="password" required placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{__('Aceptar')}}
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>