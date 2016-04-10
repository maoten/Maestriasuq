@extends('layouts.app')

@section('title', 'Jurados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/component2.css') }}">
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@endsection

@section('content')
<?php $coordinador=App\Coordinador::where('user_id',Auth::user()->id)->first() ?>
<div class="container">
 @include('layouts.general.nav_consejo')
</br>
<div class="row">
  <div class="col-md-12">
    @include('flash::message')

    <div class="panel panel-default ">
      <div class="panel-heading"><h4><i class="fa fa-users iconoizq"></i>Jurados</h4></div>

      <div class="panel-body text-justify">

        <div class="row">

          <div class="col-md-8">

            <a href="{{ route('consejo.jurados.create')}}" class="btn btn-primary">Registrar nuevo jurado<i class="fa fa-plus iconoder"></i></a>

          </div>

          <form class="form-horizontal" role="form" method="GET" action="{{ route('consejo.jurados.index') }}" aria-describedby='search'>
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
              <th class="active col-sm-1">Cédula</th> 
              <th class="active col-sm-1">Nombre</th>
              <th class="active col-sm-1">Teléfono</th>
              <th class="active col-sm-1">Email</th>
              <th class="active col-sm-1">Profesión</th>
              <th class="active col-sm-2">Propuestas</th>
              <th class="active col-sm-1">Rol</th>
              <th class="active col-sm-4">Acción</th>

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


                    <td>
                      <div class="row">
                        <a href="{{ route('consejo.jurados.edit', $jurado->id) }}" class="btn btn-warning" title="Editar"><i class="fa fa-wrench" ></i>
                        </a> 
                        <a href="{{ route('consejo.jurados.destroy', $jurado->id) }}" onclick="return confirm('¿Deseas eliminar este jurado?')"  class="btn btn-danger" title="Eliminar"><i class="fa fa-exclamation-triangle"></i>
                        </a>

                        <div class="col-xs-6">
                          <div class="input-group">
                           <select class="form-control" name="pro_id" >
                             @foreach((App\Propuesta::where('enf_nombre', $coordinador->enf_nombre)->get()) as $propuesta)
                             <option value="{{$propuesta->id}}">{{$propuesta->titulo}}</option>
                             @endforeach 
                           </select>
                           <span class="input-group-btn">
                             <button type="submit" class="btn btn-primary" name="registrar">
                               <i class="fa fa-plus"></i>
                             </button>
                           </span>
                         </div>
                       </div>
                     </div>

                   </td>           
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
