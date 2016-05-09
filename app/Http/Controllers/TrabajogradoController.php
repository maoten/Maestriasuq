<?php

namespace App\Http\Controllers;

use App\Documentos;
use App\Http\Requests;
use App\Http\Requests\EditarTrabajoGradoRequest;
use App\Http\Requests\TrabajoGradoRequest;
use App\Notificacion;
use App\Propuesta;
use App\Trabajogrado;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TrabajogradoController extends Controller
{

    public $trabajosGrado = 'trabajosgrado';

    public $rutaE = 'estudiante.trabajogrado.index';

    public $trabajogradoN = 'trabajogrado';

    public $trabajogradoId = 'trabajogrado_id';


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajosgrado = Trabajogrado::orderBy('id', 'ASC')->paginate(10);

        return view($this->rutaE)->with($this->trabajosGrado, $trabajosgrado);
    }


    /**
     * Muestra una lista de los trabajos de grado para el administrador.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrabajosgrado(Request $request)
    {
        $trabajosgrado = Trabajogrado::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('admin.trabajosgrado.index')->with($this->trabajosGrado, $trabajosgrado);
    }


    /**
     * Muestra una lista de los trabajos de grado para el director de grado.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrabajosgradoDir(Request $request)
    {
        $trabajosgrado = Trabajogrado::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('director.trabajosgrado.index')->with($this->trabajosGrado, $trabajosgrado);
    }


    /**
     * Muestra una lista de los trabajos de grado para el miembro del consejo currricular.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrabajosgradoConsejo(Request $request)
    {
        $trabajosgrado = Trabajogrado::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('consejo.trabajosgrado.index')->with($this->trabajosGrado, $trabajosgrado);
    }


    /**
     * Muestra una lista de los trabajos de grado para el jurado.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrabajosgradoJurado(Request $request)
    {
        $trabajosgrado = Trabajogrado::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('jurado.trabajosgrado.index')->with($this->trabajosGrado, $trabajosgrado);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('estudiante.trabajogrado.registrar');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TrabajoGradoRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajoGradoRequest $request)
    {
        $propuesta = Propuesta::find($request->propuesta_id);

        $trabajogrado               = new Trabajogrado();
        $trabajogrado->titulo       = $request->titulo;
        $trabajogrado->user_id      = $request->user_id;
        $trabajogrado->propuesta_id = $propuesta->id;
        $trabajogrado->dir_id       = $propuesta->dir_id;
        $trabajogrado->enf_id       = $propuesta->enf_id;
        $trabajogrado->mod_id       = $propuesta->mod_id;

        $trabajogrado->save();

        $file = $request->file($this->trabajogradoN);
        $name = 'maestriauq_' . $request->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\trabajosgrado';
        $file->move($path, $name);
        $att                  = new Documentos();
        $att->nombre          = '/sistema/trabajosgrado/' . $name;
        $att->trabajogrado_id = $trabajogrado->id;
        $att->save();

        $notificacion = new Notificacion();
        $notificacion->notificarRegistroTrabajogrado($trabajogrado);
        Flash::success("Se ha registrado el trabajo de grado " . $trabajogrado->titulo . " de forma exitosa");

        return redirect()->route($this->rutaE);
    }


    /**
     * Muestra al estudiante el trabajo de grado que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrabajogrado($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('estudiante.trabajogrado.ver')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra al administrador el trabajo de grado que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrabajogradoAdmin($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('admin.trabajosgrado.ver')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra al director de grado el trabajo de grado que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrabajogradoDir($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('director.trabajosgrado.ver')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra al miembro del consejo curricular el trabajo de grado que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrabajogradoConsejo($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('consejo.trabajosgrado.ver')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra al jurado el trabajo de grado que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrabajogradoJurado($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('jurado.trabajosgrado.ver')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra el estado del trabajo de grado en una línea de tiempo.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showSeguimiento($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('estudiante.trabajogrado.seguimiento')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('estudiante.trabajogrado.editar')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra la vista de la citación del trabajo de grado.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCitacion($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('admin.trabajosgrado.citacion')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Muestra la evaluación del trabajo de grado.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvaluacion($id)
    {
        $trabajogrado = Trabajogrado::find($id);

        return view('jurado.trabajosgrado.evaluacion')->with($this->trabajogradoN, $trabajogrado);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(EditarTrabajoGradoRequest $request, $id)
    {
        $trabajogrado         = Trabajogrado::find($id);
        $trabajogrado->estado = 'modificado';
        $trabajogrado->disertacion()->delete();
        $trabajogrado->evaluaciones()->delete();
        
        $trabajogrado->save();
        $file = $request->file($this->trabajogradoN);
        $name = 'maestriauq_' . $trabajogrado->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\trabajosgrado';
        $file->move($path, $name);
        $nombre = '/sistema/trabajosgrado/' . $name;
        Documentos::where($this->trabajogradoId, $id)->update([ 'nombre' => $nombre ]);
        Flash::warning("El adjunto de la trabajogrado " . $trabajogrado->titulo . " ha sido editado");

        return redirect()->route($this->rutaE);
    }

}