<!DOCTYPE html>
<html lang="es">

<!-- cabecera -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- título de la pestaña -->
    <title>@yield('title','Default') | Maestrías UQ</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- Fonts -->
    <!-- no funciona -->
    <link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/css.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">

    @yield('css')
                                                            

    <style>
        body {
            font-family: 'Lato';
        }

    </style>
</head>

<!-- body -->
<body id="app-layout">

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a href="{{asset('/')}}">
                    <img alt="Brand" src="{{asset('imagenes/institucional/logo.png')}}" class="img-responsive img-center logo">
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    <!--descomentar y poner lo otro en el else -->
                                    <!--<li><a href="#" class="textonav">Acerca</a></li>
                                    
                                    <li><a href="#"><i class="fa fa-home icono"></i></a></li>-->
                                    
                                    <!-- mensajes -->          
                                    
                                    <li class="dropdown">
                                        <!-- icono de notificación -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class='fa fa-envelope-o'></i>
                                            <span class="labelnav label label-primary">2</span>
                                        </a>

                                        <!-- lista de los mensajes -->
                                        <ul class="dropdown-menu msjs">


                                            <li class="msj"><!-- inicio mensaje -->
                                                <a href="#">

                                                    <!-- User Image -->
                                                    <img src="" class="iconomsj">

                                                    <!-- Message title and timestamp -->

                                                    <h4 class="tmsj">
                                                        Support Team</h4>
                                                        <small><i class="fa fa-clock-o iconoc"></i> 5 mins</small>

                                                    </a>
                                                </li><!-- end message -->

                                                <li class="msj"><!-- start message -->
                                                    <a href="#">

                                                        <!-- User Image -->

                                                        <img src="{{ asset('imagenes/usuarios/1234567.jpg') }}" class="iconomsj">


                                                        <!-- Message title and timestamp -->

                                                        <h4 class="tmsj">
                                                            Support Team</h4>
                                                            <small><i class="fa fa-clock-o iconoc"></i> 5 mins</small>

                                                        </a>
                                                    </li><!-- end message -->
                                                    <li class="divider"></li>
                                                    <li class="footernotif"><a href="#">Ver todos</a></li>

                                                </ul>
                                            </li>     

                                            <!-- Menu de las notificaciones-->
                                            <li class="dropdown">
                                                <!-- icono de notificación -->
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bell-o textnot"></i>
                                                    <span class="label label-warning labelnav">1</span>
                                                </a>

                                                <!-- lista de las notificaciones -->
                                                <ul class="dropdown-menu">


                                                    <li class="msj">
                                                        <a href="#">Cita sustentación</a>
                                                    </li>                   
                                                    <li class="divider"></li>
                                                    <li class="footernotif"><a href="#">Ver todas</a></li>

                                                </ul>
                                            </li>

                                            <!-- Menu de la cuenta del usuario-->
                                            <li class="dropdown">

                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                                    <!-- nombre del usuario -->
                                                    <span class="navnombre">Juan Esteven Granados</span>
                                                </a>
                                                <ul class="dropdown-menu">

                                                    <!-- descripción del usuario -->
                                                    <li>
                                                        <img class="imagenususario img-responsive center-block" src="{{ asset('imagenes/usuarios/1234567.jpg') }}" >
                                                        <p class="profesion">Ingeniero de sistemas y computación</p>
                                                        <p class="universidad">Universidad del Quindío</p>
                                                        <p class="rol"><i class="fa fa-user"></i> estudiante Magister</p>
                                                    </li>

                                                    <!-- opciones de la cuenta-->
                                                    <li class="divider"></li>
                                                    <li><a href="{{ asset('cuenta')}}">Cuenta</a></li>
                                                    <li><a href="{{ asset('ayuda')}}">Ayuda</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="fa fa-btn fa-sign-out"></i> Salir</a></li>

                                                </ul>

                                            </li>

                                            @else
                                            <!-- pendiente para cambio -->
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
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

                                    <!--<p class="footer-links">
                                        <a href="#">Home</a>
                                        ·
                                        <a href="#">Blog</a>
                                        ·
                                        <a href="#">Pricing</a>
                                        ·
                                        <a href="#">About</a>
                                        ·
                                        <a href="#">Faq</a>
                                        ·
                                        <a href="#">Contact</a>
                                    </p>-->

                                    
                                </div>

                                <div class="footer-center">

                                    <div>
                                        <i class="fa fa-map-marker"></i>
                                        <p><span>Bloque de Ingeniería, Piso 2.</span> Universidad del Quindío</p>
                                    </div>

                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <p>Tel: 57- 6 - 7359300 Ext. 350</p>
                                    </div>

                                    <div>
                                        <i class="fa fa-envelope"></i>
                                        <p><a href="ing@uniquindio.edu.co">ing@uniquindio.edu.co</a></p>
                                    </div>

                                </div>

                                <div class="footer-right">

                                    <p class="footer-company-about">
                                        <span>Sistema de gestión para la Maestría en Ingeniería</span>
                                        Armenia-Quindío 2016
                                    </p>

                                    <div class="footer-icons">

                                        <a target="_blank" href="https://www.facebook.com/universidaddelquindio2/?ref=hl/"><i class="fa fa-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/Uniquindio/"><i class="fa fa-twitter"></i></a>
                                        <a target="_blank" href="https://www.youtube.com/channel/UC6QvD0_nqoYRk1WHO5xD3gA/"><i class="fa fa-youtube"></i></a>
                                        

                                    </div>

                                </div>

                            </footer>
                            <!-- fondo -->
                            <div id="particles">
                                @extends('layouts.fondo.particulas')
                            </div>

                            <!-- JavaScripts -->  
                                    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                                -->
                                <script src="{{ asset('js/jquery.min.js') }}"></script>
                                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                                <script src="{{ asset('js/particulas/particulas.js') }}"></script>
                                @yield('js')


                            </body>
                            </html>
