<!DOCTYPE html>
<html lang="es">

<!-- cabecera -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- título de la pestaña -->
    <title>@yield('title','Default') | Maestría Ingeniería UQ</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon2.ico') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/css.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">

    @yield('css')


    <style>
        body {
            font-family: 'Lato', serif;
        }

    </style>
</head>

<!-- body -->
<body id="app-layout" ondragstart='return false'>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a href="{{asset('/')}}">
                <img alt="Brand" src="{{asset('imagenes/institucional/logoi.png')}}"
                     class="img-responsive img-center logo">
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())


                @else

                @if( Auth::user()->rol!='admin')

                <?php $notificaciones = App\Notificacion::where('user_id', Auth::user()->id)->where('estado',
                        'sin leer')->orderBy('created_at', 'DES')->get(); ?>
                        <!-- Menu de las notificaciones-->
                <li class="dropdown">
                    <!-- icono de notificación -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning labelnav">{{count($notificaciones)}}</span>
                    </a>

                    <!-- lista de las notificaciones -->
                    <ul class="dropdown-menu">

                        @if(count($notificaciones)==0)
                            <p class="text-center">Sin notificaciones</p>
                        @else

                            @foreach($notificaciones as $notificacion)
                                <li class="msj">
                                    <p class="text-center">
                                        <small class="text-muted"><i class="fa fa-circle-o iconoizq"
                                                                     aria-hidden="true"></i></small>
                                        {{ substr($notificacion->notificacion,  0, 24) }}...
                                    </p>
                                </li>

                            @endforeach

                        @endif

                        <li class="divider"></li>

                        @if(Auth::user()->rol=='estudiante')
                            <li class="footernotif"><a href="{{route('estudiante.notificaciones.index') }}">Ver
                                    todas</a></li>
                        @elseif(Auth::user()->rol=='director_grado')
                            <li class="footernotif"><a href="{{route('director.notificaciones.index') }}">Ver todas</a>
                            </li>
                        @elseif(Auth::user()->rol=='consejo_curricular')
                            <li class="footernotif"><a href="{{route('consejo.notificaciones.index') }}">Ver todas</a>
                            </li>
                        @elseif(Auth::user()->rol=='jurado')
                            <li class="footernotif"><a href="{{route('jurado.notificaciones.index') }}">Ver todas</a>
                            </li>
                        @endif

                    </ul>
                </li>
                @endif


                        <!-- Menu de la cuenta del usuario-->
                <li class="dropdown ">

                    <a href="#" class="dropdown-toggle cuadro" data-toggle="dropdown">

                        <!-- nombre del usuario -->
                        <span class="navnombre">{{ Auth::user()->nombre }}</span>
                    </a>
                    <ul class="dropdown-menu cuenta">

                        <!-- descripción del usuario -->
                        <li>
                            <!-- <img class="imagenususario img-responsive center-block" src="{{ asset('imagenes/usuarios/3.jpg') }}" >-->
                            <img class="imagenususario img-responsive center-block"
                                 src="{{ asset(Auth::user()->imagen) }}">

                            <p class="profesion">{{ Auth::user()->profesion }}</p>
                            <p class="universidad">{{ Auth::user()->universidad }}</p>
                            <p class="rol"><i class="fa fa-user"></i> {{ Auth::user()->rol }}</p>
                        </li>
                        <li class="divider"></li>

                        @if( Auth::user()->rol=='estudiante' )
                                <!-- opciones de la cuenta-->
                        <li><a href="{{ route('estudiante.cuenta')}}">Cuenta</a></li>
                        <li><a href="{{ route('estudiante.ayuda')}}">Ayuda</a></li>
                        @elseif( Auth::user()->rol=='admin' )
                            <li><a href="{{ route('admin.cuenta')}}">Cuenta</a></li>
                            <li><a href="{{ route('admin.ayuda')}}">Ayuda</a></li>
                        @elseif( Auth::user()->rol=='director_grado' )
                            <li><a href="{{ route('director.cuenta')}}">Cuenta</a></li>
                            <li><a href="{{ route('director.ayuda')}}">Ayuda</a></li>
                        @elseif( Auth::user()->rol=='consejo_curricular' )
                            <li><a href="{{ route('consejo.cuenta')}}">Cuenta</a></li>
                            <li><a href="{{ route('consejo.ayuda')}}">Ayuda</a></li>
                        @elseif( Auth::user()->rol=='jurado' )
                            <li><a href="{{ route('jurado.cuenta')}}">Cuenta</a></li>
                            <li><a href="{{ route('jurado.ayuda')}}">Ayuda</a></li>
                        @endif
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Salir</a></li>

                    </ul>

                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<!-- contendio de la página -->
<div class="vertical-center">
    @yield('content')
</div>

<!-- pie de página -->

<footer class="footer-distributed">

    <div class="footer-left">

        <img class="img-responsive center-block" src="{{ asset('imagenes/institucional/logoing.png') }}">


    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Bloque de Ingeniería, Piso 3.</span> Universidad del Quindío</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p><span>Tel: 57-6-7359353 Ext.101. 7359300 ext.350</span></p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="maestriaeningenieria@uniquindio.edu.co">maestriaeningenieria@uniquindio.edu.co</a></p>
        </div>

    </div>

    <div class="footer-right">
      
    </div>

</footer>
<!-- fondo -->
<div id="particles">
    @extends('layouts.fondo.particulas')
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/particulas/particulas.js') }}"></script>
@yield('js')


</body>
</html>
