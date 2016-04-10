@extends('layouts.app')

@section('title', 'Registro de propuesta')
<!--@section('css')
<link rel="stylesheet" href="{{ asset('css/component.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection-->
@section('content')
<div class="container">
  <!--@include('layouts.general.nav_estudiante')
</br>-->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading text-center">Registro de propuesta</div>
            <div class="panel-body">



                <form class="form-horizontal" role="form" method="POST" action="{{ url('/estudiante/propuesta') }}"  enctype="multipart/form-data" >
                 {!! csrf_field() !!}

                 <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">

                 <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Título</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                            <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" placeholder="" >

                        </div>

                        @if ($errors->has('titulo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('titulo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('enfoque') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Enfoque</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <select class="form-control" name="enfoque">
                              <option value="Investigación">Investigación</option>
                              <option value="Profundización">Profundización</option>
                          </select>

                      </div>
                      @if ($errors->has('enfoque'))
                      <span class="help-block">
                        <strong>{{ $errors->first('enfoque') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dir_id') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Director</label>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select class="form-control" name="dir_id" >
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                        <select class="form-control" name="enfasis" >
                          @foreach((App\Enfasis::all()) as $enf)
                            <option value="{{$enf->nombre}}">{{$enf->nombre}}</option>
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-open-file"></i></span>
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
                    <button type="submit" class="btn btn-primary" name="registrar">
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

