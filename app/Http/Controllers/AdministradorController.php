<?php
namespace App\Http\Controllers;

use App\Evento;
use App\Http\Requests;
use App\Http\Requests\CitacionRequest;
use App\JuradoPropuesta;
use App\JuradoTrabajogrado;
use App\Notificacion;
use App\Propuesta;
use App\Trabajogrado;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class AdministradorController extends Controller
{

    public $propuesta_id = 'propuesta_id';

    public $trabajogrado_id = 'trabajogrado_id';


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

            for ($i = 0; $i < sizeof($request->jurados); $i++) {
                $notificacion2->notificarAsignacionPropuesta($propuesta, $request->jurados[$i]);
            }

            Flash::success("Se han asignado los jurados a la propuesta de forma exitosa");

            return redirect()->back();


        }
    }


    /**
     * Cita al estudiante y a los jurados a una disertación.
     *
     * @param CitacionRequest|Request $request
     * @param  int                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function citar(CitacionRequest $request, $id)
    {

        $propuesta        = Propuesta::find($id);
        $estudiante       = User::find($propuesta->user_id);
        $propuesta_jurado = JuradoPropuesta::where($this->propuesta_id, $id)->get();

        $jurados = [ ];

        for ($i = 0; $i < count($propuesta_jurado); $i++) {
            $jurados[$i] = User::find($propuesta_jurado[$i]->jurado_id)->id;
        }

        array_push($jurados, $estudiante->id);

        $evento               = new Evento();
        $evento->asunto       = $request->asunto;
        $evento->descripcion  = $request->descripcion;
        $evento->lugar        = $request->lugar;
        $evento->propuesta_id = $propuesta->id;

        $date1                = new DateTime($request->inicio);
        $evento->fecha_inicio = date_format($date1, 'Y-m-d H:i:s');

        $date2             = new DateTime($request->fin);
        $evento->fecha_fin = date_format($date2, 'Y-m-d H:i:s');

        $evento->save();

        $evento->users()->sync($jurados);

        $notificacion = new Notificacion();

        for ($i = 0; $i < sizeof($jurados); $i++) {
            $notificacion->notificarDisertacion($jurados[$i], $propuesta->id, $evento->fecha_inicio);
        }

        Flash::success("Se han citado a las personas involucradas a la disertación  de la propuesta " . $propuesta->titulo . ".");

        return redirect()->back();

    }


    /**
     * cancela la disetación de la propuesta indicada.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function cancelarCitacion($id)
    {

        $propuesta        = Propuesta::find($id);
        $estudiante       = User::find($propuesta->user_id);
        $propuesta_jurado = JuradoPropuesta::where($this->propuesta_id, $id)->get();

        $jurados = [ ];

        for ($i = 0; $i < count($propuesta_jurado); $i++) {
            $jurados[$i] = User::find($propuesta_jurado[$i]->jurado_id)->id;
        }

        array_push($jurados, $estudiante->id);

        $evento = Evento::where($this->propuesta_id, $propuesta->id);
        $evento->delete();

        Flash::success("Se ha cancelado la disertación  de la propuesta " . $propuesta->titulo . ".");

        return redirect()->back();


    }


    /**
     * Asigna los jurados al trabajo de grado indicado.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function asignarJuradosTrabajogrado(Request $request, $id)
    {

        $trabajogrado = Trabajogrado::find($id);

        if ($request->jurados == null) {
            $trabajogrado->jurados()->detach();
            Flash::success("Se han eliminado todos los jurados de el trabajo de grado");

            $trabajogrado->estado = 'enviado';
            $trabajogrado->save();

            return redirect()->back();
        } else {

            $trabajogrado->jurados()->detach();

            $trabajogrado->jurados()->sync($request->jurados);

            $trabajogrado->estado = 'en espera';
            $trabajogrado->save();

            $notificacion = new Notificacion();
            $notificacion->notificarAsignacionJuradosTrabajogrado($trabajogrado);

            $notificacion2 = new Notificacion();
            for ($i = 0; $i < sizeof($request->jurados); $i++) {
                $notificacion2->notificarAsignacionTrabajogrado($trabajogrado, $request->jurados);
            }

            Flash::success("Se han asignado los jurados al trabajo de grado de forma exitosa");

            return redirect()->back();
        }
    }


    /**
     * Cita al estudiante y a los jurados a una disertación.
     *
     * @param CitacionRequest|Request $request
     * @param  int                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function citarTrabajogrado(CitacionRequest $request, $id)
    {

        $trabajogrado        = Trabajogrado::find($id);
        $estudiante          = User::find($trabajogrado->user_id);
        $trabajogrado_jurado = JuradoTrabajogrado::where($this->trabajogrado_id, $id)->get();

        $jurados = [ ];

        for ($i = 0; $i < count($trabajogrado_jurado); $i++) {
            $jurados[$i] = User::find($trabajogrado_jurado[$i]->jurado_id)->id;
        }

        array_push($jurados, $estudiante->id);

        $evento                  = new Evento();
        $evento->asunto          = $request->asunto;
        $evento->descripcion     = $request->descripcion;
        $evento->lugar           = $request->lugar;
        $evento->trabajogrado_id = $trabajogrado->id;

        $date1                = new DateTime($request->inicio);
        $evento->fecha_inicio = date_format($date1, 'Y-m-d H:i:s');

        $date2             = new DateTime($request->fin);
        $evento->fecha_fin = date_format($date2, 'Y-m-d H:i:s');

        $evento->save();

        $evento->users()->sync($jurados);

        $notificacion = new Notificacion();

        for ($i = 0; $i < sizeof($jurados); $i++) {
            $notificacion->notificarDisertacionTrabajogrado($jurados[$i], $trabajogrado->id, $evento->fecha_inicio);
        }

        Flash::success("Se han citado a las personas involucradas a la disertación del trabajo de grado " . $trabajogrado->titulo . ".");

        return redirect()->back();

    }


    /**
     * cancela la disetación del trabajo de grado indicado.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function cancelarCitacionTrabajogrado($id)
    {

        $trabajogrado        = Trabajogrado::find($id);
        $estudiante          = User::find($trabajogrado->user_id);
        $trabajogrado_jurado = JuradoTrabajogrado::where($this->trabajogrado_id, $id)->get();

        $jurados = [ ];

        for ($i = 0; $i < count($trabajogrado_jurado); $i++) {
            $jurados[$i] = User::find($trabajogrado_jurado[$i]->jurado_id)->id;
        }

        array_push($jurados, $estudiante->id);

        $evento = Evento::where($this->trabajogrado_id, $trabajogrado->id);
        $evento->delete();

        Flash::success("Se ha cancelado la disertación  del trabajo de grado " . $trabajogrado->titulo . ".");

        return redirect()->back();


    }

}
