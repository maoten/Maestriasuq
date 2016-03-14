<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    //
    protected $table = "tesis";
    protected $fillable =['descripcion','fecha_inicio','fecha_fin','estado','archivo','tipo_archivo','user_id'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function propuesta(){
        return $this->belongsTo('App\Propuesta');
    }
}
