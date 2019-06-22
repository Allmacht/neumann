@extends('layouts.app')
@section('title', 'Pendiente de verificación')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 alert alert-primary py-3 shadow mt-3">
            <div class="text-center col-xl-10 col-lg-12 float-right mt-3">
                <h2 class="text truncate">{{__('Pendiente de verificación')}}</h2>
                <hr>
                <p class="text-center">
                    {{__('Su cuenta como docente necesita ser verificada por un administrador antes de continuar.')}}
                </p>
            </div>
            <div class="text-center col-xl-2 col-lg-12 float-left text-left">
                <img src="{{asset('images/protection.png')}}" class="img-fluid" width="200px" height="200px">
            </div>

        </div>
    </div>
</div>
@endsection
