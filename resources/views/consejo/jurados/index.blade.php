@extends('layouts.app')

@section('title', 'Jurados')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
    <?php $coordinador = App\Coordinador::where('user_id', Auth::user()->id)->first() ?>
    <div class="container">
        @include('layouts.general.nav_consejo')
        </br>
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')

                <div class="panel panel-default ">
                    <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Jurados</h4></div>

                    <div class="panel-body text-justify">

                        <div class="row">

                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('consejo.jurados.index') }}" aria-describedby='search'>
                                <div class="input-group busqueda">
                                    <input type="text" class="form-control" placeholder="nombre o cédula" name="nombre"
                                           aria-hidden="true">
                                    <span class="input-group-addon" id="search"><span
                                                class="glyphicon glyphicon-search"></span></span>
                                </div>
                            </form>

                        </div>
                        <HR>
                        <div class="table-responsive">

                        <table class='table table-bordered'>
                            <thead>
                            <th class="active">ID</th>
                            <th class="active">Cédula</th>
                            <th class="active">Nombre</th>
                            <th class="active">País</th>
                            <th class="active">Teléfono</th>
                            <th class="active">Email</th>
                            <th class="active">Profesión</th>
                            <th class="active">Rol</th>
                            </thead>

                            <tbody>
                            @foreach($jurados as $jurado)

                                <tr>

                                    <td>{{ $jurado->id }}</td>
                                    <td>{{ $jurado->cc }}</td>
                                    <td>{{ $jurado->nombre }}</td>
                                    <?php $jurad = App\Jurado::where('user_id', $jurado->id)->first() ?>
                                    <td>{{ App\Pais::where('cod',$jurad->pais_id)->first()->nombre }}</td>
                                    <td>{{ $jurado->telefono }}</td>
                                    <td>{{ $jurado->email }}</td>
                                    <td>{{ $jurado->profesion }}</td>

                                    <td><h4><span class="label label-success">{{ $jurado->rol }}</span></h4></td>


                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                        </div>

                        {!! $jurados->render()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
