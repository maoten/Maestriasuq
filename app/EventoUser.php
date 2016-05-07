<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoUser extends Model
{

    protected $table = "evento_user";

    protected $fillable = [ 'user_id', 'evento_id' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }
}
