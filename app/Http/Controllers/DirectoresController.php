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
     public function index()
     {
     	$directores = User::where('type', 'director_grado')->orderBy('id','ASC')->paginate(4);
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
    	if($request->file('image')){
    		$file=$request->file('image');
    		$name='maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
    		$path=public_path().'\imagenes\usuarios';
    		$file->move($path,$name);
    	}else{
    		//imagen por defecto
    		$name='user.jpg';
    	}

    	$director = new User($request->all());
    	$director->password =bcrypt($request->password);
    	$director->type='director_grado';
    	$director->image='/imagenes/usuarios/'.$name;
    	$director->save();

    	$image=new Image();
    	$image->name=$name;
    	$image->user()->associate($director);
    	$image->save();

    	Flash::success("Se ha registrado ".$director->name." de forma exitosa");
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
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
