@extends('layouts.app')

@section('title', 'Registro de propuesta')

@section('content')
    <div class="container">
        <!--@include('layouts.general.nav_estudiante')
                </br>-->
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading text-center">Registro de propuesta</div>
                    <div class="panel-body">


                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/estudiante/propuesta') }}"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Título</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                        <input type="text" class="form-control" name="titulo"
                                               value="{{ old('titulo') }}"
                                               placeholder="">

                                    </div>

                                    @if ($errors->has('titulo'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('titulo') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('modalidad') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Modalidad</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-info-sign"></i></span>
                                        <select class="form-control" name="modalidad" title="">
                                            @foreach((App\Modalidad::all()) as $modalidad)
                                                <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @if ($errors->has('modalidad'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('modalidad') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('dir_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Director</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <select class="form-control" name="dir_id" title="">
                                            @foreach((App\User::where('rol', 'director_grado')->get()) as $director)
                                                <option value="{{$director->id}}">{{$director->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('dir_id'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('dir_id') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('enfasis') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Énfasis</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-pushpin"></i></span>
                                        <select class="form-control" name="enfasis" title="">
                                            @foreach((App\Enfasis::all()) as $enf)
                                                @if(count(App\Coordinador::where('enf_id',$enf->id)->get())!=0)
                                                    <option value="{{$enf->id}}">{{$enf->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('enfasis'))
                                        <span class="help-block">
                    <strong>{{ $errors->first('enfasis') }}</strong>
                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('propuesta') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Propuesta</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-open-file"></i></span>
                                        <input type="file" class="form-control" name="propuesta">

                                    </div>
                                    @if ($errors->has('propuesta'))
                                        <span class="help-block">
                    <strong>{{ $errors->first('propuesta') }}</strong>
                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" name="registrar"
                                            onclick="return confirm('¿Esta seguro/a de que desea registrar esta propuesta? \n Sólo se podrá editar la propuesta si los jurados consideran que se debe someter a modificaciones.')">
                                        Registrar
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

