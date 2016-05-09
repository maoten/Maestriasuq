<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajogrado extends Model
{

    protected $table = "trabajogrado";

    protected $fillable = [ 'titulo', 'estado', 'user_id', 'propuesta_id' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function propuesta()
    {
        return $this->belongsTo('App\Propuesta');
    }


    public function scopeSearch($query, $criterio)
    {
        return $query->where('titulo', 'LIKE', "%$criterio%")->orWhere('estado', 'LIKE', "%$criterio%");
    }


    public function comentario()
    {
        return $this->hasMany('App\Comentario');
    }


    public function documento()
    {
        return $this->hasMany('App\Documentos');
    }


    public function disertacion()
    {
        return $this->hasOne('App\Evento');
    }


    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion');
    }


    public function jurados()
    {
        return $this->belongsToMany('App\Jurado');
    }

}
