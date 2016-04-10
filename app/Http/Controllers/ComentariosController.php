<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use App\Comentario;
use Laracasts\Flash\Flash;
use App\Http\Requests\ComentarioRequest;


class ComentariosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $comentario = new Comentario();
        $comentario->propuesta_id=$request->propuesta;
        $comentario->user_id=$request->user;
        $comentario->comentarios=$request->comentario;
        $comentario->save();

        Flash::success("Se ha agregado el comentario de forma exitosa");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
