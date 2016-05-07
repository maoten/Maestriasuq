<?php
namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Requests;
use App\Notificacion;
use App\Propuesta;
use App\Evaluacion;
use Illuminate\Http\Request;
use App\Http\Requests\EvaluacionRequest;
use Laracasts\Flash\Flash;



class JuradoController extends Controller
{

    /**
     * Store a newly created resource in storage.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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

        $evaluacion = new Evaluacion();
        $evaluacion->evaluacion   = '/sistema/evaluaciones/' . $name;
        $evaluacion->propuesta_id = $propuesta->id;
        $evaluacion->user_id = $request->user_id;

        $estado = $request->opciones;

       if ($estado==1) {
           $evaluacion->estado = 'aceptada';
       }else if($estado==2){
           $evaluacion->estado = 'a modificar';
       }else if($estado==3){
           $evaluacion->estado = 'aplazada';
       }

        $evaluacion->save();

        Flash::success("Se ha enviado tu evaluación de forma exitosa");

        return redirect()->route('jurado.propuestas.index');

    }

}
