@extends('layouts.app')

@section('title', 'Directores de grado')

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
                    <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Directores de grado</h4></div>

                    <div class="panel-body text-justify">

                        <div class="row">

                            <div class="col-md-8">

                                <a href="{{ route('admin.directores.create')}}" class="btn btn-primary">Registrar nuevo
                                    director de grado<i class="fa fa-plus iconoder"></i></a>

                            </div>

                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('admin.directores.index') }}" aria-describedby='search'>
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
                            @foreach($directores as $director)
                                <tr>
                                    <td>{{ $director->id }}</td>
                                    <td>{{ $director->cc }}</td>
                                    <td>{{ $director->nombre }}</td>
                                    <td>{{ $director->telefono }}</td>
                                    <td>{{ $director->email }}</td>
                                    <td>{{ $director->profesion }}</td>
                                    <td><h4><span class="label label-success">{{ $director->rol }}</span></h4></td>

                                    <td><a href="{{ route('admin.directores.edit', $director->id) }}"
                                           class="btn btn-warning" title="Editar"><span
                                                    class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <a href="{{ route('admin.directores.destroy', $director->id) }}"
                                           onclick="return confirm('¿Deseas eliminar este director de grado?')"
                                           class="btn btn-danger" title="Eliminar"><i class="fa fa-times"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        {!! $directores->render()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
