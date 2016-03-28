@extends('layouts.app')

@section('title', 'Propuesta')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-file-pdf-o iconoizq"></i>Propuesta</h4></div>

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
				<div class="panel-heading"><h4><i class="fa fa-comments-o iconoizq"></i>Comentarios</h4></div>

				<div class="panel-body">

					<!-- comentario -->
					<div class="col-sm-1">
						<div class="thumbnail">
							<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
						</div>
					</div>

					<div class="col-md-11">
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
							</div>
							<div class="panel-body">
								Panel content
							</div>
						</div>
					</div>
					<!-- /comentario -->

					<!--<form class="form-horizontal" role="form" method="POST" action="{{ route('director.comentarios.store') }}" >
						{!! csrf_field() !!}

						<div class="input-group"> 
							<input class="form-control" placeholder="Añadir comentario" type="text" name="comentario">
							<input class="hidden" type="text" name="user" value="{{ $propuesta->user_id }}">
							<input class="hidden" type="text" name="director" value="{{ $propuesta->dir_id }}">
							<input class="hidden" type="text" name="propuesta" value="{{ $propuesta->id }}">


							<span class="input-group-btn">

								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i></button>

							</span>

							

						</div>
					</form>-->

				</div>
			</div>

		</div>
	</div>
</div>
@endsection
