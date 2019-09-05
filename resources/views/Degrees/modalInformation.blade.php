<div class="modal fade" id="information" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title">{{__('Información')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <textarea class="form-control" name="text-information" id="text-information" cols="30" rows="50">{{$degree->information}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        {{__('Cancelar')}}
                    </button>
                    <button type="submit" class="btn btn-success rounded-pill">
                        <i class="fas fa-check"></i>
                        {{__('Guardar')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>