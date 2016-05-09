@extends('layouts.app')

@section('title', 'Registro trabajo de grado')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading text-center">Registro de trabajo de grado</div>
                    <div class="panel-body">


                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/estudiante/trabajogrado') }}"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <?php $propuesta_user = App\Propuesta::where('user_id',
                                    Auth::user()->id)->orderBy('updated_at', 'desc')->get(); ?>
                            <input type="hidden" class="form-control" name="propuesta_id"
                                   value="{{ $propuesta_user->first()->id }}">


                            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Título</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                        <input type="text" class="form-control" name="titulo"
                                               value="{{ old('titulo') }}"
                                               placeholder="">

                                    </div>

                                    @if ($errors->has('titulo'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('trabajogrado') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Trabajo de grado</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-open-file"></i></span>
                                        <input type="file" class="form-control" name="trabajogrado">

                                    </div>
                                    @if ($errors->has('trabajogrado'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('trabajogrado') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" name="registrar"
                                            onclick="return confirm('¿Esta seguro/a de que desea registrar este trabajo de grado? \n Sólo se podrá editar el trabajo de grado si los jurados consideran que se debe someter a modificaciones.')">
                                        Registrar
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
