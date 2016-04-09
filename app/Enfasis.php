<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfasis extends Model
{
    //
    protected $table="enfasis";
    protected $fillable=['ubicacion','user_id','nombre','created_at'];
    
    public function coordinador(){
        return $this->belongsTo('App\Coordinador');
    }
    public function propuesta(){
        return $this->hasMany('App\Propuesta');
    }
}
