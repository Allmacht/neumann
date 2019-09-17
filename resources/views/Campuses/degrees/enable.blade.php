<div class="modal fade" id="enable" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title">{{__('Atención')}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.enableDegree')}}" method="post">
                @csrf
                <div class="modal-body">
                    <p class="text-center">{{__('¿Realmente desea activar este elemento?')}}</p>
                    <input type="hidden" id="modal-enable-id" name="id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{__('Aceptar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>