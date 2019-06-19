@extends('layouts.app')
@section('title','Restablecer contreña - Neumann')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Auth/email.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 div-1 mx-auto py-3 shadow">
                    <h1 class="text-truncate text-header text-center">
                        {{ __('Restablecer su contraseña') }}
                    </h1>
                    <p class="text-center py-3 padding-text">{{ __('Ingrese su correo electónico asociado a su cuenta, recibirá un email con un enlace para restablecer su contraseña.') }}</p>
                    <div class="form-group padding-text">
                        <input type="email" class="form-control shadow rounded-pill @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" autocomplete="email" required placeholder="Correo electrónico">
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-outline-danger btn-login">
                            <i class="fas fa-times"></i>
                            {{ __('Cancelar') }}
                        </a>
                        <button type="submit" class="btn btn-outline-success btn-register">
                            <i class="fas fa-check"></i>
                            {{ __('Aceptar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection