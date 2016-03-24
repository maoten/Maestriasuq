 @extends('layouts.app')

 @section('title', 'Administrador')


 @section('css')
 <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
 <script src="{{ asset('js/modernizr.custom.js') }}"></script>

 @endsection

 @section('content')

 <div class="container">
   @include('layouts.general.nav_admin')
   <div class="row">
      <div class="col-md-12">
 <div class="panel panel-default ">
      <div class="panel-body text-justify">
        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborums.</h1>
        </div>
      </div>
      </div>
  </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/nav_estudiante.js') }}"></script>
@endsection