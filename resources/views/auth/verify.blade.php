@extends('layouts.app')
@section('title', 'Verificar cuenta - Neumann')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/verify.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="div-1 col-12">
                <div class="div-2 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-sm-12 float-left text-center">
                    <img id="img-1" class="img-1 img-fluid" src="{{ asset('images/email.png') }}">
                </div>

                <div class="div-3 col-xl-9 col-lg-9 col-md-9 col-sm-12 float-right">
                    @if (session('resent'))
                        <div class="alert alert-success text-center shadow" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    <div class="alert alert-warning shadow  text-center arrow_box" role="alert" id="alert-1">
                        <h4 class="alert-heading"><strong>{{ __('Antes de continuar') }}</strong></h4>
                        <hr>
                        <p>{{ __('Por favor revise su correo electrónico, se ha enviado un enlace de verificación.') }}</p>
                        <p>{{ __('Si usted no ha recibido el correo electrónico, ') }}<a href="{{ route('verification.resend') }}">{{ __('haga clic aquí para solicitar otro.') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/verify.js') }}"></script>
@endsection
