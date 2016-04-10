<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    //
    protected $table="coordinador";
    protected $fillable=['user_id','enf_nombre','update_at','created_at'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
     public function enfasis(){
        return $this->belongsTo('App\Enfasis');
    }
    
}
