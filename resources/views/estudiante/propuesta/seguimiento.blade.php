@extends('layouts.app')

@section('title', 'Segumiento propuesta')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-ellipsis-h iconoizq"></i>Seguimiento {{ $propuesta->titulo }}</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <li>

                                @if($propuesta->estado=='enviada')
                                    <div class="timeline-badge primary"><i class="fa fa-paper-plane"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-paper-plane"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Enviada</h4>

                                    </div>
                                    <div class="timeline-body">
                                        <p>La propuesta fue creada y ahora la persona encargada podrá asignar los
                                            jurados que la evaluaran cuando lo considere oportuno.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">

                                @if($propuesta->estado=='en espera')
                                    <div class="timeline-badge primary"><i class="fa fa-clock-o fa-lg"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-clock-o"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">En espera</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Los jurados que evaluaran la propuesta ya fueron asignados por el coordinador
                                            del énfasis correspondiente y ahora podrán analizarla para posteriormente
                                            decidir si se acepta la propuesta, se recomiendan cambios o se aplaza.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                @if($propuesta->estado=='a modificar')
                                    <div class="timeline-badge primary"><i class="fa fa-pencil-square-o fa-lg"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-pencil-square-o fa-lg"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">A modificar</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>La propuesta ya fue evaluada por los jurados y se llego al acuerdo de que la
                                            propuesta debe ser sometida a modificaciones para ser sujeta nuevamente a
                                            evaluación por parte de los jurados.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                @if($propuesta->estado=='modificada')
                                    <div class="timeline-badge primary"><i class="fa fa-file"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-file"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Modificada</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Se realizaron cambios en la propuesta por parte del estudiante y ahora puede
                                            ser sometida nuevamente a evaluación por los jurados.</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                @if($propuesta->estado=='aplazada')
                                    <div class="timeline-badge danger"><i class="fa fa-exclamation fa-lg"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-exclamation fa-lg"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Aplazada</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Se decidió por mayoría del jurado que la propuesta se aplaza. En este caso es
                                            recomendable presentar una nueva propuesta en lugar de realizar
                                            modificaciones.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                @if($propuesta->estado=='aceptada')
                                    <div class="timeline-badge success"><i class="fa fa-check"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-check"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Aceptada</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>La propuesta fue aceptada y hay luz verde para empezar el trabajo de grado de
                                            la Maestría en Ingeniería.</p>
                                    </div>
                                </div>

                            </li>

                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.panel -->
@endsection
