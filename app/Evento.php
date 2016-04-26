<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    protected $table = "eventos";

    protected $fillable = [ 'asunto', 'descripcion', 'lugar', 'fecha_inicio', 'fecha_fin' ];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
