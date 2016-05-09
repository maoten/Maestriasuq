<?php
namespace App\Http\Controllers;

use App\Comentario;
use App\Evaluacion;
use App\Http\Requests;
use App\Http\Requests\EvaluacionRequest;
use App\Notificacion;
use App\Propuesta;
use App\Trabajogrado;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class JuradoController extends Controller
{

    /**
     * Asigna un comentario a la propuesta indicada.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function comentar(Request $request)
    {

        /** @var Comentario $comentario */
        $comentario               = new Comentario();
        $comentario->propuesta_id = $request->propuesta;
        if ( ! empty( $request->user )) {
            $comentario->user_id = $request->user;
        }
        $comentario->comentarios = $request->comentario;
        $comentario->save();
        $propuesta    = Propuesta::find($request->propuesta);
        $notificacion = new Notificacion();
        $notificacion->notificarComentario($propuesta);

        Flash::success("Se ha agregado el comentario de forma exitosa");

        return redirect()->back();

    }


    /**
     * Asigna un evaluación la propuesta indicada.
     *
     * @param EvaluacionRequest|Request $request
     *
     * @param                           $id
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluar(EvaluacionRequest $request, $id)
    {

        $propuesta = Propuesta::find($id);

        $file = $request->file('evaluacion');
        $name = 'maestriauq_' . $propuesta->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\evaluaciones';
        $file->move($path, $name);

        $evaluacion               = new Evaluacion();
        $evaluacion->evaluacion   = '/sistema/evaluaciones/' . $name;
        $evaluacion->propuesta_id = $propuesta->id;
        $evaluacion->user_id      = $request->user_id;

        $estado = $request->opciones;

        if ($estado == 1) {
            $evaluacion->estado = 'aceptada';
        } else {
            if ($estado == 2) {
                $evaluacion->estado = 'a modificar';
            } else {
                if ($estado == 3) {
                    $evaluacion->estado = 'aplazada';
                }
            }
        }

        $evaluacion->save();

        $evaluaciones = Evaluacion::where('propuesta_id', $propuesta->id)->get();
        if ($evaluaciones->count() == 3) {
            $calificacion = '';
            if ($evaluaciones->where('estado', 'aceptada')->count() >= 2) {
                $calificacion = 'aceptada';
            } else {
                if ($evaluaciones->where('estado', 'aplazada')->count() >= 2) {
                    $calificacion = 'aplazada';
                } else {
                    if ($evaluaciones->where('estado', 'a modificar')->count() >= 2) {
                        $calificacion = 'a modificar';
                    }
                }
            }

            $propuesta->estado = $calificacion;
            $propuesta->save();
        }

        Flash::success("Se ha enviado tu evaluación de forma exitosa");

        return redirect()->route('jurado.propuestas.index');

    }


    /**
     * Asigna un comentario al trabajo de grado indicado.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function comentarTrabajogrado(Request $request)
    {

        /** @var Comentario $comentario */
        $comentario                  = new Comentario();
        $comentario->trabajogrado_id = $request->trabajogrado;
        if ( ! empty( $request->user )) {
            $comentario->user_id = $request->user;
        }
        $comentario->comentarios = $request->comentario;
        $comentario->save();
        $trabajogrado = Trabajogrado::find($request->trabajogrado);
        $notificacion = new Notificacion();
        $notificacion->notificarComentario($trabajogrado);

        Flash::success("Se ha agregado el comentario de forma exitosa");

        return redirect()->back();

    }


    /**
     * Asigna una evaluación al trabajo de grado indicado.
     *
     * @param EvaluacionRequest|Request $request
     *
     * @param                           $id
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluarTrabajogrado(EvaluacionRequest $request, $id)
    {

        $trabajogrado = Trabajogrado::find($id);

        $file = $request->file('evaluacion');
        $name = 'maestriauq_' . $trabajogrado->titulo . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\sistema\evaluaciones';
        $file->move($path, $name);

        $evaluacion                  = new Evaluacion();
        $evaluacion->evaluacion      = '/sistema/evaluaciones/' . $name;
        $evaluacion->trabajogrado_id = $trabajogrado->id;
        $evaluacion->user_id         = $request->user_id;

        $estado = $request->opciones;

        if ($estado == 1) {
            $evaluacion->estado = 'aceptado';
        } else {
            if ($estado == 2) {
                $evaluacion->estado = 'a modificar';
            } else {
                if ($estado == 3) {
                    $evaluacion->estado = 'aplazado';
                }
            }
        }

        $evaluacion->save();

        $evaluaciones = Evaluacion::where('trabajogrado_id', $trabajogrado->id)->get();
        if ($evaluaciones->count() == 3) {
            $calificacion = '';
            if ($evaluaciones->where('estado', 'aceptado')->count() >= 2) {
                $calificacion = 'aceptado';
            } else {
                if ($evaluaciones->where('estado', 'aplazado')->count() >= 2) {
                    $calificacion = 'aplazado';
                } else {
                    if ($evaluaciones->where('estado', 'a modificar')->count() >= 2) {
                        $calificacion = 'a modificar';
                    }
                }
            }

            $trabajogrado->estado = $calificacion;
            $trabajogrado->save();
        }

        Flash::success("Se ha enviado tu evaluación de forma exitosa");

        return redirect()->route('jurado.trabajosgrado.index');

    }

}
