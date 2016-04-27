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
            <li>
                <a href="{{ route('director.propuestas.index') }}">
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
                <a href="{{ route('director.notificaciones.index') }}">
          <span class="icon">
            <i class="fa fa-bell-o"></i>
          </span>
                    <span>Notificaciones</span>
                </a>
            </li>
           
            <li>
                <a href="{{ route('director.documentos.index')}}">
          <span class="icon">
            <i class="fa fa-files-o"></i>
          </span>
                    <span>Documentos</span>
                </a>
            </li>
             <li>
                <a href="{{ route('director.calendario.index') }}">
          <span class="icon">
            <i class="fa fa-calendar-o"></i>
          </span>
                    <span>Calendario</span>
                </a>
            </li>
        </ul>
    </nav>
</div>