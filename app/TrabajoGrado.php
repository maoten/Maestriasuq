<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class TrabajoGrado extends Model
{

    //
    protected $table = "TrabajoGrado";

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
