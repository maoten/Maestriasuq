@extends('layouts.app')

@section('title', 'Trabajos de grado')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')

    <div class="container">
        @include('layouts.general.nav_jurado')
        </br>

        <div class="row">
            <div class="col-md-12">
                @include('flash::message')

                <div class="panel panel-default ">
                    <div class="panel-heading"><h4><i class="fa fa-file-text iconoizq"></i>Trabajos de grado</h4></div>

                    <div class="panel-body text-justify">

                        <form class="form-horizontal" role="form" method="GET"
                              action="{{ route('jurado.trabajosgrado.index') }}" aria-describedby='search'>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="título o estado (enviado, aceptado, aplazado, modificado, a modificar, en espera)"
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
                            <th class="active">Fecha creación</th>
                            <th class="active">Estado</th>
                            <th class="active">Acción</th>
                            </thead>


                            <tbody>
                            @foreach(App\JuradoTrabajogrado::where('jurado_id', Auth::user()->id)->get() as $trabajosgrado)
                                <?php $trabajogrado = App\Trabajogrado::find($trabajosgrado->trabajogrado_id); ?>

                                <tr>
                                    <td>{{ $trabajogrado->id }}</td>
                                    <td>{{ $trabajogrado->titulo }}</td>
                                    <td>{{ App\Modalidad::find( $trabajogrado->mod_id )->nombre }}</td>
                                    <td>{{ App\Enfasis::find( $trabajogrado->enf_id )->nombre }}</td>
                                    <td>{{ App\User::find( $trabajogrado->user_id )->nombre }}</td>
                                    <?php $date = new DateTime($trabajogrado->created_at);
                                    $date->setTimezone(new DateTimeZone('America/Bogota'));
                                    ?>

                                    <td>{{ $date->format('Y-m-d H:i') }}</td>

                                    <td>
                                        @if($trabajogrado->estado=='aceptado')
                                            <h4><span class="label label-success">{{ $trabajogrado->estado }}</span>
                                            </h4>
                                        @elseif($trabajogrado->estado=='aplazado')
                                            <h4><span class="label label-danger">{{ $trabajogrado->estado }}</span>
                                            </h4>
                                        @else
                                            <h4>
                                                <span class="label label-default">{{ $trabajogrado->estado }}</span>
                                            </h4>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('jurado.trabajogrado.ver', $trabajogrado->id) }}"
                                           class="btn btn-primary" title="Ver trabajo de grado"><i
                                                    class="fa fa-external-link fa-lg"></i>
                                        </a>

                                        <a href="{{ route('jurado.trabajogrado.evaluacion', $trabajogrado->id) }}"
                                           class="btn btn-success" title="Evaluar"><i
                                                    class="fa fa-bookmark fa-lg"></i>
                                        </a>

                                    </td>

                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
