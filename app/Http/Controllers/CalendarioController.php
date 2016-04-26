<?php
namespace App\Http\Controllers;

use App\Evento;
use App\Http\Requests;
use Illuminate\Http\Request;

//use App\Http\Requests\CalendarioRequest;

class CalendarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $calendario = Evento::all();

        return view('admin.calendario.index')->with('calendario', $calendario);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calendario.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*        $comentario               = new Comentario();
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
        
                return redirect()->back();*/

    }

}
