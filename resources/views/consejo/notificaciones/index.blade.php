@extends('layouts.app')

@section('title', 'Notificaciones')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/notificaciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        @include('layouts.general.nav_consejo')
        </br>
        <div class="row">
            <div class="col-md-12">
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-bell-o iconoizq"></i>Notificaciones</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">

                            <?php $notificaciones = App\Notificacion::where('user_id',
                                    Auth::user()->id)->where('estado', 'sin leer')->orderBy('created_at',
                                    'DES')->get(); ?>

                            @if(count($notificaciones)==0)
                                <h4>No tienes notificaciones sin leer.</h4>
                            @else

                                @foreach($notificaciones as $notificacion)
                                    <li>


                                        <div class="timeline-badge danger">
                                            <a href="{{ route('consejo.notificaciones.archivar', $notificacion->id)}}"
                                               class="x">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>

                                        <div class="timeline-panel">
                                            <?php $date = new DateTime($notificacion->created_at);
                                        $date->setTimezone(new DateTimeZone('America/Bogota'));
                                        ?>

                                                <small class="text-muted"><i
                                                            class="fa fa-clock-o"></i> {{  $date->format('Y-m-d H:i') }}
                                                </small>
                                            <div class="timeline-body">

                                                <h4 class="text-justify">{{ $notificacion->notificacion }}</h4>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            @endif


                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.panel -->
@endsection
@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection