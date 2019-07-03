@extends('layouts.app')
@section('campuses', 'active-nav')
@section('title','Planteles')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/index.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-5 py-4">
            <h1 class="text-truncate text-title text-md-left text-center">{{__('Planteles')}}</h1>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-left text-md-left text-center px-0 mt-4 form-row">
                @hasrole('super-admin')
                    <a href="{{route('campuses.create')}}" class="btn btn-primary rounded-pill">
                        <i class="fas fa-plus"></i>
                        {{__('Nuevo plantel')}}
                    </a>
                @endrole
                <div class="dropdown ml-2">
                    <button class="btn btn-danger rounded-pill dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-file-pdf"></i>
                        {{__(' PDF')}}
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{route('campuses.pdf')}}" class="dropdown-item btn-pdf">
                            <div class="float-left w-25 text-center">
                                <i class="fas fa-file-download text-danger"></i>
                            </div>
                            <div class="float-right w-75 text-center">
                                {{__(' Descargar')}}
                            </div>
                        </a>
                        <button data-toggle="modal" data-target="#sendpdf" class="dropdown-item btn-pdf">
                            <div class="float-left w-25 text-center">
                                <i class="fas fa-share-square text-danger"></i>
                            </div>
                            <div class="float-right w-75 text-center">
                                {{__(' Enviar')}}
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-right px-0 mt-4">
                <form method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-1 rounded-input" name="busqueda" placeholder="Buscar..." value="{{$busqueda}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success rounded-button">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if ($campuses->count())
            <div class="table table-responsive px-5">
                <table class="table table-hover">
                    <thead class="thead-color">
                        <tr>
                            <th class="text-truncate">{{__('ID')}}</th>
                            <th class="text-truncate">{{__('CCT')}}</th>
                            <th class="text-truncate">{{__('Nombre')}}</th>
                            <th class="text-truncate">{{__('Turno')}}</th>
                            <th class="text-truncate">{{__('Nivel escolar')}}</th>
                            <th class="text-truncate">{{{__('Administrador')}}}</th>
                            <th class="text-truncate">{{__('Acciones')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campuses as $campus)
                            <tr class="@if(!$campus->status) table-danger @endif">
                                <td class="align-middle text-truncate">{{$campus->code}}</td>
                                <td class="align-middle text-truncate">{{$campus->cct}}</td>
                                <td class="align-middle text-truncate">{{$campus->name}}</td>
                                <td class="align-middle text-truncate">{{$campus->shift}}</td>
                                <td class="align-middle text-truncate">{{$campus->level}}</td>
                                <td class="align-middle text-truncate">
                                    <a href="#" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Ver perfil">
                                        <i class="fas fa-user-circle"></i>
                                        {{$campus->user->names." ".$campus->user->paternal_surname}}
                                    </a>
                                </td>
                                <td class="align-middle text-truncate">
                                    <a href="{{route('campuses.show',['id'=>$campus->id])}}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Mostrar">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @hasrole('super-admin')
                                        <a href="{{route('campuses.edit', ['id'=>$campus->id])}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-file-edit"></i>
                                        </a>
                                        @if ($campus->status)    
                                            <span data-toggle="tooltip" data-placement="right" title="Desactivar">
                                                <button type="button" class="btn btn-danger open-modal" data-toggle="modal" data-target="#disable" data-action="disable" data-id="{{$campus->id}}">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </span>
                                        @else
                                            <span data-toggle="tooltip" data-placement="top" title="Activar">
                                                <button type="button" class="btn btn-success open-modal" data-toggle="modal" data-target="#enable" data-action="enable" data-id="{{$campus->id}}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="right" title="Eliminar">
                                                <button type="button" class="btn btn-danger open-modal" data-toggle="modal" data-target="#delete" data-action="delete" data-id="{{$campus->id}}">
                                                    <i class="fas fa-times-square"></i>
                                                </button>
                                            </span>
                                        @endif
                                    @endhasrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$campuses->appends(['busqueda'=> $busqueda])->links()}}
            </div>
        @else
            <div class="col-12 mt-5">
                <h3 class="text-truncate text-center text-muted">
                    <i class="fal fa-exclamation-triangle text-warning"></i>
                    <p>{{__(' Sin registros')}}</p>
                </h3>
            </div>
        @endif
    </div>
</div>
@section('campusesURL')
    {{route('campuses.sendpdf')}}
@endsection
@include('Campuses.PDF.modalSend')
@hasrole('super-admin')
    @include('Campuses.modalDisable')
    @include('Campuses.modalEnable')
    @include('Campuses.modalDelete')
@endhasrole

@endsection
@section('scripts')
    <script src="{{asset('js/modalid.js')}}"></script>
@endsection