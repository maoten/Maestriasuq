<?php
namespace App\Http\Controllers;

use App\Documentos;
use App\Evento;
use App\Http\Requests;
use App\Http\Requests\PropuestaRequest;
use App\Jurado_propuesta;
use App\Notificacion;
use App\Propuesta;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PropuestaController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propuestas = Propuesta::orderBy('id', 'ASC')->paginate(10);

        return view('estudiante.propuesta.index')->with('propuestas', $propuestas);
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

        return view('admin.propuestas.index')->with('propuestas', $propuestas);
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

        return view('director.propuestas.index')->with('propuestas', $propuestas);

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

        return view('consejo.propuestas.index')->with('propuestas', $propuestas);
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

        return view('jurado.propuestas.index')->with('propuestas', $propuestas);
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

        $file = $request->file('propuesta');
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

        return redirect()->route('estudiante.propuesta.index');

    }


    /**
     * Asigna los jurados a la propuesta indicada.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function asignarJurados(Request $request, $id)
    {

        $propuesta = Propuesta::find($id);

        if ($request->jurados == null) {
            $propuesta->jurados()->detach();
            Flash::success("Se han eliminado todos los jurados de la propuesta");

            $propuesta->estado = 'enviada';
            $propuesta->save();

            return redirect()->back();
        } else {

            $propuesta->jurados()->detach();

            $propuesta->jurados()->sync($request->jurados);

            $propuesta->estado = 'en espera';
            $propuesta->save();

            $notificacion = new Notificacion();
            $notificacion->notificarAsignacionJurados($propuesta);

            $notificacion2 = new Notificacion();
            $notificacion2->notificarAsignacionPropuesta($propuesta, $request->jurados);

            Flash::success("Se han asignado los jurados a la propuesta de forma exitosa");

            return redirect()->back();
        }
    }


    /**
     * Muestra el PDF de la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /* $pdf    = Documentos::where('propuesta_id', $id)->first();
         $nombre = '/privado/propuestas/'.$pdf->nombre;
     
         echo header('Location:'.$nombre);
         exit;*/
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

        return view('estudiante.propuesta.ver')->with('propuesta', $propuesta);
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

        return view('admin.propuestas.ver')->with('propuesta', $propuesta);
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

        return view('director.propuestas.ver')->with('propuesta', $propuesta);
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

        return view('consejo.propuestas.ver')->with('propuesta', $propuesta);
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

        return view('jurado.propuestas.ver')->with('propuesta', $propuesta);
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

        return view('estudiante.propuesta.seguimiento')->with('propuesta', $propuesta);
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

        return view('estudiante.propuesta.editar')->with('propuesta', $propuesta);

    }


    /**
     * Show the form for show the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCitacion($id)
    {
        $propuesta = Propuesta::find($id);

        return view('admin.propuestas.citacion')->with('propuesta', $propuesta);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update($id)
    {
        $propuesta         = Propuesta::find($id);
        $propuesta->estado = 'modificada';
        $propuesta->save();
        Flash::warning("El propuesta " . $propuesta->nombre . " ha sido editado");

        return redirect()->route('admin.propuestas.index');
    }


    /**
     * Cita al estudiante y a los juradoa a una disertación.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function citar(Request $request, $id)
    {

        $propuesta        = Propuesta::find($id);
        $estudiante       = User::find($propuesta->user_id);
        $propuesta_jurado = Jurado_propuesta::where('propuesta_id', $id)->get();

        $usuarios = [ ];

        for ($i = 0; $i < count($propuesta_jurado); $i++) {
            $usuarios[$i] = User::find($propuesta_jurado[$i]->jurado_id)->id;
        }

        array_push($usuarios, $estudiante->id);

        $evento              = new Evento();
        $evento->asunto      = $request->asunto;
        $evento->descripcion = $request->descripcion;
        $evento->lugar       = $request->lugar;

        $date1                = new DateTime($request->inicio);
        $evento->fecha_inicio = date_format($date1, 'Y-m-d H:i:s');

        $date2             = new DateTime($request->fin);
        $evento->fecha_fin = date_format($date2, 'Y-m-d H:i:s');

        $evento->save();

        $evento->users()->sync($usuarios);

        Flash::success("Se han citado a las personas involucradas a la disertación  de la propuesta " . $propuesta->titulo . ".");

        return redirect()->route('admin.propuestas.index');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
