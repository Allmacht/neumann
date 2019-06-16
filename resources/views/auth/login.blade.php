@extends('layouts.app')
@section('title', 'Iniciar sesión')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Auth/login.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 div-1 px-0">
                <div class="col-xl-5 col-lg-6 col-md-12 float-left div-left text-center shadow" id="divLeft">
                    <img src="{{ asset('images/project.png') }}" class="img-fluid mt-2" width="350px">
                    <h1 class="text-logo text-truncate">N<strong>e</strong>umann</h1>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="col-xl-7 col-lg-6 col-md-12 float-right div-right py-4 arrow_box shadow" id="divRight">

                        <h1 class="text-center text-form-title mt4">{{ __('Iniciar sesión') }}</h1>

                        <div class="form-group col-xl-10 col-lg-11 col-md-12 col-sm-12 mx-auto margin-elements">
                            <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror shadow" name="email" placeholder="Ingrese tu email" required>
                        </div>

                        <div class="form-group col-xl-10 col-lg-11 col-md-12 col-sm-12 mx-auto margin-elements">
                            <input type="password" class="form-control rounded-pill @error('email') is-invalid @enderror shadow" name="password" placeholder="Ingrese su contraseña" required>
                        </div>

                        <div class="col-xl-10 col-lg-11 col-md-12 mx-auto margin-elements text-center">
                            <button class="btn btn-block btn-submit rounded-pill shadow mb-3" type="submit">
                                <i class="fas fa-check icon-btn"></i>
                                {{ __('Entrar') }}
                            </button>
                            
                            <a href="{{ route('password.request') }}" class="btn-link text-decoration-none btn-request">
                                {{ __('¿Ha olvidado su contraseña?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="fixed-bottom">
            <div class="row">
                <div class="col-12 text-right">
                    <h1 class="mx-4 my-4">
                        <span data-toggle="tooltip" data-placement="left" title="¿Problemas para iniciar sesión?">
                            <i class="fas fa-question question-icon"></i>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

@endsection