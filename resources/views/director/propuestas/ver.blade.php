@extends('layouts.app')

@section('title', 'Propuesta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-file-pdf-o iconoizq"></i>Propuesta</h4></div>

                    <div class="panel-body">
                        <div class="text-center">
                            <a href="{{ route('director.propuesta.show', $propuesta->id) }}" target="_blank">
                                <img src="{{ asset('imagenes/pdf.png') }}">
                                <h5>{{ $propuesta->titulo }}</h5>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Jurados</h4></div>

                    <div class="panel-body">
                        <div>

                            @if(App\Jurado_propuesta::where('propuesta_id',$propuesta->id)->first()==null)
                                <p class="text-center">Esta propuesta no tiene jurados asignados aún.</p>


                            @else

                                @foreach(App\Jurado_propuesta::where('propuesta_id',  $propuesta->id )->get() as $resultado)
                                    <?php $jurado = App\User::find($resultado->jurado_id); ?>
                                    <?php $jurad = App\Jurado::where('user_id', $jurado->id)->first(); ?>

                                    <li>{{ $jurado->nombre}} con cédula {{ $jurado->cc}}
                                        de {{ App\Pais::where('cod',$jurad->pais_id)->first()->nombre }}</li>

                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-comments-o iconoizq"></i>Comentarios</h4></div>

                    <div class="panel-body">

                        @foreach(App\Comentario::where('propuesta_id', $propuesta->id)->get() as $comentario)
                        <?php $usuario = App\User::where('id', $comentario->user_id)->first(); ?>
                                <!-- comentario -->
                        <div class="col-sm-1">
                            <div class="thumbnail">
                                <img class="img-responsive user-photo" src="{{ asset($usuario->imagen) }}">
                            </div>
                        </div>

                        <div class="col-md-11">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>{{ $usuario->nombre }}</strong> <span
                                            class="text-muted">{{ $comentario->created_at }}</span>
                                </div>
                                <div class="panel-body">
                                    {{ $comentario->comentarios }}
                                </div>
                            </div>
                        </div>
                        <!-- /comentario -->
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
