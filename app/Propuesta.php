<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    //
    protected $table = "propuesta";
    protected $fillable =['descripcion','fecha_inicio','fecha_fin','estado','archivo','tipo_archivo','user_id'];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tesis(){
        return $this->hasOne('App\Tesis','foreign_key');
    }
}
