<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Neumann')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.app.css') }}">
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    @yield('styles')
</head>

<body>
    <div id="app">
        @guest
        <nav class="navbar navbar-expand-md navbar-light fixed-top-login sticky-top">
            <a href="{{ url('/') }}" class="navbar-brand navbar-text">
                <strong>Neumann</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-success btn-login @yield('login-button')"><i class="fas fa-user mr-1"></i>{{ __('Iniciar Sesión') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-register @yield('register-button')"><i class="fas fa-user-plus mr-1"></i>{{ __('Registrarse') }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        @else
        <nav class="navbar navbar-expand-md navbar-light nav-login-true shadow py-1 sticky-top">
            <div class="brand-div text-center">
                <a href="{{ url('/') }}" class="navbar-brand navbar-text">
                    <img src="{{asset('images/project.png')}}" width="35px" class="img-fluid float-left mx-2">
                    <strong>Neumann</strong>
                </a>
            </div>
            <ul class="navbar-nav mr-auto ml-3">
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menú">
                <i id="btn-sidenav-toggle" class="far fa-ellipsis-v fa-2x btn-sidenav-toggle"></i>
              </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLoginContent" aria-controls="navbarLoginContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLoginContent">
              <ul class="navbar-nav mr-auto ml-3">

              </ul>
                <ul class="navbar-nav ml-auto mr-2">
                    <li class="nav-item dropdown align-center-margin">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
                            <!--<span class="badge badge-pill badge-danger float-left">1</span>-->
                            <i class="fas fa-bell fa-lg"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="user-info" role="button" data-toggle="dropdown">
                            <!--Cambiar a imagen de usuario-->
                            <img src="{{asset('images/user.png')}}" class="img-fluid user-image">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                              {{__('Cerrar sesión')}}
                            </button>
                          </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="sidenav" class="sidenav shadow">
            <!--Botones del sideNav-->

            <a href="{{route('home')}}" class="btn btn-link btn-block mt-2 active-nav">
              <div class="mb-4">
                <div class="float-left text-truncate w-25 text-center">
                    <i class="far fa-home icon-menu"></i>
                </div>
                <div class="float-right text-truncate w-75 text-center">
                    <span>{{__('Inicio')}}</span>
                </div>
              </div>
            </a>

            <a href="{{route('home')}}" class="btn btn-link btn-block mt-2">
              <div class="mb-4">
                <div class="float-left text-truncate w-25 text-center">
                    <i class="far fa-home icon-menu"></i>
                </div>
                <div class="float-right text-truncate w-75 text-center">
                    <span>{{__('Inicio')}}</span>
                </div>
              </div>
            </a>

            <!--Fin botones del sideNav-->
        </div>

        @endguest



        <main id="main" @auth class="main" @endauth>
            @yield('content')
        </main>

        @if ($errors->any() || session('status'))
          @include('errors.Notifications')
        @endif

    </div>


    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>
    <script src="{{ asset('js/layout.app.js') }}"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @yield('scripts')
</body>

</html>
