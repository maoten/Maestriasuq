@extends('layouts.app')

@section('title', 'Director de grado')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>

@endsection

@section('content')

    <div class="container">
        @include('layouts.general.nav_director')
        </br>

        @include('layouts.general.index')
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection