@extends('layouts.app')

@section('title', 'Documentos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component2.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
<div class="container">
    @include('layouts.general.nav_estudiante')
</br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-files-o iconoizq"></i>Documentos de interés</h4></div>

            <div class="panel-body">
            @include('layouts.general.documentos')

            </div>
        </div>

    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection