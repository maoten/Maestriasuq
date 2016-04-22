<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string notificacion
 */
class Notificacion extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "notificaciones";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notificacion',
        'user_id',
        'created_at'
    ];


    public function usuario()
    {
        return $this->hasOne('App\User', 'foreign_key');
    }


    /**
     * Notifica al estudiante que un jurado comento su propuesta
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarComentario($propuesta)
    {
        // se le notifica al estudiante que la propuesta tiene un nuevo comentario

        $estudiante = User::find($propuesta->user_id);

        $notification          = new Notificacion();
        $notification->user_id = $estudiante->id;
        $notification->notificacion = "Hola " . $estudiante->nombre . " te queremos informar que la propuesta " . $propuesta->titulo . " tiene un nuevo comentario. Para ver los jurados de tu propuesta y los comentatios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notification->save();

        return true;
    }


    /**
     * Notifica a los jurados que una propuesta les fue asignada
     *
     * @param $propuesta
     * @param $jurados
     *
     * @return bool
     */
    public function notificarAsignacionPropuesta($propuesta, $jurados)
    {
        // se le notifica a los jurados que se les asigno una propuesta
        for ($i = 0; $i < count($jurados); $i++) {
            $jurado = User::find($jurados[$i]);

            $notificacion          = new Notificacion();
            $notificacion->user_id = $jurado->id;
            $notificacion->notificacion = "Hola " . $jurado->nombre . " te queremos informar que se te fue asignada la propuesta " . $propuesta->titulo . ". Para ver la propuesta y realizar comentarios, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
            $notificacion->save();

            return true;
        }

        return false;
    }


    /**
     * Notifica al estudiante que se asignaron los jurados que evaluaran su propuesta.
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarAsignacionJurados($propuesta)
    {

        // se le notifica al estudiante que la propuesta ya cuenta con jurados

        $estudiante = User::find($propuesta->user_id);

        $notificacion          = new Notificacion();
        $notificacion->user_id = $estudiante->id;
        $notificacion->notificacion = "Hola " . $estudiante->nombre . " te queremos informar que ya fueron asignados los jurados que se encargarán de evaluar tu propuesta " . $propuesta->titulo . ". Para ver los jurados de tu propuesta y los comentatios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notificacion->save();

        return true;

    }


    /**
     * Notifica al director de grado de la propuesta y al director
     * del énfasis que la propuesta fue enviada.
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarRegistroPropuesta($propuesta)
    {

        // se le notifica al director de grado que la propuesta ya fue enviada

        $director = User::find($propuesta->dir_id);

        $notificacion1          = new Notificacion();
        $notificacion1->user_id = $director->id;
        $notificacion1->notificacion = "Hola " . $director->nombre . " te queremos informar que la propuesta " . $propuesta->titulo . " en la cual apareces como director de grado ya fue enviada al coordinador del énfasis correspondiente. Puedes encontrar las propuestas en las cuales eres director de grado en la opción 'Propuestas' del menú principal.";
        $notificacion1->save();

        // se le notifica al coordinador de enfasis que una propuesta de sus enfasis fue enviada
        $coordinador = Coordinador::where('enf_id', $propuesta->enf_id)->first();
        $consejo     = User::find($coordinador->user_id);
        $enfasis     = Enfasis::find($propuesta->enf_id);

        $notificacion2          = new Notificacion();
        $notificacion2->user_id = $consejo->id;
        $notificacion2->notificacion = "Hola " . $consejo->nombre . " te queremos informar que la propuesta " . $propuesta->titulo . " perteneciente al énfasis del cual eres coordinador ya se encuentra disponible para su revisión. Puedes encontrar las propuestas del énfasis en " . $enfasis->nombre . " en la opción 'Propuestas' del menú principal.";
        $notificacion2->save();

        return true;

    }


    /**
     * Notifica el registro en el sistema de gestión al usuario (Notificación de bienvenida).
     *
     * @param $usuario
     *
     * @return bool
     */
    public function notificarRegistro($usuario)
    {
        $notificacion = new Notificacion();
        $notificacion->user_id = $usuario->id;
        $notificacion->notificacion = "Hola " . $usuario->nombre . " te damos la bienvenida al Sistema de gestión de la Maestría en Ingeniería de la Universidad del Quindío. Si necesitas ayuda para empezar puedes dirigirte a la opción 'ayuda' en el menu despegable que aparecerá al hacer click en tu nombre en la barra superior.";
        $notificacion->save();

        return true;
    }
}
