<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    //
    protected $table="jurados";
    
    protected $fillable=['user_id','created_at'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
}
