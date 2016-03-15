<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class ConsejoController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
     	$consejo = User::where('type', 'consejo')->orderBy('id','ASC')->paginate(4);
     	return view('admin.consejo.index')->with('consejo',$consejo);

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.consejo.registrar');

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

    	$consejo = new User($request->all());
    	$consejo->password =bcrypt($request->password);
    	$consejo->type='consejo_curricular';
    	$consejo->image='/imagenes/usuarios/'.$name;
    	$consejo->save();

    	$image=new Image();
    	$image->name=$name;
    	$image->user()->associate($consejo);
    	$image->save();

    	Flash::success("Se ha registrado ".$consejo->name." de forma exitosa");
    	return redirect()->route('admin.consejo.index');
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
