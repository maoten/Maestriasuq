@extends('layouts.app')

@section('title', 'Propuestas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component2.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
<?php $coordinador=App\Coordinador::where('user_id',Auth::user()->id)->first() ?>

<div class="container">
  @include('layouts.general.nav_consejo')
</br>

<div class="row">
  <div class="col-md-12">
    @include('flash::message')
    <div class="panel panel-default ">
      <div class="panel-heading"><h4><i class="fa fa-pencil-square-o iconoizq"></i>Propuestas énfasis en {{ $coordinador->enf_nombre }}</h4></div>

      <div class="panel-body text-justify">


        <form class="form-horizontal" role="form" method="GET" action="{{ route('consejo.propuestas.index') }}" aria-describedby='search'>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="título o estado (enviada, en_espera, aprobada o rechazada)" name="titulo" aria-hidden="true">
            <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
          </div>
        </form>

        <HR>
          <table class='table table-bordered'>
            <thead>
             <th class="active">ID</th>
             <th class="active">Título</th> 
             <th class="active">Enfoque</th>
             <th class="active">Estudiante</th>
             <th class="active">Director</th>
             <th class="active">Jurados</th>
             <th class="active">Fecha creación</th>
             <th class="active">Estado</th>
             <th class="active">Acción</th>


             <tbody>
              @foreach($propuestas as $propuesta)
              @if($propuesta->enf_nombre==$coordinador->enf_nombre)
              <tr>
                <td>{{ $propuesta->id }}</td>
                <td>{{ $propuesta->titulo }}</td>
                <td>{{ $propuesta->enfoque }}</td>
                <td>{{ App\User::find( $propuesta->user_id )->nombre }}</td>
                <td>{{ App\User::find( $propuesta->dir_id )->nombre }}</td>
                <td>  
                  <select class="form-control" name="jurados" >

                    @foreach(App\Propuesta_jurado::where('propuesta_id',  $propuesta->id )->get() as $resultado)
                    <?php $jurado= App\User::find($resultado->user_id); ?>

                    <option value="{{$jurado->id}}">{{$jurado->nombre}}</option>

                    @endforeach  
                  </select>
                </td>
                <td>{{ $propuesta->created_at }}</td>

                <td>
                  @if($propuesta->estado=='enviada')
                  <h4><span class="label label-default">{{ $propuesta->estado }}</span></h4>
                  @elseif($propuesta->estado=='en_espera')
                  <span class="label label-primary">{{ $propuesta->estado }}</span>
                  @elseif($propuesta->estado=='aprobada')
                  <span class="label label-success">{{ $propuesta->estado }}</span>
                  @else
                  <span class="label label-danger">{{ $propuesta->estado }}</span>
                  @endif
                </td>

                <td>

                  <a href="{{ route('consejo.propuesta.ver', $propuesta->id) }}" class="btn btn-primary" target="_blank" title="Ver propuesta"><i class="fa fa-paperclip fa-lg" ></i>
                  </a> 
                </td>

              </tr>
              @endif
              @endforeach
            </tbody>
          </thead>
        </table>

        {!! $propuestas->render()!!}

      </div>
    </div>
  </div>
</div>
</div> 
@endsection
