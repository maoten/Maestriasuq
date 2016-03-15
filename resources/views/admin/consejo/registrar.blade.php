@extends('layouts.app')

@section('title', 'Registro de miembro del consejo curricular')
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
                <div class="panel-heading text-center">Registro de miembro del consejo curricular</div>
                <div class="panel-body">



                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/consejo') }}"  enctype="multipart/form-data" >
                     {!! csrf_field() !!}


                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Leonardo Correa" >

                            </div>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('cc') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Cédula</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <input type="text" class="form-control" name="cc" value="{{ old('cc') }}" placeholder="1098626573" >

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
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="lcorrea@uniquindio.edu.co" >

                            </div>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Teléfono</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="3007645231" >

                            </div>
                            @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Profesión</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <input type="text" class="form-control" name="profession" value="{{ old('profession') }}" placeholder="Ingeniero de sistemas y computación" >

                            </div>
                            @if ($errors->has('profession'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profession') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('college') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Universidad</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                <input type="text" class="form-control" name="college" value="{{ old('college') }}"placeholder="Universidad del Quindío" >

                            </div>
                            @if ($errors->has('college'))
                            <span class="help-block">
                                <strong>{{ $errors->first('college') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('iamge') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Imagen de usuario</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="file" class="form-control" name="image" placeholder="Universidad del Quindío">

                            </div>
                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
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

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" name="registrar">
                        </i>Registrar
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

