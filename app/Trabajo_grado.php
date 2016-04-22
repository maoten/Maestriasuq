<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo_grado extends Model
{

    //
    protected $table = "trabajo_grado";

    protected $fillable = [ 'descripcion', 'estado', 'user_id', 'propuesta_id' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function propuesta()
    {
        return $this->belongsTo('App\Propuesta');
    }
}
