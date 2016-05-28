@extends('layouts.app')

@section('title', 'Trabajo de grado')

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
                    <div class="panel-heading"><h4><i class="fa fa-file-text iconoizq"></i>Trabajos de grado</h4></div>

                    <div class="panel-body text-justify">


                        @if( count(App\Propuesta::all())>0 and (count(App\User::where('rol','director_grado')->get()) and count(App\Coordinador::all()))>0)
                            <?php $propuestas_user = App\Propuesta::where('user_id',
                                    Auth::user()->id)->orderBy('updated_at', 'desc')->get();
                            $trabajog = App\Trabajogrado::find($propuestas_user->first()->id);
                            ?>

                            @if(($propuestas_user->first()->estado=='aceptada' and $trabajog==null) || $trabajosgrado->first()->estado=='aplazado')
                                <a href="{{ route('estudiante.trabajogrado.create')}}" class="btn btn-primary">Registrar
                                    nuevo
                                    trabajo de grado<i class="fa fa-plus iconoder"></i></a>
                                <HR>

                            @endif

                        @else
                            <p>No tienes una propuesta aceptada aún.</p>
                        @endif
                        <div class="table-responsive">

                        <table class='table table-bordered'>
                            <thead>
                            <th class="active">ID</th>
                            <th class="active">Título</th>
                            <th class="active">Modalidad</th>
                            <th class="active">Énfasis</th>
                            <th class="active">Director</th>
                            <th class="active">Fecha creación</th>
                            <th class="active">Estado</th>
                            <th class="active">Acción</th>
                            </thead>

                            <tbody>
                            @foreach($trabajosgrado as $trabajogrado)
                                @if($trabajogrado->user_id == Auth::user()->id )

                                    <tr>
                                        <td>{{ $trabajogrado->id }}</td>
                                        <td>{{ $trabajogrado->titulo }}</td>
                                        <td>{{ App\Modalidad::find( $trabajogrado->mod_id )->nombre }}</td>
                                        <td>{{ App\Enfasis::find( $trabajogrado->enf_id )->nombre }}</td>
                                        <td>{{ App\User::find( $trabajogrado->dir_id )->nombre }}</td>

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

                                            <a href="{{ route('estudiante.trabajogrado.ver', $trabajogrado->id) }}"
                                               class="btn btn-primary" target="_blank" title="Ver trabajo de grado"><i
                                                        class="fa fa-external-link fa-lg"></i>
                                            </a>

                                            @if(App\Trabajogrado::find($trabajogrado->id)->estado=='a modificar')

                                                <a href="{{ route('estudiante.trabajogrado.edit', $trabajogrado->id) }}"
                                                   class="btn btn-warning" title="Editar"><i class="fa fa-pencil"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('estudiante.trabajogrado.seguimiento', $trabajogrado->id) }}"
                                                class="btn btn-success" title="Seguimiento"><i
                                                        class="fa fa-ellipsis-h"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @endif
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

@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection