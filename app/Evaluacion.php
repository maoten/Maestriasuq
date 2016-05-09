<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed propuesta_id
 * @property mixed user_id
 * @property mixed comentarios
 */
class Evaluacion extends Model
{

    protected $table = "evaluaciones";

    protected $fillable = [ 'id', 'propuesta_id', 'user_id', 'evaluacion', 'created_at', 'estado' ];


    public function propuesta()
    {
        return $this->belongsTo('App\Propuesta');
    }


    public function jurado()
    {
        return $this->belongsTo('App\Jurado');

    }

}
