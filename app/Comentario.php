<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
   protected $table = "comentarios";
   protected $fillable=['id','pro_id','user_id','comentario','created_at'];

}
