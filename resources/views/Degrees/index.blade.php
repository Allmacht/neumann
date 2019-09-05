@extends('layouts.app')
@section('title','Licenciaturas')
@section('degrees', 'active-nav')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Campuses/index.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-5 py-4">
                <h1 class="text-truncate text-title text-md-left text-center">{{__('Licenciaturas')}}</h1>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-left text-md-left text-center px-0 mt-4 form-row">
                    @hasrole('super-admin')
                        <a href="{{route('degrees.create')}}" class="btn btn-primary rounded-pill">
                            <i class="fas fa-plus"></i>
                            {{__('Nueva licenciatura')}}
                        </a>
                    @endrole
                    @if ($degrees->count())    
                        <div class="dropdown ml-2">
                            <button class="btn btn-danger rounded-pill dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="fas fa-file-pdf"></i>
                                {{__(' PDF')}}
                            </button>
                            <div class="dropdown-menu">
                                <a href="" class="dropdown-item btn-pdf">
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
                    @endif
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 float-right px-0 mt-4">
                    <form method="get">
                        <div class="input-group">
                            <input type="text" class="form-control form-1 rounded-input" name="busqueda" placeholder="Buscar..." value="{{$busqueda}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success rounded-button">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if($degrees->count())
                <div class="table-responsive px-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-truncate">{{__('Código Único')}}</th>
                                <th class="text-truncate">{{__('RVOE')}}</th>
                                <th class="text-truncate">{{__('Nombre')}}</th>
                                <th class="text-truncate">{{__('Semestres')}}</th>
                                <th class="text-truncate">{{__('Acciones')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($degrees as $degree)
                                <tr>
                                    <td class="align-middle text-truncate">{{$degree->code}}</td>
                                    <td class="align-middle text-truncate">{{$degree->rvoe}}</td>
                                    <td class="align-middle text-truncate">{{$degree->name}}</td>
                                    <td class="align-middle text-truncate">{{$degree->semesters}}</td>
                                    <td class="align-middle text-truncate">
                                        <a href="{{route('degrees.show',['id'=>$degree->id])}}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Mostrar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>



@section('sendURL')
  
@endsection
@include('Campuses.PDF.modalSend')
@endsection