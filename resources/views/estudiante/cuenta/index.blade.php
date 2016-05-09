@extends('layouts.app')

@section('title', 'Cuenta')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('flash::message')

                <div class="panel panel-default">
                    <div class="panel-heading text-center">Datos personales</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('estudiante.cuenta.update', Auth::user()->id) }}"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            @include('layouts.general.datos_cuenta')

                        </form>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading text-center">Seguridad</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('estudiante.password.update', Auth::user()->id) }}">
                            {!! csrf_field() !!}

                            @include('layouts.general.password_cuenta')

                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading text-center">Certificado de inglés</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('estudiante.cuenta.certificado', Auth::user()->id) }}"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('certificado') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Subir certificado de inglés</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-open-file"></i></span>
                                        <input type="file" class="form-control" name="certificado">

                                    </div>
                                    @if ($errors->has('certificado'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('certificado') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        </i>Guardar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
