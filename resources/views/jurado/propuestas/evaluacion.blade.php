@extends('layouts.app')

@section('title', 'Evaluación propuesta')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">Evaluación {{ $propuesta->titulo }}</div>
                <div class="panel-body">


                    <form class="form-horizontal" role="form" method="POST"
                    action="{{ route('jurado.propuesta.evaluar', [$propuesta]) }}"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">


                    <div class="form-group{{ $errors->has('evaluacion') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Evaluación</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i
                                    class="glyphicon glyphicon-open-file"></i></span>
                                    <input type="file" class="form-control" name="evaluacion">

                                </div>
                                @if ($errors->has('evaluacion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('evaluacion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('opciones') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"></label>


                            <div class="col-md-6">
                             <p>Por favor selecciona la opción que indicaste en la plantilla de evaluación.</p>
                                <div class="input-group">
                                   <label class="radio-inline"><input type="radio" name="opciones" value="1">Se acepta</label>
                                   <label class="radio-inline"><input type="radio" name="opciones" value="2">Se acepta con modificaciones</label>
                                   <label class="radio-inline"><input type="radio" name="opciones" value="3">Se aplaza</label>
                               </div>
                                @if ($errors->has('opciones'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('opciones') }}</strong>
                                </span>
                                @endif
                           </div>
                       </div>

                       <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="evaluar">
                                Enviar evaluación
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

