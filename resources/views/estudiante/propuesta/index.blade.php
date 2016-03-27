@extends('layouts.app')

@section('title', 'Propuesta')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')

<div class="container">
  @include('layouts.general.nav_estudiante')
</br>
<div class="row">
  <div class="col-md-12">
    @include('flash::message')

    <div class="panel panel-default ">
      <div class="panel-heading"><h4><i class="fa fa-pencil-square-o iconoizq"></i>Propuestas</h4></div>

      <div class="panel-body text-justify">

        <a href="{{ route('estudiante.propuesta.create')}}" class="btn btn-primary">Registrar nueva propuesta<span class="glyphicon glyphicon glyphicon-pencil iconoder" aria-hidden="true"></span></a>
        <HR>
          <table class='table table-bordered'>
            <thead>
              <th class="active">ID</th>
              <th class="active">Título</th> 
              <th class="active">Enfoque</th>
              <th class="active">Director</th>
              <th class="active">Fecha creación</th>
              <th class="active">Estado</th>
              <th class="active">Acción</th>

              <tbody>
                @foreach($propuestas as $propuesta)
                @if($propuesta->user_id == Auth::user()->id )

                <tr>
                  <td>{{ $propuesta->id }}</td>
                  <td>{{ $propuesta->titulo }}</td>
                  <td>{{ $propuesta->enfoque }}</td>
                  <td>{{ App\User::find( $propuesta->dir_id )->nombre }}</td>


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
  
                <a href="{{ route('estudiante.propuesta.ver', $propuesta->id) }}" class="btn btn-primary" target="_blank" title="Ver propuesta"><i class="fa fa-paperclip fa-lg" ></i>
                </a> 

                <a href="{{ route('estudiante.propuesta.seguimiento', $propuesta->id) }}" target="_blank" class="btn btn-primary" title="Seguimiento"><i class="fa fa-ellipsis-h"></i>
                </a>

              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </thead>
      </table>

    </div>
  </div>
</div>
</div>
</div> 

@endsection

@section('js')
<script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection