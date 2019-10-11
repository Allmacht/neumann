@extends('layouts.app')
@section('libraries', 'active-nav')
@section('title','Bibliotecas')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Libraries/admin.css')}}">
    @section('content')
   <div class="container-fluid">
       <div class="row">
           <div class="col-12 px-5 py-4">
               <h1>{{__('Bibliotecas')}}</h1>
               <hr>
           </div>
       </div>
   </div>
   <div class="container">
        <div class="row menu">
            <div class="col-sm contenido">
                <a href="">agregar libro</a>
            </div>
            <div class="col-sm contenido">
                <a href="">prestamos</a>
            </div>
            <div class="col-sm contenido">
                <a href="">borrar libro</a>
            </div>
            <div class="col-sm contenido">
                <a href="">preguntas</a>
            </div>
            <div class="col-sm contenido">
                <a href="">blibliotecas</a>
            </div>
        </div>
   </div>
    @endsection