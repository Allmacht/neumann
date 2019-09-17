@extends('layouts.app')
@section('campuses', 'active-nav')
@section('title', $campus->name)
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/index.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4 px-4 mb-3">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 float-left text-center alert alert-primary shadow show-left">
                    <h6 class="text-muted"><strong>{{__('Código único : ')}}</strong>{{{$campus->code}}}</h6>
                    <h6 class="text-muted"><strong>{{__('CCT : ')}}</strong>{{{$campus->cct}}}</h6>
                    <hr>
                    <div class="my-4">
                        <h3>
                            {{$campus->name}}
                        </h3>
                    </div>
                    @if (Auth::user()->hasRole('super-admin'))    
                        <a href="{{route('campuses.edit', ['id'=>$campus->id])}}" class="btn btn-success btn-sm rounded-pill">
                            <i class="fas fa-edit"></i>
                            {{__('Editar')}}
                        </a>
                    @endif
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 float-right py-2 table-responsive">
                    <!--Tabla de información-->
                    <div class="alert alert-success text-center mb-0 shadow form-row" style="z-index: 0">
                        <div class="col-10 text-left">
                            <h4 class="alert-heading mb-0">{{__('Información General')}}</h4>
                        </div>
                        <div class="col-2 text-right">
                            <i id="collapse-icon" class="fas fa-arrow-circle-up fa-lg" style="cursor: pointer" data-toggle="collapse" data-target="#table-info"></i>
                        </div>
                    </div>
                    <div class="collapse show mb-3" id="table-info" style="z-index: -1">
                        <table class="table table-hover bg-white shadow">
                            <thead>
                                <tr>
                                    <th class="align-middle pt-3">{{__('Clave')}}</th>
                                    <th class="align-middle pt-3">{{__('Valor')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        {{__('Acciones')}}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('campuses.show.pdf',['id'=>$campus->id])}}" class="btn btn-danger btn-sm rounded-pill">
                                            <i class="fas fa-file-pdf"></i>
                                            {{__('Descargar PDF')}}
                                        </a>
                                        <button class="btn btn-info btn-sm rounded-pill" data-toggle="modal" data-target="#sendpdf">
                                            <i class="fas fa-paper-plane"></i>
                                            {{__('Enviar PDF')}}
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{__('Código único')}}</td>
                                    <td>{{$campus->code}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('CCT')}}</td>
                                    <td>{{$campus->cct}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Nombre')}}</td>
                                    <td>{{$campus->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Estado')}}</td>
                                    <td>{{$campus->state}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Municipio')}}</td>
                                    <td>{{$campus->municipality}}</td>
                                </tr>
                                @if ($campus->colony != null)
                                    <tr>
                                        <td>{{__('Colonia/Fracc.')}}</td>
                                        <td>{{$campus->colony}}</td>
                                    </tr>
                                @endif
                                <tr class="">
                                    <td>{{__('Calle')}}</td>
                                    <td>{{$campus->street}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Código postal')}}</td>
                                    <td>{{$campus->zipcode}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Número exterior')}}</td>
                                    <td>{{$campus->external_number}}</td>
                                </tr>
                                @if ($campus->internal_number != null) 
                                    <tr>
                                        <td>{{__('Número interior')}}</td>
                                        <td>{{$campus->internal_number}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="align-middle">{{__('Administrador')}}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Ver perfil">
                                            <i class="fas fa-user-circle"></i>
                                            {{$campus->user->names." ".$campus->user->paternal_surname}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{__('Turno')}}</td>
                                    <td>{{$campus->shift}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Nivel escolar')}}</td>
                                    <td>{{$campus->level}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('Estado')}}</td>
                                    @if ($campus->status)
                                        <td>{{__('Activo')}}</td>    
                                    @else
                                        <td>{{__('Desactivado')}}</td>  
                                    @endif
                                </tr>
                                <tr>
                                    <td>{{__('Fecha de registro')}}</td>
                                    <td>{{$campus->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--fin tabla de información-->

                    <!--tabla de carreras-->
                    <div class="alert alert-info text-center mb-0 mt-4 shadow form-row" style="z-index: 0">
                        <div class="col-10 text-left">
                            <h4 class="alert-heading mb-0">{{__('Carreras disponibles')}}</h4>                            
                        </div>
                        <div class="col-2 text-right">
                            @if(Auth::user()->hasAnyRole('super-admin') || Auth::user()->id == $campus->user_id)
                                <i class="fas fa-plus-circle fa-lg" data-toggle="modal" data-target="#addDegree" style="cursor:pointer"></i>
                            @endif
                            <i id="collapse-icon-degrees" class="fas fa-arrow-circle-up fa-lg" style="cursor: pointer" data-toggle="collapse" data-target="#table-degrees"></i>
                        </div>
                    </div>
                    <div class="collapse table-responsive show mb-3" id="table-degrees" style="z-index: -1">
                        <table class="table table-hover bg-white shadow" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    {{-- <th>{{__('ID')}}</th> --}}
                                    <th>{{__('Nombre')}}</th>
                                    <th>{{__('Coordinador')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Rdegrees as $Rdegree)
                                    <tr>
                                        {{-- <td class="align-middle text-truncate"></td> --}}
                                        <td class="align-middle text-truncate">
                                            {{$Rdegree->degree->name}}
                                        </td>
                                        <td class="align-middle text-truncate">
                                            {{$Rdegree->user->names." ".$Rdegree->user->paternal_surname}}
                                        </td>
                                        <td class="align-middle text-truncate {{$Rdegree->status ? 'table-success' : 'table-danger'}}">
                                            {{$Rdegree->status ? 'Activa' : 'Inactiva'}}
                                        </td>
                                        <td class="align-middle text-truncate">
                                            @if (Auth::user()->id == $campus->user_id || Auth::user()->hasRole('super-admin'))    
                                                <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="left" data-title="Modificar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if ($Rdegree->status)    
                                                    <span data-toggle="tooltip" data-placement="top" data-title="Desactivar">
                                                        <button type="button" class="btn btn-warning open-modal" data-id="{{$Rdegree->id}}" data-toggle="modal" data-target="#disable" data-action="disable">
                                                            <i class="fas fa-times-circle"></i>
                                                        </button>
                                                    </span>
                                                @else
                                                    <span data-toggle="tooltip" data-placement="top" data-title="Activar">
                                                        <button type="button" class="btn btn-info open-modal" data-id="{{$Rdegree->id}}" data-toggle="modal" data-target="#enable" data-action="enable">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </span>
                                                @endif

                                                <span data-toggle="tooltip" data-placement="right" data-title="Eliminar">
                                                    <button type="button" class="btn btn-danger open-modal" data-id="{{$Rdegree->id}}" data-toggle="modal" data-target="#delete" data-action="delete">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </span>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--fin tabla de carreras-->
                </div>
            </div>
        </div>
    </div>
    
    @section('sendURL')
        {{route('campuses.sendcampus', ['id'=> $campus->id])}}
    @endsection

    @include('Campuses.PDF.modalSend')
    @include('Campuses.degrees.disable')
    @include('Campuses.degrees.enable')
    @include('Campuses.degrees.delete')
    
    @if (Auth::user()->hasAnyRole('super-admin') || Auth::user()->id == $campus->user_id)
        @include('Campuses.addDegree') 
    @endif
@endsection
@section('scripts')
    <script src="{{asset('js/EmailButton.js')}}"></script>
    <script src="{{asset('js/modalid.js')}}"></script>
@endsection