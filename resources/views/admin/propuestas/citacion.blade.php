@extends('layouts.app')

@section('title', 'Citación a disetación')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                @include('flash::message')

                <div class="panel panel-default ">
                    <div class="panel-heading"><h4><i class="fa fa-calendar-check-o iconoizq"></i>Citación a disertación
                            de la propuesta: {{ $propuesta->titulo }}
                        </h4></div>

                    <div class="panel-body text-justify">
                        <?php $disertacion = App\Evento::where('propuesta_id', $propuesta->id)->first(); ?>

                        @if($disertacion!=null)
                            <p>Esta propuesta ya tiene asignada una disertación en la siguiente
                                fecha: {{ $disertacion->fecha_inicio }}, para más información revisa la opción
                                calendario.</p>


                            @if(App\Propuesta::find($propuesta->id)->estado!='aceptada' and App\Propuesta::find($propuesta->id)->estado!='aplazada')
                                <p>Para asignar una nueva fecha y cancelar la actual, haz click en el siguiente botón y
                                    llena el formulario.</p> <a
                                        href="{{ route('admin.propuesta.cancelarCitacion', $propuesta->id) }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Deseas cancelar esta disertación?')">Cancelar
                                    disertación</a>
                            @endif

                        @else


                            <form class="form-horizontal" role="form" method="GET"
                                  action="{{ route('admin.propuesta.citar', $propuesta->id) }}">
                                {!! csrf_field() !!}
                                <p class="text-justify">Se citara a la disertación a todos los involucrados con esta
                                    propuesta (estudiante, director de grado, jurados).</p>
                                <HR>

                                <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Asunto</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-font"></i></span>
                                            <input type="text" class="form-control" name="asunto"
                                                   value="{{ old('asunto') }}" placeholder="">

                                        </div>

                                        @if ($errors->has('asunto'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('asunto') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Descripción</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                    <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-text-width"></i></span>
                                            <input type="text" class="form-control" name="descripcion"
                                                   value="{{ old('descripcion') }}" placeholder="">

                                        </div>

                                        @if ($errors->has('descripcion'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('lugar') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Lugar</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-map-marker"></i></span>
                                            <input type="text" class="form-control" name="lugar"
                                                   value="{{ old('lugar') }}" placeholder="">

                                        </div>

                                        @if ($errors->has('lugar'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('lugar') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Inicio</label>

                                    <div class="col-md-6">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' class="form-control" name="inicio"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>


                                        @if ($errors->has('inicio'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('inicio') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Fin</label>

                                    <div class="col-md-6">
                                        <div class='input-group date' id='datetimepicker7'>
                                            <input type='text' class="form-control" name="fin"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>


                                        @if ($errors->has('fin'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('fin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" name="registrar">
                                            Citar
                                        </button>
                                    </div>
                                </div>


                            </form>
                        @endif

                        <script type="text/javascript">
                            $(function () {
                                var date = new Date();
                                var currentMonth = date.getMonth();
                                var currentDate = date.getDate();
                                var currentYear = date.getFullYear();
                                $('#datetimepicker6').datetimepicker({minDate: new Date(currentYear, currentMonth, currentDate)});
                                $('#datetimepicker7').datetimepicker({
                                    useCurrent: false //Important! See issue #1075
                                });
                                $("#datetimepicker6").on("dp.change", function (e) {
                                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                });
                                $("#datetimepicker7").on("dp.change", function (e) {
                                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
@endsection