@extends('layouts.app')

@section('title', 'Propuesta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-file-pdf-o iconoizq"></i>Propuesta</h4></div>

                    <div class="panel-body">
                        <div class="text-center">
                            <?php $pdf = App\Documentos::where('propuesta_id', $propuesta->id)->first(); ?>
                            <a href="{{ asset($pdf->nombre) }}" target="_blank">
                                <img src="{{ asset('imagenes/pdf.png') }}">
                                <h5>{{ $propuesta->titulo }}</h5>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-comments-o iconoizq"></i>Comentarios</h4></div>

                    <div class="panel-body">
                        @if(App\Comentario::where('propuesta_id', $propuesta->id)->first()==null)
                            <p class="text-center">Esta propuesta no tiene comentarios aún.</p>
                            @else
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
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

