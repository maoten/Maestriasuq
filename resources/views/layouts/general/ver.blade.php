@extends('layouts.app')

@section('title', 'Documentos')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-files-o iconoizq"></i>Propuesta</h4></div>

                    <div class="panel-body">
                        <div class="text-center">
                            <a href="{{ route('director.propuesta.show', $propuesta->id) }}" target="_blank">
                                <img src="{{ asset('imagenes/pdf.png') }}">
                                <h5>{{ $propuesta->titulo }}</h5>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-files-o iconoizq"></i>Comentarios</h4></div>

                    <div class="panel-body">
                        <form>
                            <h5>Sin comentarios</h5>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection