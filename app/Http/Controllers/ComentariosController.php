<?php
namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Requests;
use App\Notificacion;
use App\Propuesta;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

//use App\Http\Requests\ComentarioRequest;

class ComentariosController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

}
