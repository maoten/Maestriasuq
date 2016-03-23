 @extends('layouts.app')

@section('title', 'Administrador')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-body">
                    <h1>Administrar Usuarios</h1>
                </div>
                
            <header>
                    <nav class="navi">
                        <ul class="uli">
                            <li  class="lis"><a href="#" class="as"><span class="primero"><i class="icon icon-user"></i></span> Directores</a>
                                <ul class="uli">
                                    <li class="lis"><a href="#" class="as">Registrar Directores</a></li>
                                    <li class="lis"><a href="#" class="as">Visualizar Directores</a></li>
                                    <li class="lis"><a href="#" class="as">Actualizar Directores</a></li>
                                    
                                </ul>
                            </li>
                            <li  class="lis"><a href="#" class="as"><span class="segundo"><i class="icon icon-user"></i></span> estudiantes</a>
                                <ul class="uli">
                                    <li class="lis"><a href="#" class="as">Registrar estudiantes</a></li>
                                    <li class="lis"><a href="#" class="as">Visualizar estudiantes</a></li>
                                    <li class="lis"><a href="#" class="as">Actualizar estudiantes</a></li>
                                    
                                </ul>
                            </li>
                            <li class="lis"><a href="#" class="as"><span class="tercero"><i class="icon icon-user"></i></span>Jurados</a>
                                 <ul class="uli">
                                    <li class="lis"><a href="#" class="as">Registrar Jurados</a></li>
                                    <li class="lis"><a href="#" class="as">Visualizar Jurados</a></li>
                                    <li class="lis"><a href="#" class="as">Actualizar Jurados</a></li>
                                    
                                </ul>
                            </li>
                            <li class="lis"><a href="#" class="as"><span class="cuarto"><i class="icon icon-text"></i></span>Curricular</a>
                                 <ul class="uli">
                                    <li class="lis"><a href="#" class="as">Registrar Curricular</a></li>
                                    <li class="lis"><a href="#" class="as">Visualizar Curricular</a></li>
                                    <li class="lis"><a href="#" class="as">Actualizar Curricular</a></li>
                                    
                                </ul>
                            </li>
                            <li class="lis"><a href="#" class="as"><span class="quinto"><i class="icon icon-mail"></i></span>Contacto</a></li>
                        </ul>
                    </nav>
                </header>
        </div>
    </div>
    </div>
</div>

@endsection


