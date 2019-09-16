<div class="modal fade" id="addDegree" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title">{{__('Agregar licenciatura')}}</h5>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('campuses.assignDegree', ['id' => $campus->id])}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <select name="degree_id" class="form-control" required>
                            <option value="" selected disabled>Seleccione una licenciatura</option>
                            @foreach ($degrees as $degree)
                                <option value="{{$degree->id}}">{{$degree->name}}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="user_id" class="form-control" required>
                            <option value="" selected disabled>Seleccione un Coordinador</option>
                            @foreach ($users as $user)
                                @if ($user->hasAnyRole('super-admin'))
                                    <option value="{{$user->id}}">{{$user->names." ".$user->paternal_surname." ".$user->maternal_surname}}</option>
                                @endif
                            @endforeach
                        </select>
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