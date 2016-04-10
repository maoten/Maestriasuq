@extends('layouts.app')

@section('title', 'Jurados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component2.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
<div class="container">
 @include('layouts.general.nav_admin')
</br>
<div class="row">
  <div class="col-md-12">
    @include('flash::message')

    <div class="panel panel-default ">
      <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Jurados</h4></div>

      <div class="panel-body text-justify">

        <div class="row">
          
          <form class="form-horizontal" role="form" method="GET" action="{{ route('admin.jurados.index') }}" aria-describedby='search'>
            <div class="input-group busqueda">
              <input type="text" class="form-control" placeholder="nombre o cédula" name="nombre" aria-hidden="true">
              <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
            </div>
          </form>

        </div>
        <HR>
          <table class='table table-bordered'>
            <thead>
              <th class="active">ID</th>
              <th>Cédula</th> 
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Email</th>
              <th>Profesión</th>
              <th>Propuestas</th>
              <th>Rol</th>

              <tbody>
                @foreach($jurados as $jurado)
                
                <tr> 
                  <form class="form-horizontal" role="form" method="GET" action="{{ route('consejo.jurados.asignar_pro', $jurado->id) }}" >

                    <td>{{ $jurado->id }}</td>
                    <td>{{ $jurado->cc }}</td>
                    <td>{{ $jurado->nombre }}</td>
                    <td>{{ $jurado->telefono }}</td>
                    <td>{{ $jurado->email }}</td>
                    <td>{{ $jurado->profesion }}</td>
                    <td>
                      <select class="form-control" name="propuestas_jur" >

                        @foreach(App\Propuesta_jurado::where('user_id',  $jurado->id)->get() as $propuestas)
                        <?php $propuesta= App\Propuesta::find($propuestas->propuesta_id); ?>

                        <option value="{{$propuesta->id}}">{{$propuesta->titulo}}</option>

                        @endforeach  
                      </select>
                    </td>

                    <td><h4><span class="label label-success">{{ $jurado->rol }}</span></h4></td>
          
                 </form>
               </tr>

               @endforeach   
             </tbody>
           </thead>
         </table>

         {!! $jurados->render()!!}

       </div>
     </div>
   </div>
 </div>
</div> 
@endsection
