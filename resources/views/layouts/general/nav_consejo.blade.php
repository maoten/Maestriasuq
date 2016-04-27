<div class="main clearfix">
    <nav id="menu" class="opciones">
        <ul>
            <li>
                <a href="{{ route('director.index')}}">
          <span class="icon">
            <i class="fa fa-home"></i>
          </span>
                    <span>Inicio</span>
                </a>
            </li>
            @if( (App\Coordinador::where('user_id',Auth::user()->id)->first() )!=null)
                <li>
                    <a href="{{ route('consejo.propuestas.index') }}">
          <span class="icon"> 
            <i class="fa fa-file-text-o"></i>
          </span>
                        <span>Propuestas</span>
                    </a>
                </li>
                <li>
                    <a href="">
          <span class="icon">
            <i class="fa fa-file-text"></i>
          </span>
                        <span>Trabajos de grado</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('consejo.jurados.index') }}">
          <span class="icon">
            <i class="fa fa-users"></i>
          </span>
                        <span>Jurados</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('consejo.notificaciones.index') }}">
          <span class="icon">
            <i class="fa fa-bell-o"></i>
          </span>
                    <span>Notificaciones</span>
                </a>
            </li>
            <li>
                <a href="">
          <span class="icon">
            <i class="fa fa-files-o"></i>
          </span>
                    <span>Documentos</span>
                </a>
            </li>
             <li>
                <a href="{{ route('consejo.calendario.index') }}">
          <span class="icon">
            <i class="fa fa-calendar"></i>
          </span>
                    <span>Calendario</span>
                </a>
            </li>
        </ul>
    </nav>
</div>