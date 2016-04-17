<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfasis extends Model
{
    //
    protected $table="enfasis";
    protected $fillable=['nombre','created_at'];
    
    public function propuesta(){
        return $this->hasMany('App\Propuesta');
    }
    public function coordinador(){
        return $this->hasOne('App\coordinador');
        
    }
}
