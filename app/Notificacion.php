<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    'notificacion', 'user_id','created_at'
    ];
    
    public function usuario(){
      return $this->hasOne('App\User','foreign_key');
    }
    
    public function notificarComentario($propuesta){
      // se le notifica al estudiante que la propuesta tiene un nuevo comentario

      $estudiante= User::find($propuesta->user_id);

      $not= new Notificacion();
      $not->user_id=$estudiante->id;
      $not->notificacion="Hola ".$estudiante->nombre." te queremos informar que la propuesta ".$propuesta->titulo." tiene un nuevo comentario. Para ver los jurados de tu propuesta y los comentatios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
      $not->save();
      return true;
    }

    public function notificarAsignacionPropuesta($propuesta,$jurados){
      // se le notifica a los jurados que se les asigno una propuesta
      for ($i=0; $i < count($jurados) ; $i++) { 
      $jurad= User::find($jurados[$i]);

      $not= new Notificacion();
      $not->user_id=$jurad->id;
      $not->notificacion="Hola ".$jurad->nombre." te queremos informar que se te fue asignada la propuesta ".$propuesta->titulo.". Para ver la propuesta y realizar comentarios, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
      $not->save();
      return true;
    }
  }

  public function notificarAsignacionJurados($propuesta){

      // se le notifica al estudiante que la propuesta ya cuenta con jurados

   $estudiante= User::find($propuesta->user_id);

   $not= new Notificacion();
   $not->user_id=$estudiante->id;
   $not->notificacion="Hola ".$estudiante->nombre." te queremos informar que ya fueron asignados los jurados que se encargarán de evaluar tu propuesta ".$propuesta->titulo.". Para ver los jurados de tu propuesta y los comentatios que realicen, debes ir a la opción 'Propuestas' del menú principal y en la columna 'Acción' seleccionar la primer opción (Ver propuesta).";
   $not->save();
   return true;


 }

 public function notificarRegistroPropuesta($propuesta){

      // se le notifica al director de grado que la propuesta ya fue enviada

   $director= User::find($propuesta->dir_id);

   $not1= new Notificacion();
   $not1->user_id=$director->id;
   $not1->notificacion="Hola ".$director->nombre." te queremos informar que la propuesta ".$propuesta->titulo." en la cual apareces como director de grado ya fue enviada al coordinador del énfasis correspondiente. Puedes encontrar las propuestas en las cuales eres director de grado en la opción 'Propuestas' del menú principal.";
   $not1->save();

     // se le notifica al coordinador de enfasis que una propuesta de sus enfasis fue enviada
   $coordinador= Coordinador::where('enf_id',$propuesta->enf_id)->first();
   $consejo=User::find($coordinador->user_id);
   $enfasis=Enfasis::find($propuesta->enf_id);

   $not2= new Notificacion();
   $not2->user_id=$consejo->id;
   $not2->notificacion="Hola ".$consejo->nombre." te queremos informar que la propuesta ".$propuesta->titulo." perteneciente al énfasis del cual eres coordinador ya se encuentra disponible para su revisión. Puedes encontrar las propuestas del énfasis en ".$enfasis->nombre ." en la opción 'Propuestas' del menú principal.";
   $not2->save();
   return true;

 }

 public function notificarRegistro($usuario){
   $not= new Notificacion();
   $not->user_id=$usuario->id;
   $not->notificacion="Hola ".$usuario->nombre." te damos la bienvenida al Sistema de gestión de la Maestría en Ingeniería de la Universidad del Quindío. Si necesitas ayuda para empezar puedes dirigirte a la opción 'ayuda' en el menu despegable que aparecerá al hacer click en tu nombre en la barra superior.";
   $not->save();
   return true;
 }
}
