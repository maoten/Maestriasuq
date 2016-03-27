<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class EstudiantesController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {

     	$estudiantes = User::where('rol', 'estudiante')->search($request->nombre)->orderBy('id','ASC')->paginate(10);
     	return view('admin.estudiantes.index')->with('estudiantes',$estudiantes);

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.estudiantes.registrar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

    	$name='user.jpg';
    	$estudiante = new User($request->all());
    	$estudiante->password =bcrypt($request->password);
    	$estudiante->rol='estudiante';
    	$estudiante->imagen='/imagenes/usuarios/'.$name;
    	$estudiante->save();

    	Flash::success("Se ha registrado ".$estudiante->nombre." de forma exitosa");
    	return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$estudiante=User::find($id);
        return view('admin.estudiantes.editar')->with('estudiante', $estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $estudiante=User::find($id);
     $estudiante->nombre=$request->nombre;
     $estudiante->cc=$request->cc;
     $estudiante->telefono=$request->telefono;
     $estudiante->profesion=$request->profesion;
     $estudiante->universidad=$request->universidad;
     $estudiante->email=$request->email;
     $estudiante->save();
     Flash::warning("El estudiante ".$estudiante->nombre." ha sido editado");
     return redirect()->route('admin.estudiantes.index');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante=User::find($id);
        $estudiante->delete();
        Flash::error("Se ha eliminado ".$estudiante->nombre." de forma exitosa");
        return redirect()->route('admin.estudiantes.index');
  }
}
