<?php
namespace App\Http\Controllers;

use App\Documentos;
use App\Http\Requests;
use App\Http\Requests\EditarPropuestaRequest;
use App\Http\Requests\PropuestaRequest;
use App\Notificacion;
use App\Propuesta;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PropuestaController extends Controller
{

    public $propuestaS = 'propuestas';

    public $rutaE = 'estudiante.propuesta.index';

    public $propuestaN = 'propuesta';

    public $propuestaId = 'propuesta_id';


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propuestas = Propuesta::orderBy('id', 'ASC')->paginate(10);

        return view($this->rutaE)->with($this->propuestaS, $propuestas);
    }


    /**
     * Muestra una lista de las propuestas para el administrador.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestas(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('admin.propuestas.index')->with($this->propuestaS, $propuestas);
    }


    /**
     * Muestra una lista de las propuestas para el director de grado.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestasDir(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('director.propuestas.index')->with($this->propuestaS, $propuestas);
    }


    /**
     * Muestra una lista de las propuestas para el miembro del consejo currricular.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestasConsejo(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('consejo.propuestas.index')->with($this->propuestaS, $propuestas);
    }


    /**
     * Muestra una lista de las propuestas para el jurado.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPropuestasJurado(Request $request)
    {
        $propuestas = Propuesta::search($request->titulo)->orderBy('id', 'ASC')->paginate(10);

        return view('jurado.propuestas.index')->with($this->propuestaS, $propuestas);
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
     * @param PropuestaRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PropuestaRequest $request)
    {
        $propuesta = new Propuesta($request->all());
        if ( ! empty( $request->enfasis )) {
            $propuesta->enf_id = $request->enfasis;
        }
        if ( ! empty( $request->modalidad )) {
            $propuesta->mod_id = $request->modalidad;
        }
        $propuesta->save();
        $file = $request->file($this->propuestaN);
        $name = 'maestriauq_' . $request->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\propuestas';
        $file->move($path, $name);
        $att               = new Documentos();
        $att->nombre       = '/sistema/propuestas/' . $name;
        $att->propuesta_id = $propuesta->id;
        $att->save();
        $notificacion = new Notificacion();
        $notificacion->notificarRegistroPropuesta($propuesta);
        Flash::success("Se ha registrado la propuesta " . $propuesta->titulo . " de forma exitosa");

        return redirect()->route($this->rutaE);
    }


    /**
     * Muestra al estudiante la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPropuesta($id)
    {
        $propuesta = Propuesta::find($id);

        return view('estudiante.propuesta.ver')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra al administrador la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPropuestaAdmin($id)
    {
        $propuesta = Propuesta::find($id);

        return view('admin.propuestas.ver')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra al director de grado la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPropuestaDir($id)
    {
        $propuesta = Propuesta::find($id);

        return view('director.propuestas.ver')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra al miembro del consejo curricular la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPropuestaConsejo($id)
    {
        $propuesta = Propuesta::find($id);

        return view('consejo.propuestas.ver')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra al jurado la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPropuestaJurado($id)
    {
        $propuesta = Propuesta::find($id);

        return view('jurado.propuestas.ver')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra el estado de la propuesta en una línea de tiempo.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showSeguimiento($id)
    {
        $propuesta = Propuesta::find($id);

        return view('estudiante.propuesta.seguimiento')->with($this->propuestaN, $propuesta);
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
        $propuesta = Propuesta::find($id);

        return view('estudiante.propuesta.editar')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra la vista de citación de la propuesta.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCitacion($id)
    {
        $propuesta = Propuesta::find($id);

        return view('admin.propuestas.citacion')->with($this->propuestaN, $propuesta);
    }


    /**
     * Muestra la vista para la evaluación de la propuesta.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvaluacion($id)
    {
        $propuesta = Propuesta::find($id);

        return view('jurado.propuestas.evaluacion')->with($this->propuestaN, $propuesta);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EditarPropuestaRequest $request
     * @param  int                   $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(EditarPropuestaRequest $request, $id)
    {
        $propuesta         = Propuesta::find($id);
        $propuesta->estado = 'modificada';
        $propuesta->disertacion()->delete();
        $propuesta->evaluaciones()->delete();

        $propuesta->save();
        $file = $request->file($this->propuestaN);
        $name = 'maestriauq_' . $propuesta->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\propuestas';
        $file->move($path, $name);
        $nombre = '/sistema/propuestas/' . $name;
        Documentos::where($this->propuestaId, $id)->update([ 'nombre' => $nombre ]);
        Flash::warning("El adjunto de la propuesta " . $propuesta->titulo . " ha sido editado");

        return redirect()->route($this->rutaE);
    }

}