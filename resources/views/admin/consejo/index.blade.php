@extends('layouts.app')

@section('title', 'Miembros del consejo curricular')

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
      <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Miembros del consejo curricular</h4></div>

      <div class="panel-body text-justify">

        <div class="row">

          <div class="col-md-8">

            <a href="{{ route('admin.consejo.create')}}" class="btn btn-primary">Registrar nuevo miembro del consejo curricular<i class="fa fa-plus iconoder"></i></a>

          </div>

          <form class="form-horizontal" role="form" method="GET" action="{{ route('admin.consejo.index') }}" aria-describedby='search'>
            <div class="input-group busqueda">
              <input type="text" class="form-control" placeholder="nombre o cédula" name="nombre" aria-hidden="true">
              <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
            </div>
          </form>

        </div>
        <HR>
          <table class='table table-bordered'>
            <thead>
              <th class="active">ID</th>
              <th class="active">Cédula</th> 
              <th class="active">Nombre</th>
              <th class="active">Teléfono</th>
              <th class="active">Email</th>
              <th class="active">Prodesión</th>
              <th class="active">Rol</th>
              <th class="active">Acción</th>

              <tbody>
                @foreach($consejo as $miembro)
                <tr>
                  <td>{{ $miembro->id }}</td>
                  <td>{{ $miembro->cc }}</td>
                  <td>{{ $miembro->nombre }}</td>
                  <td>{{ $miembro->telefono }}</td>
                  <td>{{ $miembro->email }}</td>
                  <td>{{ $miembro->profesion }}</td>
                  <td><h4><span class="label label-success">{{ $miembro->rol }}</span></h4></td>

                  <td><a href="{{ route('admin.consejo.edit', $miembro->id) }}" class="btn btn-warning" title="Editar"><i class="fa fa-wrench" ></i>
                  </a> 

                  <a href="{{ route('admin.consejo.destroy', $miembro->id) }}" onclick="return confirm('¿Deseas eliminar este miembro de grado?')"  class="btn btn-danger" title="Eliminar"><i class="fa fa-exclamation-triangle"></i>
                  </a>

                </td>
              </tr>

              @endforeach
            </tbody>
          </thead>
        </table>

        {!! $consejo->render()!!}

      </div>
    </div>
  </div>
</div>
</div> 
@endsection
