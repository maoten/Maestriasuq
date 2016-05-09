<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{

    protected $table = "certificados";

    protected $fillable = [ 'id', 'nombre', 'user_id' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
