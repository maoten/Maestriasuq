<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurado_propuesta extends Model
{
    //
    protected $table = "jurado_propuesta";
    protected $fillable =['propuesta_id','jurado_id'];
    
    public function jurado(){
        return $this->belongsTo('App\Jurado');
    }
    public function propuesta(){
        return $this->belongsTo('App\Propuesta');
    }
}
