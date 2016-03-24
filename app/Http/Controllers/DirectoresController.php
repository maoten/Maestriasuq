<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class DirectoresController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
     	$directores = User::where('rol', 'director_grado')->search($request->nombre)->orderBy('id','ASC')->paginate(10);
        return view('admin.directores.index')->with('directores',$directores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.directores.registrar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
    	if($request->file('imagen')){
    		$file=$request->file('imagen');
    		$name='maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
    		$path=public_path().'\imagenes\usuarios';
    		$file->move($path,$name);
    	}else{
    		//imagen por defecto
    		$name='user.jpg';
    	}

    	$director = new User($request->all());
    	$director->password =bcrypt($request->password);
    	$director->rol='director_grado';
    	$director->imagen='/imagenes/usuarios/'.$name;
    	$director->save();

    	$image=new Image();
    	$image->nombre=$name;
    	$image->user()->associate($director);
    	$image->save();

    	Flash::success("Se ha registrado ".$director->nombre." de forma exitosa");
    	return redirect()->route('admin.directores.index');
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
    	$director=User::find($id);
        return view('admin.directores.editar')->with('director', $director);
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
        $director=User::find($id);
        $director->nombre=$request->nombre;
        $director->cc=$request->cc;
        $director->telefono=$request->telefono;
        $director->profesion=$request->profesion;
        $director->universidad=$request->universidad;
        $director->email=$request->email;
        $director->save();
        Flash::warning("El director ".$director->nombre." ha sido editado");
        return redirect()->route('admin.directores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $director=User::find($id);
        $director->delete();
        Flash::error("Se ha eliminado ".$director->nombre." de forma exitosa");
        return redirect()->route('admin.directores.index');
    }
}
