@extends('layouts.app')
@section('title','Restablecer contreña - Neumann')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Auth/email.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 div-1 offset-xl-2 offset-lg-2 py-3 shadow">
                <h1 class="text-truncate text-header text-center">
                    {{ __('Restablecer su contraseña') }}
                </h1>
                <p class="text-center py-3 padding-text">{{ __('Ingrese su correo electónico asociado a su cuenta, recibirá un email con un enlace para restablecer su contraseña') }}</p>
            </div>
        </div>
    </div>
@endsection