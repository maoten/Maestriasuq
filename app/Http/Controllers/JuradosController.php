<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Jurado;
use App\Propuesta_jurado;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;


class JuradosController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
        $jurado = User::where('rol', 'jurado')->search($request->nombre)->orderBy('id','ASC')->paginate(10);
        return view('consejo.jurados.index')->with('jurados',$jurado);

    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function indexJurados(Request $request)
     {
        $jurado = User::where('rol', 'jurado')->search($request->nombre)->orderBy('id','ASC')->paginate(10);
        return view('admin.jurados.index')->with('jurados',$jurado);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('consejo.jurados.registrar');

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

        $jurado = new User($request->all());
        $jurado->password =bcrypt($request->password);
        $jurado->rol='jurado';
        $jurado->imagen='/imagenes/usuarios/'.$name;
        $jurado->save();

        $jurad= new Jurado();
        $jurad->user_id=$jurado->id;
        $jurad->save();

        Flash::success("Se ha registrado ".$jurado->nombre." de forma exitosa");
        return redirect()->route('consejo.jurados.index');
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function asignar_pro(Request $request, $id)
    {


        $pro= new Propuesta_jurado();
        $pro->propuesta_id=$request->pro_id;
        $pro->user_id=$id;
        $pro->save();

        Flash::success("Se ha asignado la propuesta de forma exitosa");
        return redirect()->route('consejo.jurados.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$jurado=User::find($id);
        return view('consejo.jurados.editar')->with('jurado', $jurado);
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
     $jurado=User::find($id);
     $jurado->nombre=$request->nombre;
     $jurado->cc=$request->cc;
     $jurado->telefono=$request->telefono;
     $jurado->profesion=$request->profesion;
     $jurado->universidad=$request->universidad;
     $jurado->email=$request->email;
     $jurado->save();
     Flash::warning("El jurado ".$jurado->nombre." ha sido editado");
     return redirect()->route('consejo.jurados.index');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurado=User::find($id);
        $jurado->delete();
        Flash::error("Se ha eliminado ".$jurado->nombre." de forma exitosa");
        return redirect()->route('consejo.jurados.index');

    }
}
