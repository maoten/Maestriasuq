<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notificacion;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;


class NotificacionesController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archivar($id)
    {
    	$not=Notificacion::find($id);
        $not->estado='leida';
        $not->save();
        return redirect()->back();
    }

}
