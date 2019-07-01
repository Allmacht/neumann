@extends('layouts.app')
@section('title', 'Editar - '.$campus->name)
@section('campuses', 'active-nav')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/create.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-4 mt-3">
                    <h1 class="text-title text-md-left text-center">{{$campus->code." - ".$campus->name}}</h1>
                    <form action="{{route('campuses.update',['id'=> $campus->id])}}" method="post">
                        @csrf
                        <div class="form-row mt-4">
                            <div class="form-group col-xl-2 col-lg-3 col-md-6 col-sm-12 mb-4">
                                <label for="cct">{{__('CCT')}}</label>
                                <input type="text" name="cct" class="form-control rounded-pill shadow @error('cct') is-invalid @enderror" value="{{$campus->cct}}" placeholder="CCT">
                            </div>
    
                            <div class="form-group col-xl-10 col-lg-9 col-md-6 col-sm-12 mb-4">
                                <label for="name">{{__('Nombre')}}</label>
                                <input type="text" name="name" class="form-control rounded-pill shadow @error('name') is-invalid @enderror" value="{{$campus->name}}" required placeholder="Ingresa el nombre del plantel">
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="state">{{__('Estado')}}</label>
                                <input type="text" name="state" class="form-control rounded-pill shadow @error('state') is-invalid @enderror" value="{{$campus->state}}" placeholder="Ingrese el estado" required>
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="municipality">{{__('Municipio')}}</label>
                                <input type="text" name="municipality" class="form-control rounded-pill shadow @error('municipality') is-invalid @enderror" value="{{$campus->municipality}}" placeholder="Ingrese el Municipio" required>
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="colony">{{__('Colonia/Fracc.')}}</label>
                                <input type="text" name="colony" class="form-control rounded-pill shadow @error('colony') is-invalid @enderror" value="{{$campus->colony}}" placeholder="Colonia/Fracc.">
                            </div>
    
                            <div class="form-group col-xl-5 col-lg-6 col-md-6 col-sm-12 mb-4">
                                <label for="street">{{_('Calle')}}</label>
                                <input type="text" name="street" class="form-control rounded-pill shadow @error('street') is-invalid @enderror" value="{{$campus->street}}" placeholder="Nombre la calle" required>
                            </div>
    
                            <div class="form-group col-xl-3 col-lg-2 col-md-6 col-sm-12 mb-4">
                                <label for="zipcode">{{__('Código postal')}}</label>
                                <input type="number" name="zipcode" class="form-control rounded-pill shadow @error('zipcode') is-invalid @enderror" value="{{$campus->zipcode}}" placeholder="C.P." required>
                            </div>
    
                            <div class="form-group col-xl-2 col-lg-2 col-md-6 col-sm-12 mb-4">
                                <label for="external_number">{{__('N.Exterior')}}</label>
                                <input type="number" name="external_number" class="form-control rounded-pill shadow @error('external_number') is-invalid @enderror" value="{{$campus->external_number}}" required placeholder="N.Exterior">
                            </div>
    
                            <div class="form-group col-xl-2 col-lg-2 col-md-6 col-sm-12 mb-4">
                                <label for="internal_number">{{__('N.Interior')}}</label>
                                <input type="text" name="internal_number" class="form-control rounded-pill shadow @error('internal_number') is-invalid @enderror" value="{{$campus->internal_number}}" placeholder="N.Interior">
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="level">{{__('Nivel escolar')}}</label>
                                <select class="form-control rounded-pill shadow" name="level">
                                    <option @if($campus->level == 'Media superior') selected @endif value="Media superior">{{__('Media superior')}}</option>
                                    <option @if($campus->level == 'Superior') selected @endif value="Superior">{{__('Superior')}}</option>
                                </select>
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="shifts">{{__('Turno')}}</label>
                                <select class="form-control rounded-pill shadow" name="shift">
                                    <option @if($campus->shift == 'Matutino') selected @endif value="Matutino">{{__('Matutino')}}</option>
                                    <option @if($campus->shift == 'Vespertino') selected @endif value="Vespertino">{{{__('Vespertino')}}}</option>
                                    <option @if($campus->shift == 'Discontinuo') selected @endif value="Discontinuo">{{__('Discontinuo')}}</option>
                                </select>
                            </div>
    
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <label for="user_id">{{__('Administrador')}}</label>
                                <select class="form-control rounded-pill shadow" name="user_id">
                                    <option selected disabled>{{__('Seleccione una opción')}}</option>
                                    @foreach ($users as $user)
                                        @if ($user->hasAnyRole(['Administrador','super-admin']))
                                            <option @if($campus->user_id == $user->id) selected @endif value="{{$user->id}}">
                                                {{$user->names." ".$user->paternal_surname}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('campuses.index')}}" class="btn btn-danger cancel-button px-5 mb-2">
                                <i class="fas fa-times"></i>
                                {{__('Cancelar')}}
                            </a>
                            <button type="submit" class="btn btn-success submit-button px-5 mb-2">
                                <i class="fas fa-check-double"></i>
                                {{__('Aceptar')}}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection