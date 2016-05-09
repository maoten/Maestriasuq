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
                    <div class="panel-heading"><h4><i
                                    class="fa fa-file-pdf-o iconoizq"></i>Propuesta: {{ $propuesta->titulo }}</h4></div>

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
                    <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Jurados</h4></div>

                    <div class="panel-body">
                        <div>
                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('admin.propuesta.asignarJurados', $propuesta->id) }}">

                                @if(App\JuradoPropuesta::where('propuesta_id',$propuesta->id)->first()==null)
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


                                    @foreach(App\JuradoPropuesta::where('propuesta_id',  $propuesta->id )->get() as $resultado)
                                        <?php $jurado = App\User::find($resultado->jurado_id); ?>
                                        <?php $jurad = App\Jurado::where('user_id', $jurado->id)->first(); ?>

                                        <li>{{ $jurado->nombre}} con cédula {{ $jurado->cc}}
                                            de {{ App\Pais::where('cod',$jurad->pais_id)->first()->nombre }}</li>

                                    @endforeach
                                    @if(App\Propuesta::find($propuesta->id)->estado!='aceptada'and App\Propuesta::find($propuesta->id)->estado!='aplazada')

                                        <hr>
                                        <a class="btn btn-warning" id="camb" title="Cambiar jurados"
                                           onClick="cambiar()">cambiar
                                            jurados
                                        </a>

                                        <div class="form-group" id="cambiar_jurados">
                                            <label class="col-md-4 control-label">Jurados</label>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select class="chosen" multiple="true" style="width:300px;"
                                                            name="jurados[]">

                                                        @foreach(App\User::where('rol','jurado')->get() as $jurado)
                                                            <?php $jurad = App\JuradoPropuesta::where('jurado_id',
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

                                                    <button type="submit" class="btn btn-primary" name="registrar">
                                                        Cambiar
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
                                @endif
                            </form>

                        </div>

                    </div>
                </div>

                <?php $evaluaciones = App\Evaluacion::where('propuesta_id', $propuesta->id)->get();?>
                @if($evaluaciones->count() == 3 )
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4><i class="fa fa-bookmark iconoizq"></i>Evaluación</h4></div>

                        <div class="panel-body">

                            <p class="text-justify">La propuesta {{ $propuesta->titulo }} ha sido aceptada.</p>
                            <HR>
                            @foreach($evaluaciones as $evaluacion)
                                <div class="col-md-4 text-center">
                                    <a href="{{asset($evaluacion->evaluacion)}}">
                                        <img src="{{ asset('imagenes/excel.png') }}">
                                        <h5>Evaluación del jurado:<BR>{{ App\User::find($evaluacion->user_id)->nombre }}
                                        </h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

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
