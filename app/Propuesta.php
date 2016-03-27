<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    //
    protected $table = "propuesta";
    protected $fillable =['titulo','enfoque','user_id','dir_id'];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    /*public function tesis(){
        return $this->hasOne('App\Tesis','foreign_key');
    }*/

     public function scopeSearch($query,$criterio){
        return $query->where('titulo','LIKE',"%$criterio%")->orWhere('estado', 'LIKE', "%$criterio%");;
    }
}
