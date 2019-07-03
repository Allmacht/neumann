@extends('layouts.app')
@section('campuses', 'active-nav')
@section('title', $campus->name)
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/index.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5 px-4 mb-3">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 float-left py-3 text-center">
                    <div class="alert alert-primary shadow">
                        <h6 class="text-muted"><strong>{{__('Código único : ')}}</strong>{{{$campus->code}}}</h6>
                        <h6 class="text-muted"><strong>{{__('CCT : ')}}</strong>{{{$campus->cct}}}</h6>
                        <hr>
                        <div class="my-4">
                            <h3>
                                {{$campus->name}}
                            </h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded py-3">
                        <h6>{{__('Acciones')}}</h6>
                        <hr>
                        <div class="form-row">
                            <a href="{{route('campuses.edit',['id'=>$campus->id])}}" class="btn btn-success mx-auto">
                                <i class="fas fa-edit"></i>
                                {{__('Editar')}}
                            </a>
                            <div class="dropdown mx-auto">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fas fa-file-pdf"></i>
                                    {{__('PDF')}}
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{route('campuses.show.pdf',['id'=>$campus->id])}}" class="dropdown-item btn-pdf">
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
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 float-right py-2 shadow table-responsive bg-white">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{__('Clave')}}</th>
                                <th>{{__('Valor')}}</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <tr>
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
                            <tr class="@if($campus->status) table-success @else table-danger @endif">
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
            </div>
        </div>
    </div>
    @section('campusesURL')
        {{route('campuses.sendcampus', ['id'=> $campus->id])}}
    @endsection
    @include('Campuses.PDF.modalSend')
@endsection