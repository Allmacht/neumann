@extends('layouts.app')
@section('title', 'Crear cuenta - Neumann')
@section('register-button', 'active')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Auth/register.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-0">
                <div class="col-12 div-header py-1 text-center shadow form-row form-row-div">
                    <h1 class="text-truncate text-header mr-auto">
                        {{ __('Crear una cuenta') }}
                    </h1>
                    <img src="{{ asset('images/project.png') }}" class="img-fluid align-middle" alt="">
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="col-12 div-form form-row form-row-div pt-4">
                        <div class="form-group col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="names">{{ __('Nombre(s)') }}</label>
                        <input type="text" class="form-control shadow" name="names" required placeholder="Ingresa tu(s) nombre(s)" autofocus value="{{old('names')}}">
                        </div>
                        <div class="form-group col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="paternal_surname">{{ __('Apellido paterno') }}</label>
                            <input type="text" class="form-control shadow" name="paternal_surname" required placeholder="Ingresa tu apellido paterno" value="{{old('paternal_surname')}}">
                        </div>
                        <div class="from-group col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="maternal_surname">{{ __('Apellido materno') }}</label>
                            <input type="text" class="form-control shadow" name="maternal_surname" required placeholder="Ingresa tu apellido materno" value="{{old('maternal_surname')}}">
                        </div>
                        <div class="form-group col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <label for="enrollment">{{__('Matrícula (opcional)')}}</label>
                            <input type="text" class="form-control shadow @error('enrollment') is-invalid @enderror" name="enrollment" placeholder="Ingresa tu matrícula (opcional)" value="{{old('enrollment')}}">
                        </div>
                        <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <label for="name">{{ __('Nombre de usuario') }}</label>
                            <input type="text" class="form-control shadow @error('name') is-invalid @enderror" name="name" required placeholder="Ingresa tu nombre de usuario" value="{{old('name')}}">
                        </div>
                        <div class="form-group col-xl-5 col-lg-6 col-md-6 col-sm-12">
                            <label for="email">{{ __('Correo electónico') }}</label>
                            <input type="email" class="form-control shadow @error('email') is-invalid @enderror" name="email" required placeholder="Ingresa tu correo electrónico" value="{{old('email')}}">
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control shadow" name="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="confirm_password">{{ __('Confirma tu contraseña') }}</label>
                            <input id="confirm-password" type="password" class="form-control shadow" name="password_confirmation" placeholder="Confirma tu contraseña" required disabled="true">
                        </div>
                        <div id="alert-password" class="col-12 alert alert-danger shadow-div text-center" hidden="true">
                            <i>{{ __('Contraseña mínima de 8 caracteres.') }}</i>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 custom-control custom-switch text-center py-1">
                            <hr>
                            <input type="checkbox" class="custom-control-input" name="teacher" id="teacher">
                            <label for="teacher" class="custom-control-label">{{ __('Soy docente') }}</label>
                            <span data-toggle="tooltip" data-placement="right" title="Al crear una cuenta como docente, esta deberá ser verificada por el administrador.">
                                <i class="fas fa-question-circle text-primary" ></i>
                            </span>
                            <hr>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mx-auto text-center my-1">
                            <button id="btn-register-submit" class="btn btn-success btn-block rounded-pill" type="submit" disabled>
                                <i class="fas fa-check-double"></i>
                                {{ __('Crear cuenta') }}
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-link text-decoration-none mt-3">
                                <i class="fas-fa-user-circle"></i>
                                {{ __('¿Ya tienes una cuenta?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/Auth/register.js') }}"></script>
@endsection