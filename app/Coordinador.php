<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    //
    protected $table="coordinador";
    protected $fillable=['user_id','update_at','created_at'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function enfasis(){
        return $this->hasOne('App\Enfasis');
        
    }
}
