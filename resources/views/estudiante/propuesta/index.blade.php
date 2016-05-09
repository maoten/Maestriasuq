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
                    <div class="panel-heading"><h4><i class="fa fa-file-text-o iconoizq"></i>Propuestas</h4></div>

                    <div class="panel-body text-justify">


                        @if((count(App\User::where('rol','director_grado')->get()) and count(App\Coordinador::all()))>0)
                            <?php $propuestas_user = App\Propuesta::where('user_id',
                                    Auth::user()->id)->orderBy('updated_at', 'desc')->get() ?>
                            @if($propuestas_user->count()==0 || $propuestas_user->first()->estado=='aplazada')
                                <a href="{{ route('estudiante.propuesta.create')}}" class="btn btn-primary">Registrar
                                    nueva
                                    propuesta<i class="fa fa-plus iconoder"></i></a>
                                <HR>

                            @endif

                        @else
                            <p>No hay directores de grado y/o coordinadores de énfasis registrados aún. Para registrar
                                una nueva propuesta recuerdale a el director de grado y/o a el coordinador de énfasis de
                                tu propuesta que se registre.</p>
                        @endif
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
                            @foreach($propuestas as $propuesta)
                                @if($propuesta->user_id == Auth::user()->id )

                                    <tr>
                                        <td>{{ $propuesta->id }}</td>
                                        <td>{{ $propuesta->titulo }}</td>
                                        <td>{{ App\Modalidad::find( $propuesta->mod_id )->nombre }}</td>
                                        <td>{{ App\Enfasis::find( $propuesta->enf_id )->nombre }}</td>
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

                                            <a href="{{ route('estudiante.propuesta.ver', $propuesta->id) }}"
                                               class="btn btn-primary" target="_blank" title="Ver propuesta"><i
                                                        class="fa fa-external-link fa-lg"></i>
                                            </a>

                                            @if(App\Propuesta::find($propuesta->id)->estado=='a modificar')

                                                <a href="{{ route('estudiante.propuesta.edit', $propuesta->id) }}"
                                                   class="btn btn-warning" title="Editar"><i
                                                            class="fa fa-pencil"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('estudiante.propuesta.seguimiento', $propuesta->id) }}"
                                               target="_blank" class="btn btn-success" title="Seguimiento"><i
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

@endsection

@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection