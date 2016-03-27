@extends('layouts.app')

@section('title', 'Cuenta')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @include('flash::message')

          <div class="panel panel-default">
            <div class="panel-heading text-center">Datos personales</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.cuenta.update', Auth::user()->id) }}"  enctype="multipart/form-data" >
                    {!! csrf_field() !!}

                    @include('layouts.general.datos_cuenta')

                </form>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading text-center">Seguridad</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.password.update', Auth::user()->id) }}">
                    {!! csrf_field() !!}

                    @include('layouts.general.password_cuenta')

                </form>
            </div>
        </div>


    </div>
</div>
</div>
@endsection
