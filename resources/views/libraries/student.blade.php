@extends('layouts.app')
@section('libraries', 'active-nav')
@section('title','Bibliotecas')
@section('styles')
  <link rel="stylesheet" href="{{asset('css/Libraries/index.css')}}">
  <script src="/js/fontawesome.js"></script>
  @section('content')
  {{-- comienza carrousel --}}
  <section>
    <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/images/libros.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/images/libros2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/images/libros3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  {{-- finaliza carrousel --}}
  {{-- comienza la barra de navegacion --}}
    <nav class="libraries">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm text-center">
            <a href=""><i class="icon-nav fas fa-book"></i>Aparta tus libros</a>
          </div>
          <div class="col-sm text-center">
            <a href=""><i class="icon-nav fas fa-question"></i>Preguntas frecuentes</a>
          </div>
          <div class="col-sm text-center">
            <a href=""><i class="icon-nav fas fa-book-open"></i>Catalogo en linea</a>
          </div>
          <div class="col-sm text-center">
            <a href=""><i class="icon-nav fas fa-bookmark"></i>Tus apartados</a>
          </div>
        </div>
      </div>
    </nav>
    {{-- finaliza barra de navegacion --}}
    <div class="container frase">
      <div class="row">
        <div class="col-sm">
          <blockquote>
            ¿Usted me despierta temprano para decirme que tengo razón? ¡Despiérteme para decirme que me equivoqué!
            <br> -John Von Neumann
          </blockquote>
        </div>
      </div>
   </div>

  <script src="js/menu.js"></script>
  @endsection
  