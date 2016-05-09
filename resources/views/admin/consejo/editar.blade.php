@extends('layouts.app')

@section('title', 'Edición de miembro del consejo curricular')
@section('css')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/pGenerator.jquery.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('flash::message')

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><span class="glyphicon glyphicon-pencil iconoizq"
                                                         aria-hidden="true"></span>Edición de miembro del consejo
                            curricular</h4></div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="PUT"
                              action="{{ route('admin.consejo.update', [$consejo]) }}">


                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="nombre"
                                               value="{{ $consejo->nombre }}" placeholder="Leonardo Correa">

                                    </div>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('cc') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Cédula</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-asterisk"></i></span>
                                        <input type="text" class="form-control" name="cc" value="{{ $consejo->cc }}"
                                               placeholder="1098626573">

                                    </div>
                                    @if ($errors->has('cc'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('cc') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo electrónico</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" class="form-control" name="email"
                                               value="{{ $consejo->email }}" placeholder="lcorrea@uniquindio.edu.co">

                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Teléfono</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                                        <input type="text" class="form-control" name="telefono"
                                               value="{{ $consejo->telefono }}" placeholder="3007645231">

                                    </div>
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Profesión</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-star-empty"></i></span>
                                        <input type="text" class="form-control" name="profesion"
                                               value="{{ $consejo->profesion }}"
                                               placeholder="Ingeniero de sistemas y computación">

                                    </div>
                                    @if ($errors->has('profesion'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('profesion') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('universidad') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Universidad</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                                <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-education"></i></span>
                                        <input type="text" class="form-control" name="universidad"
                                               value="{{ $consejo->universidad }}"
                                               placeholder="Universidad del Quindío">

                                    </div>
                                    @if ($errors->has('universidad'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('universidad') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('coordinador') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Coordinador de Énfasis</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        @if(count(App\Coordinador::where('user_id',$consejo->id)->get())==0)
                                            <h4><span class="label label-default">No</span></h4>
                                        @else
                                            <h4><span class="label label-default">Si</span></h4>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="checkbox">¿Eliminar rol de
                                                    coordinador?</label>
                                            </div>
                                        @endif

                                    </div>

                                    @if ($errors->has('coordinador'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('coordinador') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" name="editar">
                                        Editar
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

