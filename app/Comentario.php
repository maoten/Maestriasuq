<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";
    protected $fillable=['id','propuesta_id','user_id','comentarios','created_at'];
    
    public function propuesta(){
        return $this->belongsTo('App\Propuesta');
    }
    public function jurado(){
        return $this->belongsTo('App\Jurado');
        
    }


}
