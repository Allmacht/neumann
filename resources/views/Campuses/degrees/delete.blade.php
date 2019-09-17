<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <h5 class="modal-title">{{__('Atención')}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.deleteDegree')}}" method="post">
                @csrf
                <div class="modal-body">
                    <p class="text-center">{{__('¿Realmente desea eliminar este elemento?')}}</p>
                    <p class="text-center text-danger">{{__('Esta acción no se puede revertir')}}</p>
                    <input type="hidden" id="modal-delete-id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{__('Aceptar')}}
                    </button>
                    <button type="button" class="btn btn-danger" modal-dismiss="modal">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>