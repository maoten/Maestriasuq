@extends('layouts.app')

@section('title', 'Aspirante')

@section('css')
<link rel="stylesheet" href="{{ asset('css/vertical-responsive-menu.min.css') }}">
@endsection

@section('content')

			<!--	<div class="container">
				
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
				<div class="panel-body">
				<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
				</div>
				</div>
				</div>
				</div>
				</div> -->


  <nav class="vertical_nav">

    <ul id="js-menu" class="menu">

      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          
          <span class="menu--label"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
         Propuesta</span>
        </label>

        <ul class="sub_menu">
          <li class="sub_menu--item">
            <a href="#" target="_blank" class="sub_menu--link sub_menu--link__active">Registrar</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">Editar</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">Ver seguimiento</a>
          </li>
        </ul>
      </li>

     <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          
          <span class="menu--label"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Trabajo de grado</span>
        </label>

        <ul class="sub_menu">
          <li class="sub_menu--item">
            <a href="#" target="_blank" class="sub_menu--link sub_menu--link__active">Registrar</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">Editar</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">Ver seguimiento</a>
          </li>
        </ul>
      </li>


      <li class="menu--item">
        <a href="#" class="menu--link" title="Item 3">
          <span class="menu--label"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Mensajes</span>
        </a>
      </li>


      <li class="menu--item">
        <a href="{{ asset('aspirante/calendario')}}" class="menu--link" title="Item 5">
          <span class="menu--label"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Calendario</span>
        </a>
      </li>


      <li class="menu--item">
        <a href="#" class="menu--link" title="Item 3">
          <span class="menu--label"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Documentos de interés</span>
        </a>
      </li>

    </ul>


  </nav>


				<div class="container">
				
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
				<div class="panel-body">
				<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
				</div>
				</div>
				</div>
				</div>
				</div> 

@endsection

@section('js')
<script src="{{ asset('js/vertical-responsive-menu.min.js') }}"></script>
@endsection