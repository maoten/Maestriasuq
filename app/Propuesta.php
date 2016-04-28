<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed enf_id
 * @property mixed id
 * @property mixed mod_id
 */
class Propuesta extends Model
{

    //
    protected $table = "propuesta";

    protected $fillable = [ 'titulo', 'mod_id', 'estado', 'user_id', 'dir_id', 'enf_id' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function trabajo_grado()
    {
        return $this->hasOne('App\Trabajo_grado', 'foreign_key');
    }


    public function scopeSearch($query, $criterio)
    {
        return $query->where('titulo', 'LIKE', "%$criterio%")->orWhere('estado', 'LIKE', "%$criterio%");
    }


    public function enfasis()
    {
        return $this->belongsTo('App\Enfasis');
    }


    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad');
    }


    public function comentario()
    {
        return $this->hasMany('App\Comentario');
    }


    public function documento()
    {
        return $this->hasMany('App\Documentos');
    }


    public function jurados()
    {
        return $this->belongsToMany('App\Jurado');
    }

}
