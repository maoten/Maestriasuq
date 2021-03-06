@extends('layouts.app')

@section('title', 'Propuestas')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
    <?php $coordinador = App\Coordinador::where('user_id', Auth::user()->id)->first();?>

    <div class="container">
        @include('layouts.general.nav_consejo')
        </br>

        <div class="row">
            <div class="col-md-12">
                @include('flash::message')

                @if($coordinador==null)

                                <div class="panel panel-default ">
                    <div class="panel-heading"><h4><i class="fa fa-file-text-o iconoizq"></i>Propuestas de todos los énfasis</h4></div>

                    <div class="panel-body text-justify">


                        <form class="form-horizontal" role="form" method="GET"
                              action="{{ route('consejo.propuestas.index') }}" aria-describedby='search'>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="título o estado (enviada, aceptada, aplazada, modificada, a modificar, en espera)"
                                       name="titulo" aria-hidden="true">
                                <span class="input-group-addon" id="search"><span
                                            class="glyphicon glyphicon-search"></span></span>
                            </div>
                        </form>

                        <HR>
                        <div class="table-responsive">

                        <table class='table table-bordered'>
                            <thead>
                            <th class="active">ID</th>
                            <th class="active">Título</th>
                            <th class="active">Modalidad</th>
                            <th class="active">Énfasis</th>
                            <th class="active">Estudiante</th>
                            <th class="active">Director</th>
                            <th class="active">Fecha creación</th>
                            <th class="active">Estado</th>
                            <th class="active">Acción</th>
                            </thead>


                            <tbody>
                            @foreach($propuestas as $propuesta)
                                    <tr>
                                        <td>{{ $propuesta->id }}</td>
                                        <td>{{ $propuesta->titulo }}</td>
                                        <td>{{ App\Modalidad::find( $propuesta->mod_id )->nombre }}</td>
                                        <td>{{ App\Enfasis::find( $propuesta->enf_id )->nombre }}</td>
                                        <td>{{ App\User::find( $propuesta->user_id )->nombre }}</td>
                                        <td>{{ App\User::find( $propuesta->dir_id )->nombre }}</td>

                                        <?php $date = new DateTime($propuesta->created_at);
                                        $date->setTimezone(new DateTimeZone('America/Bogota'));
                                        ?>

                                        <td>{{ $date->format('Y-m-d H:i') }}</td>

                                        <td>
                                            @if($propuesta->estado=='aceptada')
                                                <h4><span class="label label-success">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @elseif($propuesta->estado=='aplazada')
                                                <h4><span class="label label-danger">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @else
                                                <h4>
                                                    <span class="label label-default">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('consejo.propuesta.ver', $propuesta->id) }}"
                                               class="btn btn-primary" title="Ver propuesta"><i
                                                        class="fa fa-external-link fa-lg"></i>
                                            </a>

                                        </td>

                                    </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>

                        {!! $propuestas->render()!!}

                    </div>
                </div>






                @else
                <div class="panel panel-default ">
                    <div class="panel-heading"><h4><i class="fa fa-file-text-o iconoizq"></i>Propuestas énfasis
                            en {{ App\Enfasis::find($coordinador->enf_id)->nombre }}</h4></div>

                    <div class="panel-body text-justify">


                        <form class="form-horizontal" role="form" method="GET"
                              action="{{ route('consejo.propuestas.index') }}" aria-describedby='search'>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="título o estado (enviada, aceptada, aplazada, modificada, a modificar, en espera)"
                                       name="titulo" aria-hidden="true">
                                <span class="input-group-addon" id="search"><span
                                            class="glyphicon glyphicon-search"></span></span>
                            </div>
                        </form>

                        <HR>
                        <div class="table-responsive">

                        <table class='table table-bordered'>
                            <thead>
                            <th class="active">ID</th>
                            <th class="active">Título</th>
                            <th class="active">Modalidad</th>
                            <th class="active">Énfasis</th>
                            <th class="active">Estudiante</th>
                            <th class="active">Director</th>
                            <th class="active">Fecha creación</th>
                            <th class="active">Estado</th>
                            <th class="active">Acción</th>
                            </thead>


                            <tbody>
                            @foreach($propuestas as $propuesta)
                                @if($propuesta->enf_id==$coordinador->enf_id)
                                    <tr>
                                        <td>{{ $propuesta->id }}</td>
                                        <td>{{ $propuesta->titulo }}</td>
                                        <td>{{ App\Modalidad::find( $propuesta->mod_id )->nombre }}</td>
                                        <td>{{ App\Enfasis::find( $propuesta->enf_id )->nombre }}</td>
                                        <td>{{ App\User::find( $propuesta->user_id )->nombre }}</td>
                                        <td>{{ App\User::find( $propuesta->dir_id )->nombre }}</td>

                                        <td>{{ $propuesta->created_at }}</td>

                                        <td>
                                            @if($propuesta->estado=='aceptada')
                                                <h4><span class="label label-success">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @elseif($propuesta->estado=='aplazada')
                                                <h4><span class="label label-danger">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @else
                                                <h4>
                                                    <span class="label label-default">{{ $propuesta->estado }}</span>
                                                </h4>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('consejo.propuesta.ver', $propuesta->id) }}"
                                               class="btn btn-primary" target="_blank" title="Ver propuesta"><i
                                                        class="fa fa-external-link fa-lg"></i>
                                            </a>

                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>

                        </table>
                        </div>

                        {!! $propuestas->render()!!}

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
