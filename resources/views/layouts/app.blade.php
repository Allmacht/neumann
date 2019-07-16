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
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
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
                        
                        <div class="dropdown-menu dropdown-menu-right dropdown-notifications py-1">
                            <!--Notificaciones-->
                            <a href="" class="my-2 form-row mx-2 text-decoration-none link-notification">
                               <div class="col-2 text-center my-auto">
                                   <i class="fas fa-check-double fa-2x icon-notification"></i>
                               </div>
                               <div class="col-10">
                                   <h5 class="notification-title">{{__('Nuevo registro')}}</h5>
                                   <p class="text-truncate notification-text text-dark">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                               </div>
                           </a>
                           <div class="dropdown-divider"></div>
                            <!--fin de notificaciones-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="user-info" role="button" data-toggle="dropdown">
                            <!--Cambiar a imagen de usuario-->
                            <img src="{{asset('images/user.png')}}" class="img-fluid rounded-circle user-image">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-user py-0">
                            <!--Dropdown de usuario-->
                            <div class="text-center user-info py-2">
                                <!--Sustituir por imagen del usuario-->
                                <img src="{{asset('images/user.png')}}" class="img-fluid rounded-circle user-image-bg">
                                <h5 class="text-muted my-3">{{Auth::user()->name}}</h5>
                                @foreach (Auth::user()->getRoleNames() as $role)
                                    @if ($role == 'super-admin')
                                        <span class="badge badge-pill badge-success mb-2">{{$role}}</span>
                                    @else
                                        <span class="badge badge-pill badge-primary mb-2">{{$role}}</span>
                                    @endif
                                @endforeach
                            </div>

                            <div class="dropdown-divider my-0"></div>

                            <div class="text-center">
                                <a href="#" class="dropdown-item item-dropdown-user btn-profile py-2">
                                    <i class="far fa-user profile-icon"></i>
                                    {{__('Mi perfil')}}
                                </a>
                            </div>

                            <div class="dropdown-divider my-0"></div>

                            <div class="text-center">
                                <button type="submit" class="dropdown-item item-dropdown-user btn-logout py-2" data-toggle="modal" data-target="#modalLogout">
                                    <i class="fas fa-times logout-icon"></i>
                                    {{__('Cerrar sesión')}}
                                </button>
                            </div>
                            <!--Fin del dropdown de usuario-->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="sidenav" class="sidenav shadow">
            <!--Botones del sideNav-->

            <a href="{{route('home')}}" class="btn btn-link btn-block py-3 @yield('home')">
                <div class="mb-4">
                    <div class="float-left text-truncate w-25 text-center">
                        <i class="far fa-home icon-menu"></i>
                    </div>
                    <div class="float-right text-truncate w-75 text-center">
                        <span>{{__('Inicio')}}</span>
                    </div>
                </div>
            </a>
            
            @hasanyrole('super-admin|Administrador|Coordinador')
                <a href="{{route('campuses.index')}}" class="btn btn-link btn-block py-3 @yield('campuses')">
                    <div class="mb-4">
                        <div class="float-left text-truncate w-25 text-center">
                            <i class="far fa-building icon-menu"></i>
                        </div>
                        <div class="float-right text-truncate w-75 text-center">
                            <span>{{__('Planteles')}}</span>
                        </div>
                    </div>
                </a>

                <a href="{{route('degrees.index')}}" class="btn btn-link btn-block py-3 @yield('degrees')">
                    <div class="mb-4">
                        <div class="float-left text-truncate w-25 text-center">
                            <i class="far fa-user-graduate"></i>
                        </div>
                        <div class="float-right text-truncate w-75 text-center">
                            <span>{{__('Licenciaturas')}}</span>
                        </div>
                    </div>
                </a>
            @endhasanyrole

            <!--Fin botones del sideNav-->
        </div>

        @endguest



        <main id="main" @auth class="main" @endauth>
            @yield('content')
            </main>

    </div>

    @include('errors.Notifications')
    @include('layouts.ModalLogout')


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
