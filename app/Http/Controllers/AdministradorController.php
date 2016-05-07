<?php
namespace App\Http\Controllers;

use App\Documentos;
use App\Evento;
use App\Http\Requests;
use App\Http\Requests\PropuestaRequest;
use App\Http\Requests\EditarPropuestaRequest;
use App\Http\Requests\CitacionRequest;
use App\JuradoPropuesta;
use App\Notificacion;
use App\Propuesta;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class AdministradorController extends Controller
{



    public $propuesta_id='propuesta_id';
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
     * Cita al estudiante y a los jurado a una disertación.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
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

        $evento              = new Evento();
        $evento->asunto      = $request->asunto;
        $evento->descripcion = $request->descripcion;
        $evento->lugar       = $request->lugar;
        $evento->propuesta_id= $propuesta->id;

        $date1                = new DateTime($request->inicio);
        $evento->fecha_inicio = date_format($date1, 'Y-m-d H:i:s');

        $date2             = new DateTime($request->fin);
        $evento->fecha_fin = date_format($date2, 'Y-m-d H:i:s');

        $evento->save();

        $evento->users()->sync($jurados);

        Flash::success("Se han citado a las personas involucradas a la disertación  de la propuesta " . $propuesta->titulo . ".");

        return redirect()->route('admin.propuestas.index');


    }
    
     /**
     * canela la disetación de la propuesta indicada.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
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

        $evento              = Evento::where($this->propuesta_id,$propuesta->id);
        $evento->delete();
         

        Flash::success("Se ha cancelado la disertación  de la propuesta " . $propuesta->titulo . ".");

        return redirect()->back();


    }

}
