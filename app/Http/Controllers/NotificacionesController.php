<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notificacion;

class NotificacionesController extends Controller
{

    /**
     * Archiva la notificación indicada.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */

    public function archivar($id)
    {
        $not         = Notificacion::find($id);
        $not->estado = 'leida';
        $not->save();

        return redirect()->back();
    }

}
