@extends('layouts.app')

@section('title', 'Cuenta')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                                <div class="panel-heading text-center">Datos personales</div>
                                <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="POST" action="">
                                                
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Correo electrónico</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                        <input type="email" class="form-control" name="email" value="jugranados@uniquindio.edu.co" placeholder="lcorrea@uniquindio.edu.co">
                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-4 control-label">Teléfono</label>
                                                        
                                                        <div class="col-md-6">
                                                                <div class="input-group">
                                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                                        <input type="text" class="form-control" name="cedula" value="3117568255" placeholder="3007645231">
                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                </i>Actualizar datos
                                                        </button>
                                                </div>
                                        </div>
                                        
                                </form>
                        </div>
                </div>
                
                
                <div class="panel panel-default">
                        <div class="panel-heading text-center">Seguridad</div>
                        <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="">
                                        
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Contraseña</label>
                                                
                                                <div class="col-md-6">
                                                        <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                                <input type="password" class="form-control" name="password" placeholder="*******">
                                                                
                                                                
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Confirmar contraseña</label>
                                                
                                                <div class="col-md-6">
                                                        <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                                                                <input type="password" class="form-control" name="password_confirmation" placeholder="*******">
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                        </i>Cambiar contraseña
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
