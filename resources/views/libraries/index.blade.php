@extends('layouts.app')
@section('libraries', 'active-nav')
@section('title','Bibliotecas')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/Libraries/index.css')}}">
    @section('content')
   <div class="container-fluid">
       <div class="row">
           <div class="col-12 px-5 py-4">
               <h1 class="text-truncate text-title text-md-left text-center">{{__('Bibliotecas')}}</h1>
           </div>
       </div>
   </div>
    @endsection