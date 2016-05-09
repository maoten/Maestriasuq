@extends('layouts.app')

@section('title', 'Segumiento trabajo de grado')

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
                        <h4><i class="fa fa-ellipsis-h iconoizq"></i>Seguimiento {{ $trabajogrado->titulo }}</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <li>

                                @if($trabajogrado->estado=='enviado')
                                    <div class="timeline-badge primary"><i class="fa fa-paper-plane"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-paper-plane"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Enviado</h4>

                                    </div>
                                    <div class="timeline-body">
                                        <p>El trabajo de grado fue creado y ahora la persona encargada podrá asignar los
                                            jurados que lo evaluaran cuando lo considere oportuno.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">

                                @if($trabajogrado->estado=='en espera')
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
                                        <p>Los jurados que evaluaran el trabajo de grado ya fueron asignados por el
                                            coordinador
                                            del énfasis correspondiente y ahora podrán analizarlo para posteriormente
                                            decidir si se acepta el trabajo de grado, se recomiendan cambios o se
                                            aplaza.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                @if($trabajogrado->estado=='a modificar')
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
                                        <p>El trabajo de grado ya fue evaluado por los jurados y se llego al acuerdo de
                                            que el
                                            trabajo de grado debe ser sometido a modificaciones para ser sujeto
                                            nuevamente a
                                            evaluación por parte de los jurados.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                @if($trabajogrado->estado=='modificado')
                                    <div class="timeline-badge primary"><i class="fa fa-file"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-file"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Modificado</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Se realizaron cambios en el trabajo de grado por parte del estudiante y ahora
                                            puede
                                            ser sometido nuevamente a evaluación por los jurados.</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                @if($trabajogrado->estado=='aplazado')
                                    <div class="timeline-badge danger"><i class="fa fa-exclamation fa-lg"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-exclamation fa-lg"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Aplazado</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Se decidió por mayoría del jurado que el trabajo de grado se aplaza. En este
                                            caso es
                                            recomendable presentar un nuevo trabajo de grado en lugar de realizar
                                            modificaciones.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                @if($trabajogrado->estado=='aceptado')
                                    <div class="timeline-badge success"><i class="fa fa-check"></i>
                                    </div>
                                @else
                                    <div class="timeline-badge default"><i class="fa fa-check"></i>
                                    </div>
                                @endif

                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Aceptado</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>El trabajo de grado fue aceptado.</p>
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
