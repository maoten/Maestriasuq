@extends('layouts.app')

@section('title', 'Registro de estudiante')
@section('css')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pGenerator.jquery.js') }}"></script>
@endsection
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                @include('flash::message')
                @include('layouts.errors')

                        <div class="panel panel-default">
                                <div class="panel-heading text-center">Registro de estudiante de maestría</div>
                                <div class="panel-body">



                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/estudiantes/guardar') }}">
                                         {!! csrf_field() !!}

                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Nombre</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                        <input type="text" class="form-control" name="nombre" placeholder="Leonardo Correa" required>

                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Cédula</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                                        <input type="text" class="form-control" name="cedula" placeholder="1098626573" required>
                                                                        
                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Correo electrónico</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                        <input type="email" class="form-control" name="correo" placeholder="lcorrea@uniquindio.edu.co" required>
                                                                        
                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Teléfono</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                                        <input type="text" class="form-control" name="telefono" placeholder="3007645231" required>

                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Profesión</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                                                        <input type="text" class="form-control" name="profesion" placeholder="Ingeniero de sistemas y computación" required>

                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Universidad</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                                                        <input type="text" class="form-control" name="universidad" placeholder="Universidad del Quindío" required>
                                                                        
                                                                </div>
                                                        </div>
                                                </div>


                                        <!-- se requiere un generador de contraseñas aleatorias, luego cuando el usuario
                                        ingrese el mismo cambiara su contraseña -->
                                        
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Contraseña</label>
                                                
                                                <div class="col-md-6">
                                                        <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                                <input type="text" class="form-control" id="password" name="contrasena" placeholder="" required>
                                                                
                                                        </div>
                                                        <a href="#" class="left" id="myLink" style="margin-left:20px; margin-top:6px;">Generar contraseña</a>
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
                                        <label class="col-md-4 control-label">Imagen de usuario</label>

                                        <div class="col-md-6">
                                                <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                        <input type="file" class="form-control" name="imagen" placeholder="Universidad del Quindío">

                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
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

