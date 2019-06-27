@extends('layouts.app')
@section('campuses', 'active-nav')
@section('title','Planteles')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/index.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-5 py-4">
            <h1 class="text-truncate text-title text-md-left text-center">{{__('Planteles')}}</h1>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-left text-md-left text-center px-0 mt-4">
                @hasrole('super-admin')
                    <a href="{{route('campuses.create')}}" class="btn btn-primary rounded-pill">
                        <i class="fas fa-plus"></i>
                        {{__('Nuevo plantel')}}
                    </a>
                @endrole
                <a href="#" class="btn btn-danger rounded-pill">
                    <i class="far fa-file-pdf"></i>
                    {{__('PDF')}}
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-right px-0 mt-4">
                <form method="get">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-input" name="busqueda" placeholder="Buscar..." value="{{$busqueda}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success rounded-button">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            @if ($campuses->count())
            <div class="table table-responsive px-5">
                <table class="table">
                    <thead class="thead-color">
                        <tr>
                            <th class="text-truncate">{{__('ID')}}</th>
                            <th class="text-truncate">{{__('Nombre')}}</th>
                            <th class="text-truncate">{{__('Estado')}}</th>
                            <th class="text-truncate">{{__('Municipio')}}</th>
                            <th class="text-truncate">{{__('Acciones')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campuses as $campus)
                            <tr>
                                <td class="align-middle text-truncate">{{$campus->code}}</td>
                                <td class="align-middle text-truncate">{{$campus->name}}</td>
                                <td class="align-middle text-truncate"{{$campus->state}}></td>
                                <td class="align-middle text-truncate">{{$campus->municipality}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-12 mt-5">
                <h3 class="text-truncate text-center text-muted">
                    <i class="fal fa-exclamation-triangle text-warning"></i>
                    <p>{{__(' Sin registros')}}</p>
                </h3>
            </div>
        @endif
    </div>
</div>
@endsection
