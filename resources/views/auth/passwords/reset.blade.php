@extends('layouts.app')
@section('title','Reiniciar contraseña - Neumann')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/Auth/reset.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="col-12 div-header py-2 form-row">
                <h1 class="text-truncate title-header">{{ __('Reiniciar contraseña') }}</h1>
                <img src="{{ asset('images/project.png') }}" class="img-fluid img-1">
            </div>
            <form action="{{route('password.update')}}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="col-12 form-row div-form py-3">
                    <div class="form-group col-12">
                        <label for="email">{{ __('Correo electónico') }}</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror shadow" value="{{ old('email') }}" required placeholder="Ingrese su correo electrónico" autofocus>
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <label for="password">{{__('Contraseña')}}</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror shadow" required placeholder="Ingresa tu nueva contraseña">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <label for="password-confirm">{{__('Confrimar contraseña')}}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror shadow" required placeholder="Confirme su contraseña">
                    </div>
                    <div id="alert-password" class="col-12 alert alert-warning shadow text-center rounded" hidden>
                        <i>{{__('Contraseña mínima de 8 caracteres')}}</i>
                    </div>
                    <div class="col-12 text-center py-3">
                        <a href="{{url('/')}}" id="btn-cancel" class="btn btn-outline-danger btn-login">
                          <i class="fas fa-times"></i>
                          {{__('Cancelar')}}
                        </a>
                        <button id="button-submit" type="submit" class="btn btn-outline-success btn-register" disabled>
                          <i class="fas fa-check-double"></i>
                          {{__('Aceptar')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script src="{{asset('js/Auth/reset.js')}}" charset="utf-8"></script>
@endsection
