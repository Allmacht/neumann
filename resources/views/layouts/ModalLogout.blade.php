<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <h5 class="modal-title">{{__('Cerrar sesión')}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>{{__('¿Realmente desea cerrar sesión?')}}</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fas fa-check"></i>
                        {{__('Aceptar')}}
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
