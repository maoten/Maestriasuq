@extends('layouts.app')

@section('title', 'Propuesta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
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
                            <a href="{{ route('consejo.propuesta.show', $propuesta->id) }}" target="_blank">
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
                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('consejo.propuesta.asignar_jurados', $propuesta->id) }}">

                                @if(App\Jurado_propuesta::where('propuesta_id',$propuesta->id)->first()==null)
                                    <p class="text-center">Esta propuesta no tiene jurados asignados aún.<br>Antes de
                                        asignar jurados a esta propuesta revisa que hay por lo menos 3 jurados
                                        registrados.</p>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jurados</label>

                                        <div class="col-md-6">
                                            <div class="input-group">

                                                <select class="chosen" multiple="true" style="width:300px;"
                                                        name="jurados[]">
                                                    @foreach((App\User::where('rol','jurado')->get()) as $jurado)
                                                        <option value="{{ $jurado->id }}">{{ $jurado->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary" name="registrar">Asignar
                                                    jurados
                                                </button>

                                            </div>

                                        </div>


                                    </div>

                                @else

                                    @foreach(App\Jurado_propuesta::where('propuesta_id',  $propuesta->id )->get() as $resultado)
                                        <?php $jurado = App\User::find($resultado->jurado_id); ?>
                                        <?php $jurad = App\Jurado::where('user_id', $jurado->id)->first(); ?>

                                        <li>{{ $jurado->nombre}} con cédula {{ $jurado->cc}}
                                            de {{ App\Pais::where('cod',$jurad->pais_id)->first()->nombre }}</li>

                                    @endforeach
                                    <hr>
                                    <a class="btn btn-warning" id="camb" title="Cambiar jurados" onClick="cambiar()">cambiar
                                        jurados
                                    </a>

                                    <div class="form-group" id="cambiar_jurados">
                                        <label class="col-md-4 control-label">Jurados</label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <select class="chosen" multiple="true" style="width:300px;"
                                                        name="jurados[]">

                                                    @foreach(App\User::where('rol','jurado')->get() as $jurado)
                                                        <?php $jurad = App\Jurado_propuesta::where('jurado_id',
                                                                $jurado->id)->where('propuesta_id',
                                                                $propuesta->id)->first() ?>
                                                        @if($jurad!=null)

                                                            <option selected="selected"
                                                                    value="{{ $jurado->id }}">{{ $jurado->nombre }}</option>
                                                        @else
                                                            <option value="{{ $jurado->id }}">{{ $jurado->nombre }}</option>

                                                        @endif

                                                    @endforeach
                                                </select>

                                                <button type="submit" class="btn btn-primary" name="registrar">Cambiar
                                                    jurados
                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                        function cambiar() {
                                            $('#cambiar_jurados').show();
                                            $('#camb').hide();

                                        }
                                    </script>


                                @endif
                            </form>

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
@section('js')
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>

    <script>
        $(".chosen").chosen({
            placeholder_text_multiple: 'Seleccione 3 jurados',
            max_selected_options: 3,
            min_selected_options: 3
        });

        $('#cambiar_jurados').hide();

    </script>
@endsection
