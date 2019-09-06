@extends('layouts.app')
@section('title', $degree->name)
@section('degrees','active-nav')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 py-4 mt-3">
            <h1 class="text-title text-md-left text-center" style="color:#5DB1FB">{{$degree->name}}</h1>
            <form action="{{route('degrees.update', ['id' => $degree->id])}}" method="post">
                @csrf
                <div class="form-row mt-4">
                    
                    <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                        <label for="code">{{__('Código único')}}<span class="ml-2" data-toggle="tooltip" data-placement="right" title="Código generado atomáticamente"><i class="fas fa-question-circle text-primary"></i></span></label>
                        <input type="text" name="code" class="form-control rounded-pill shadow @error('code') is-invalid @enderror" value="{{$degree->code}}" readonly required>
                    </div>

                    <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                        <label for="rvoe">{{__('RVOE')}}</label>
                        <input type="text" name="rvoe" class="form-control rounded-pill shadow @error('rvoe') is-invalid @enderror" placeholder="Ingrese RVOE" value="{{$degree->rvoe}}">
                    </div>

                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <label for="name">{{__('Nombre')}}</label>
                        <input type="text" name="name" class="form-control rounded-pill shadow @error('name') is-invalid @enderror" placeholder="Ingrese el nombre de la licenciatura" required value="{{$degree->name}}">
                    </div>

                    <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                        <label for="semesters">{{__('Semestres')}}</label>
                        <input type="number" name="semesters" class="form-control rounded-pill shadow @error('semesters') is-invalid @enderror" placeholder="Semestres" value="{{$degree->semesters}}">
                    </div>

                    <div class="form-group col-xl-9 col-lg-9 col-md-6 col-sm-12 mb-4">
                        <label for="dicipline">{{__('Diciplina')}}</label>
                        <select name="dicipline" class="form-control rounded-pill shadow">
                            <option value="" selected="selected" disabled>{{__('Seleccione una opción')}}</option>
                            <option @if($degree->dicipline == "agricultura y silvicultura") selected @endif value="agricultura y silvicultura">Agricultura y silvicultura</option>
                            <option @if($degree->dicipline == "ciencias aplicadas y profesiones") selected @endif value="ciencias aplicadas y profesiones">ciencias aplicadas y profesiones</option>
                            <option @if($degree->dicipline == "Artes, diseños y arquitectura") selected @endif value="Artes, diseños y arquitectura">Artes, diseños y arquitectura.</option>
                            <option @if($degree->dicipline == "negocios y Administración") selected @endif value="negocios y Administración">negocios y Administración</option>
                            <option @if($degree->dicipline == "informática y TI") selected @endif value="informática y TI">informática y TI</option>
                            <option @if($degree->dicipline == "Educación y entrenamiento") selected @endif value="Educación y entrenamiento">Educación y entrenamiento</option>
                            <option @if($degree->dicipline == "ingenieria y tecnología") selected @endif value="ingenieria y tecnología">ingenieria y tecnología</option>
                            <option @if($degree->dicipline == "Estudios ambientales y ciencias de la tierra") selected @endif value="Estudios ambientales y ciencias de la tierra">Estudios ambientales y ciencias de la tierra</option>
                            <option @if($degree->dicipline == "Hospitalidad, ocio y deporte") selected @endif value="Hospitalidad, ocio y deporte">Hospitalidad, ocio y deporte</option>
                            <option @if($degree->dicipline == "humanidades") selected @endif value="humanidades">humanidades</option>
                            <option @if($degree->dicipline == "periodismo y medios") selected @endif value="periodismo y medios">periodismo y medios</option>
                            <option @if($degree->dicipline == "Leyes") selected @endif value="Leyes">Leyes</option>
                            <option @if($degree->dicipline == "medicina y salud") selected @endif value="medicina y salud">medicina y salud</option>
                            <option @if($degree->dicipline == "ciencias naturales y matematicas") selected @endif value="ciencias naturales y matematicas">ciencias naturales y matematicas</option>
                            <option @if($degree->dicipline == "ciencias sociales") selected @endif value="ciencias sociales">ciencias sociales</option>
                        </select>
                    </div>

                    <div class="form-group col-12 mb-4">
                        <label for="description">{{__('Descripción')}}</label>
                       <textarea name="description" cols="30" rows="3" class="form-control shadow" placeholder="Ingrese una descripción">{{$degree->description}}</textarea>
                    </div>

                    <div class="col-12 text-center">
                        <a href="{{route('degrees.index')}}" class="btn btn-danger rounded-pill">
                            <i class="fas fa-times"></i>
                            {{__('Cancelar')}}
                        </a>
                        <button type="submit" class="btn btn-success rounded-pill">
                            <i class="fas fa-check-double"></i>
                            {{__('Actualizar')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
