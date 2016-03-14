<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $table = "images";
   protected $fillable=['name','user_id'];

   public function user(){
   return $this->belongsTo('App\User');
   }
}
