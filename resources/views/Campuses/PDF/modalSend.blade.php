<div class="modal fade" id="sendpdf" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Enviar PDF')}}</h5>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.sendpdf')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">{{__('Asunto')}}</label>
                        <input type="text" name="title" class="form-control rounded-pill shadow" placeholder="Asunto" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Correo electrónico')}}</label>
                        <input type="email" name="email" class="form-control rounded-pill shadow" placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="message">{{__('Mensaje')}}</label>
                        <textarea name="message" class="form-control" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        {{__('Enviar')}}
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