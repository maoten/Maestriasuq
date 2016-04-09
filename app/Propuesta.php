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
    public function trabajo_grado(){
        return $this->hasOne('App\Trabajo_grado','foreign_key');
    }

     public function scopeSearch($query,$criterio){
        return $query->where('titulo','LIKE',"%$criterio%")->orWhere('estado', 'LIKE', "%$criterio%");;
    }
    public function enfasis(){
        return $this->belongsTo('App\Enfasis');
    }
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
    public function documento(){
        return $this->hasMany('App\Documento');
    }
}
