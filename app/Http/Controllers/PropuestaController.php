<?php
namespace App\Http\Controllers;

use App\Documentos;
use App\Http\Requests;
use App\Http\Requests\PropuestaRequest;
use App\Notificacion;
use App\Propuesta;
use App\User;
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
        //$propuesta->save();

        $f         = $request->file('propuesta');
        $att       = new Documentos();
        $att->name = $f->getClientOriginalName();
        // $att->file = base64_encode(file_get_contents($f->getRealPath()));
        $att->mime         = $f->getMimeType();
        $att->size         = $f->getSize();
        $att->propuesta_id = $propuesta->id;
        /* $att->save();
 
         $notificacion= new Notificacion();
         $notificacion->notificarRegistroPropuesta($propuesta);
 
         Flash::success("Se ha registrado la propuesta ".$propuesta->titulo." de forma exitosa");
         return redirect()->route('estudiante.propuesta.index');*/
        dd($f);

    }


    /**
     * Asigna los jurados a la propuesta indicada.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar_jurados(Request $request, $id)
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
        // $file = Documentos::where('propuesta_id', $id);
        $file      = Documentos::where('propuesta_id', $id)->first();
        $propuesta = base64_decode($file->file);

        header("Content-type: $file->mime");
        header("Content-length: $file->size");
        echo $propuesta;
        exit;
    }


    /**
     * Muestra al estudiante la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta($id)
    {
        $propuesta = Propuesta::find($id);

        return view('estudiante.propuesta.ver')->with('propuesta', $propuesta);
    }


    /**
     * Muestra al director de grado la propuesta que indique.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show_propuesta_dir($id)
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
    public function show_propuesta_consejo($id)
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
    public function show_propuesta_jurado($id)
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
        $propuesta = User::find($id);

        return view('estudiante.propuesta.editar')->with('propuesta', $propuesta);

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
