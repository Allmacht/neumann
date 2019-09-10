@extends('layouts.app')
@section('libraries', 'active-nav')
@section('title','Bibliotecas')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Libraries/admin.css')}}">
    @section('content')
        <div class="container">    
            <form action="" method="POST">
                <label>
                    Titulo
                    <input type="text" placeholder="Titulo del libro">
                </label>
                <label>
                    Editorial
                    <input type="text" placeholder="Editorial o editora">
                </label>
                <label for="">
                    Autor
                    <input type="text" placeholder="Autor del libro">
                </label>
                <label for="">
                    Numero de paginas
                    <input type="number">
                </label>
                <div>
                    codigo unico
                </div>
            </form>
        </div>
    @endsection