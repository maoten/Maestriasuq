<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
   protected $table = "paises";
   protected $fillable=['cod','nombre'];

   public function jurado(){
   return $this->belongsTo('App\Jurado');
   }
}
