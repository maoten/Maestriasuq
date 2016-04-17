@extends('layouts.app')

@section('title', 'Propuestas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component2.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')

<div class="container">
  @include('layouts.general.nav_admin')
</br>

<div class="row">
  <div class="col-md-12">
    @include('flash::message')

    <div class="panel panel-default ">
      <div class="panel-heading"><h4><i class="fa fa-file-text-o iconoizq"></i>Propuestas</h4></div>

      <div class="panel-body text-justify">


        <form class="form-horizontal" role="form" method="GET" action="{{ route('admin.propuestas.index') }}" aria-describedby='search'>
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
             <th class="active">Modalidad</th>
             <th class="active">Énfasis</th>
             <th class="active">Estudiante</th>
             <th class="active">Director</th>
             <th class="active">Jurados</th>
             <th class="active">Fecha creación</th>
             <th class="active">Estado</th>

             <tbody>
              @foreach($propuestas as $propuesta)
              <tr>
                <td>{{ $propuesta->id }}</td>
                <td>{{ $propuesta->titulo }}</td>
                <td>{{ App\Modalidad::find( $propuesta->mod_id )->nombre }}</td>
                <td>{{ App\Enfasis::find( $propuesta->enf_id )->nombre }}</td>
                <td>{{ App\User::find( $propuesta->user_id )->nombre }}</td>
                <td>{{ App\User::find( $propuesta->dir_id )->nombre }}</td>
                <td>  
                  <select class="form-control" name="jurados" >

                    @foreach(App\Jurado_propuesta::where('propuesta_id',  $propuesta->id )->get() as $resultado)
                    <?php $jurado= App\User::find($resultado->jurado_id); ?>

                    <option value="{{$jurado->id}}">{{$jurado->nombre}}</option>

                    @endforeach  
                  </select>
                </td>
                <td>{{ $propuesta->created_at }}</td>
                <td>
                   @if($propuesta->estado=='aceptada')
                  <h4><span class="label label-success">{{ $propuesta->estado }}</span></h4>
                  @elseif($propuesta->estado=='aplazada')
                 <h4><span class="label label-danger">{{ $propuesta->estado }}</span><h4>
                  @else
                 <h4><span class="label label-default">{{ $propuesta->estado }}</span><h4>
                  @endif
                </td>
                </tr>

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
