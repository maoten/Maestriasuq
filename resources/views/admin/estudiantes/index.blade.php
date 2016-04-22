@extends('layouts.app')

@section('title', 'Estudiantes')

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
                    <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Estudiantes</h4></div>

                    <div class="panel-body text-justify">

                        <div class="row">

                            <div class="col-md-8">

                                <a href="{{ route('admin.estudiantes.create')}}" class="btn btn-primary"
                                   name="registrar_nuevo_estudiante">Registrar nuevo estudiante<i
                                            class="fa fa-plus iconoder"></i></a>

                            </div>

                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('admin.estudiantes.index') }}" aria-describedby='search'>
                                <div class="input-group busqueda">
                                    <input type="text" class="form-control" placeholder="nombre o cédula" name="nombre"
                                           aria-hidden="true">
                                    <span class="input-group-addon" id="search"><span
                                                class="glyphicon glyphicon-search"></span></span>
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
                            <th class="active">Profesión</th>
                            <th class="active">Rol</th>
                            <th class="active">Acción</th>
                            </thead>

                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->id }}</td>
                                    <td>{{ $estudiante->cc }}</td>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->telefono }}</td>
                                    <td>{{ $estudiante->email }}</td>
                                    <td>{{ $estudiante->profesion }}</td>
                                    <td><h4><span class="label label-success">{{ $estudiante->rol }}</span></h4></td>

                                    <td><a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}"
                                           class="btn btn-warning" title="Editar"><span
                                                    class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <a href="{{ route('admin.estudiantes.destroy', $estudiante->id) }}"
                                           onclick="return confirm('¿Deseas eliminar este estudiante?')"
                                           class="btn btn-danger" title="Eliminar"><i class="fa fa-times"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        {!! $estudiantes->render()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
