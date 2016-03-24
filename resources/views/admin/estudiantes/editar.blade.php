@extends('layouts.app')

@section('title', 'Edición de estudiante')
@section('css')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pGenerator.jquery.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('flash::message')
            <!-- @include('layouts.errors')-->

            <div class="panel panel-default">
                <div class="panel-heading text-center">Edición de estudiante</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="PUT" action="{{ route('admin.estudiantes.update', [$estudiante]) }}">


                     <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="nombre" value="{{ $estudiante->nombre }}" placeholder="Leonardo Correa" >

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
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <input type="text" class="form-control" name="cc" value="{{ $estudiante->cc }}" placeholder="1098626573" >

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
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" name="email" value="{{ $estudiante->email }}" placeholder="lcorrea@uniquindio.edu.co" >

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
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="text" class="form-control" name="telefono" value="{{ $estudiante->telefono }}" placeholder="3007645231" >

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
                                <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <input type="text" class="form-control" name="profesion" value="{{ $estudiante->profesion }}" placeholder="Ingeniero de sistemas y computación" >

                            </div>
                            @if ($errors->has('profesion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profesion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('unievrsidad') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Universidad</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                <input type="text" class="form-control" name="universidad" value="{{ $estudiante->universidad }}"placeholder="Universidad del Quindío" >

                            </div>
                            @if ($errors->has('unievrsidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('unievrsidad') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <!--<div class="form-group{{ $errors->has('iamgen') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Imagen de usuario</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="file" class="form-control" name="imagen">

                            </div>
                            @if ($errors->has('imagen'))
                            <span class="help-block">
                                <strong>{{ $errors->first('imagen') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Contraseña</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="text" class="form-control" id="password" name="password" placeholder="" >

                            </div>
                            <a href="#" class="left" id="myLink" style="margin-left:20px; margin-top:6px;">Generar contraseña</a>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <script>
                      $('#myLink').pGenerator({
                        'bind': 'click',
                        'displayElement': '#password',
                        'passwordLength': 10,
                        'uppercase': false,
                        'lowercase': true,
                        'numbers':   true,
                        'specialChars': false,
                        'onPasswordGenerated': function(generatedPassword) { }
                    });  
                </script>
-->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" name="editar">
                        </i>Editar
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

