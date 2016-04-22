<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{

    protected $table = "modalidad";

    protected $fillable = [ 'nombre' ];


    public function propuesta()
    {
        return $this->hasMany('App\Propuesta');
    }
}
