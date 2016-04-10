<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta_jurado extends Model
{
    //
    protected $table = "propuesta_jurado";
    protected $fillable =['propuesta_id','user_id'];
    
    public function jurado(){
        return $this->belongsTo('App\Jurado');
    }
    public function propuesta(){
        return $this->belongsTo('App\Propuesta');
    }
}
