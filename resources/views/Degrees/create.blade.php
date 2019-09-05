@extends('layouts.app')
@section('title', 'Nuevo registro')
@section('degrees','active-nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mt-3">
                <h1 class="text-title text-md-left text-center" style="color:#5DB1FB">{{__('Nueva licenciatura')}}</h1>
                <form action="{{route('degrees.store')}}" method="post">
                    @csrf
                    <div class="form-row mt-4">
                        
                        <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                            <label for="code">{{__('Código único')}}<span class="ml-2" data-toggle="tooltip" data-placement="right" title="Código generado atomáticamente"><i class="fas fa-question-circle text-primary"></i></span></label>
                            <input type="text" name="code" class="form-control rounded-pill shadow @error('code') is-invalid @enderror" value="{{$code}}" readonly required>
                        </div>

                        <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                            <label for="rvoe">{{__('RVOE')}}</label>
                            <input type="text" name="rvoe" class="form-control rounded-pill shadow @error('rvoe') is-invalid @enderror" placeholder="Ingrese RVOE" value="{{old('rvoe')}}">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="name">{{__('Nombre')}}</label>
                            <input type="text" name="name" class="form-control rounded-pill shadow @error('name') is-invalid @enderror" placeholder="Ingrese el nombre de la licenciatura" required value="{{old('name')}}">
                        </div>

                        <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                            <label for="semesters">{{__('Semestres')}}</label>
                            <input type="number" name="semesters" class="form-control rounded-pill shadow @error('semesters') is-invalid @enderror" placeholder="Semestres">
                        </div>

                        <div class="form-group col-xl-9 col-lg-9 col-md-6 col-sm-12 mb-4">
                            <label for="dicipline">{{__('Diciplina')}}</label>
                            <select name="dicipline" class="form-control rounded-pill shadow">
                                <option value="" selected="selected" disabled>{{__('Seleccione una opción')}}</option>
                                <option value="agricultura y silvicultura">Agricultura y silvicultura</option>
                                <option value="iencias aplicadas y profesiones">ciencias aplicadas y profesiones</option>
                                <option value="Artes, diseños y arquitectura">Artes, diseños y arquitectura.</option>
                                <option value="negocios y Administración">negocios y Administración</option>
                                <option value="informática y TI">informática y TI</option>
                                <option value="Educación y entrenamiento">Educación y entrenamiento</option>
                                <option value="ingenieria y tecnología">ingenieria y tecnología</option>
                                <option value="Estudios ambientales y ciencias de la tierra">Estudios ambientales y ciencias de la tierra</option>
                                <option value="Hospitalidad, ocio y deporte">Hospitalidad, ocio y deporte</option>
                                <option value="humanidades">humanidades</option>
                                <option value="periodismo y medios">periodismo y medios</option>
                                <option value="Leyes">Leyes</option>
                                <option value="medicina y salud">medicina y salud</option>
                                <option value="ciencias naturales y matematicas">ciencias naturales y matematicas</option>
                                <option value="ciencias sociales">ciencias sociales</option>
                            </select>
                        </div>

                        <div class="form-group col-12 mb-4">
                            <label for="description">{{__('Descripción')}}</label>
                           <textarea name="description" cols="30" rows="3" class="form-control shadow" placeholder="Ingrese una descripción"></textarea>
                        </div>

                        <div class="col-12 text-center">
                            <a href="{{route('degrees.index')}}" class="btn btn-danger rounded-pill">
                                <i class="fas fa-times"></i>
                                {{__('Cancelar')}}
                            </a>
                            <button type="submit" class="btn btn-success rounded-pill">
                                <i class="fas fa-check-double"></i>
                                {{__('Registrar')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection