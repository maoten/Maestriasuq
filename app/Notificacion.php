<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string notificacion
 */
class Notificacion extends Model
{

    public $tequeremos = " te queremos informar que la propuesta ";

    public $tequeremos2 = " te queremos informar que el trabajo de grado ";

    public $hola = "Hola ";

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
     * Notifica al estudiante que su propuesta ya fue evaluada
     *
     * @param $estudiante
     *
     * @return bool
     */
    public function notificarEvaluacion($propuesta)
    {
        // se le notifica al estudiante que la propuesta ya fue evaluada

        $estudiante = User::find($propuesta->user_id);

        $notification               = new Notificacion();
        $notification->user_id      = $estudiante->id;
        $notification->notificacion = $this->hola . $estudiante->nombre . $this->tequeremos . $propuesta->titulo . " ya fue evaluada, para ver las evaluaciones de los jurados debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notification->save();

        return true;
    }

    /**
     * Notifica al estudiante que su trabajo de grado ya fue evaluado
     *
     * @param $estudiante
     *
     * @return bool
     */
    public function notificarEvaluacionTrabajogrado($trabajogrado)
    {
        // se le notifica al estudiante que su trabajo de grado ya fue evaluada

        $estudiante = User::find($trabajogrado->user_id);

        $notification               = new Notificacion();
        $notification->user_id      = $estudiante->id;
        $notification->notificacion = $this->hola . $estudiante->nombre . $this->tequeremos2 . $trabajogrado->titulo . " ya fue evaluado, para ver las evaluaciones de los jurados debes ir a la opción 'Trabajo de grado' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver trabajo de grado).";
        $notification->save();

        return true;
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

        $notification               = new Notificacion();
        $notification->user_id      = $estudiante->id;
        $notification->notificacion = $this->hola . $estudiante->nombre . $this->tequeremos . $propuesta->titulo . " tiene un nuevo comentario. Para ver los jurados de tu propuesta y los comentarios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notification->save();

        return true;
    }


    /**
     * Notifica al estudiante que un jurado comento su trabajo de grado
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarComentarioTrabajogrado($propuesta)
    {
        // se le notifica al estudiante que el trabajo de grado tiene un nuevo comentario

        $estudiante = User::find($trabajogrado->user_id);

        $notification               = new Notificacion();
        $notification->user_id      = $estudiante->id;
        $notification->notificacion = $this->hola . $estudiante->nombre . $this->tequeremos . $trabajogrado->titulo . " tiene un nuevo comentario. Para ver los jurados de tu trabajo de grado y los comentarios que realicen, debes ir a la opción 'Trabajo de grado' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver trabajo de grado).";
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
        $jurado = User::find($jurados);

        $notificacion               = new Notificacion();
        $notificacion->user_id      = $jurado->id;
        $notificacion->notificacion = $this->hola . $jurado->nombre . " te queremos informar que se te fue asignada la propuesta " . $propuesta->titulo . ". Para ver la propuesta y realizar comentarios, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notificacion->save();

        return true;
    }


    /**
     * Notifica a los jurados que un trabajo de grado les fue asignado
     *
     * @param $trabajogrado
     * @param $jurados
     *
     * @return bool
     * @internal param $propuesta
     */
    public function notificarAsignacionTrabajogrado($trabajogrado, $jurados)
    {
        // se le notifica a los jurados que se les asigno un trabajo de grado
        $jurado = User::find($jurados);

        $notificacion               = new Notificacion();
        $notificacion->user_id      = $jurado->id;
        $notificacion->notificacion = $this->hola . $jurado->nombre . " te queremos informar que se te fue asignado el trabajo de grado " . $trabajogrado->titulo . ". Para ver el trabajo de grado y realizar comentarios, debes ir a la opción 'Trabajos de grado' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver trabajo de grado).";
        $notificacion->save();

        return true;
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

        $notificacion               = new Notificacion();
        $notificacion->user_id      = $estudiante->id;
        $notificacion->notificacion = $this->hola . $estudiante->nombre . " te queremos informar que ya fueron asignados los jurados que se encargarán de evaluar tu propuesta " . $propuesta->titulo . ". Para ver los jurados de tu propuesta y los comentarios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
        $notificacion->save();

        return true;

    }


    /**
     * Notifica al estudiante que se asignaron los jurados que evaluaran su trabajo de grado.
     *
     * @param $trabajogrado
     *
     * @return bool
     * @internal param $propuesta
     *
     */
    public function notificarAsignacionJuradosTrabajogrado($trabajogrado)
    {

        // se le notifica al estudiante que el trabajo de grado ya cuenta con jurados

        $estudiante = User::find($trabajogrado->user_id);

        $notificacion               = new Notificacion();
        $notificacion->user_id      = $estudiante->id;
        $notificacion->notificacion = $this->hola . $estudiante->nombre . " te queremos informar que ya fueron asignados los jurados que se encargarán de evaluar tu trabajo de grado " . $trabajogrado->titulo . ". Para ver los jurados de tu trabajo de grado y los comentarios que realicen, debes ir a la opción 'Trabajo de grado' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver trabajo de grado).";
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

        $notificacion1               = new Notificacion();
        $notificacion1->user_id      = $director->id;
        $notificacion1->notificacion = $this->hola . $director->nombre . $this->tequeremos . $propuesta->titulo . " en la cual apareces como director de grado ya fue enviada al coordinador del énfasis correspondiente. Puedes encontrar las propuestas en las cuales eres director de grado en la opción 'Propuestas' del menú principal.";
        $notificacion1->save();

        // se le notifica al coordinador de enfasis que una propuesta de sus enfasis fue enviada
        $coordinador = Coordinador::where('enf_id', $propuesta->enf_id)->first();
        $consejo     = User::find($coordinador->user_id);
        $enfasis     = Enfasis::find($propuesta->enf_id);

        $notificacion2               = new Notificacion();
        $notificacion2->user_id      = $consejo->id;
        $notificacion2->notificacion = $this->hola . $consejo->nombre . $this->tequeremos . $propuesta->titulo . " perteneciente al énfasis del cual eres coordinador ya se encuentra disponible para su revisión. Puedes encontrar las propuestas del énfasis en " . $enfasis->nombre . " en la opción 'Propuestas' del menú principal.";
        $notificacion2->save();

        return true;

    }


    /**
     * Notifica al director de grado del trabajo de grado y al director
     * del énfasis que el trabajo de grado fue enviada.
     *
     * @param $trabajogrado
     *
     * @return bool
     * @internal param $propuesta
     *
     */
    public function notificarRegistroTrabajogrado($trabajogrado)
    {

        // se le notifica al director de grado que el trabajo de grado ya fue enviada

        $director = User::find($trabajogrado->dir_id);

        $notificacion1               = new Notificacion();
        $notificacion1->user_id      = $director->id;
        $notificacion1->notificacion = $this->hola . $director->nombre . $this->tequeremos2 . $trabajogrado->titulo . " en el cual apareces como director de grado ya fue enviado al coordinador del énfasis correspondiente. Puedes encontrar los trabajos de grado en los cuales eres director de grado en la opción 'Trabajos de grado' del menú principal.";
        $notificacion1->save();

        // se le notifica al coordinador de enfasis que un trabajo grado de sus enfasis fue enviado
        $coordinador = Coordinador::where('enf_id', $trabajogrado->enf_id)->first();
        $consejo     = User::find($coordinador->user_id);
        $enfasis     = Enfasis::find($trabajogrado->enf_id);

        $notificacion2               = new Notificacion();
        $notificacion2->user_id      = $consejo->id;
        $notificacion2->notificacion = $this->hola . $consejo->nombre . $this->tequeremos2 . $trabajogrado->titulo . " perteneciente al énfasis del cual eres coordinador ya se encuentra disponible para su revisión. Puedes encontrar los trabajos de grado del énfasis en " . $enfasis->nombre . " en la opción 'Trabajos de grado' del menú principal.";
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
        $notificacion               = new Notificacion();
        $notificacion->user_id      = $usuario->id;
        $notificacion->notificacion = $this->hola . $usuario->nombre . " te damos la bienvenida al Sistema de gestión de la Maestría en Ingeniería de la Universidad del Quindío. Si necesitas ayuda para empezar puedes dirigirte a la opción 'ayuda' en el menu despegable que aparecerá al hacer click en tu nombre en la barra superior.";
        $notificacion->save();

        return true;
    }


    /**
     * Notifica al usuario indicado de la disertación de la propuesta.
     *
     * @param $usuario
     *
     * @param $propuesta
     * @param $fecha
     *
     * @return bool
     */
    public function notificarDisertacion($usuario, $propuesta, $fecha)
    {
        $propuesta                  = Propuesta::find($propuesta);
        $usuario                    = User::find($usuario);
        $notificacion               = new Notificacion();
        $notificacion->user_id      = $usuario->id;
        $notificacion->notificacion = $this->hola . $usuario->nombre . " te queremos informar que la propuesta " . $propuesta->titulo . " ya tiene asignada una disertación en la siguiente fecha: " . $fecha . ". Para más información revisa la opción 'Calendario' del menú principal.";
        $notificacion->save();

        return true;
    }

    /**
     * Notifica al usuario indicado de la cancelación de la disertación de la propuesta.
     *
     * @param $usuario
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarCancelacionDisertacion($usuario, $propuesta)
    {
        $propuesta                  = Propuesta::find($propuesta);
        $usuario1                    = User::find($usuario);
        $notificacion               = new Notificacion();
        $notificacion->user_id      = $usuario;
        $notificacion->notificacion = $this->hola . $usuario1->nombre . " te queremos informar que la disertación de la propuesta " . $propuesta->titulo . " ha sido cancelada.";
        $notificacion->save();

        return true;
    }


    /**
     * Notifica al usuario indicado de la disertación del trabajo de grado.
     *
     * @param $usuario
     *
     * @param $trabajogrado
     * @param $fecha
     *
     * @return bool
     */
    public function notificarDisertacionTrabajogrado($usuario, $trabajogrado, $fecha)
    {
        $trabajogrado               = Trabajogrado::find($trabajogrado);
        $usuario                    = User::find($usuario);
        $notificacion               = new Notificacion();
        $notificacion->user_id      = $usuario;
        $notificacion->notificacion = $this->hola . $usuario->nombre . " te queremos informar que el trabajo de grado " . $trabajogrado->titulo . " ya tiene asignada una disertación en la siguiente fecha: " . $fecha . ". Para mas información revisa la opción 'Calendario' del menú principal.";
        $notificacion->save();

        return true;
    }

     /**
     * Notifica al usuario indicado de la cancelación de la disertación del trabajo de grado.
     *
     * @param $usuario
     *
     * @param $propuesta
     *
     * @return bool
     */
    public function notificarCancelacionDisertacionTrabajogrado($usuario, $trabajogrado)
    {
        $trabajogrado               = Trabajogrado::find($trabajogrado);
        $usuario1                    = User::find($usuario);
        $notificacion               = new Notificacion();
        $notificacion->user_id      = $usuario;
        $notificacion->notificacion = $this->hola . $usuario1->nombre . " te queremos informar que la disertación del trabajo de grado " . $trabajogrado->titulo . " ha sido cancelada.";
        $notificacion->save();

        return true;
    }

}
