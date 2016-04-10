<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Propuesta;
use App\Documentos;
use Laracasts\Flash\Flash;
use App\Http\Requests\PropuestaRequest;
use Illuminate\Http\Response;

class PropuestaController extends Controller
{

     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $propuestas = Propuesta::orderBy('id','ASC')->paginate(10);
       return view('estudiante.propuesta.index')->with('propuestas',$propuestas);
   }

     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
     public function indexPropuestas(Request $request)
     {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id','ASC')->paginate(10);
        return view('admin.propuestas.index')->with('propuestas',$propuestas);
    }

     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
     public function indexPropuestasDir(Request $request)
     {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id','ASC')->paginate(10);
        return view('director.propuestas.index')->with('propuestas',$propuestas);
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestasConsejo(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id','ASC')->paginate(10);
        return view('consejo.propuestas.index')->with('propuestas',$propuestas);
    }
     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestasJurado(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id','ASC')->paginate(10);
        return view('jurado.propuestas.index')->with('propuestas',$propuestas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('estudiante.propuesta.registrar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropuestaRequest $request)
    {
    	/*if($request->file('image')){
    		$file=$request->file('image');
    		$name='maestriauq_' . time() . '.' . $file->getClientOriginalExtension();
    		$path=public_path().'\imagenes\usuarios';
    		$file->move($path,$name);
    	}else{
    		//imagen por defecto
    		$name='user.jpg';
    	}*/


    	/*$image=new Image();
    	$image->name=$name;
    	$image->user()->associate($propuesta);
    	$image->save();*/

        $propuesta = new Propuesta($request->all());
        $propuesta->estado='enviada';
        $propuesta->enf_nombre=$request->enfasis;
        $propuesta->save();

        $f = $request->file('propuesta');
        $att = new Documentos();
        $att->name = $f->getClientOriginalName();
        $att->file = base64_encode(file_get_contents($f->getRealPath()));
        $att->mime = $f->getMimeType();
        $att->size = $f->getSize();
        $att->id = $propuesta->id;
        $att->save();

        Flash::success("Se ha registrado la propuesta ".$propuesta->nombre." de forma exitosa");
        return redirect()->route('estudiante.propuesta.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   $file = Documentos::find($id); //pendiente
   $propuesta= base64_decode($file->file);

   header("Content-type: $file->mime");
   header("Content-length: $file->size");
   echo $propuesta;
   exit;

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta($id)
    {
       $propuesta=Propuesta::find($id);


       return view('estudiante.propuesta.ver')->with('propuesta', $propuesta);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta_dir($id)
    {
       $propuesta=Propuesta::find($id);
       return view('director.propuestas.ver')->with('propuesta', $propuesta);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta_consejo($id)
    {
       $propuesta=Propuesta::find($id);
       return view('consejo.propuestas.ver')->with('propuesta', $propuesta);
   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta_jurado($id)
    {
       $propuesta=Propuesta::find($id);
       return view('jurado.propuestas.ver')->with('propuesta', $propuesta);
   }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function showSeguimiento($id)
     {
       $propuesta=Propuesta::find($id);
       return view('estudiante.propuesta.seguimiento')->with('propuesta', $propuesta);
   }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propuesta=User::find($id);
        return view('estudiante.propuesta.editar')->with('propuesta', $propuesta);

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
       $propuesta=Propuesta::find($id);
       $propuesta->estado='modificada';
       $propuesta->save();
       Flash::warning("El propuesta ".$propuesta->nombre." ha sido editado");
       return redirect()->route('admin.propuestas.index');
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
