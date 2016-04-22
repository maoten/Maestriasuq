<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed pais_id
 * @property mixed user_id
 */
class Jurado extends Model
{

    protected $table = "jurados";

    protected $fillable = [ 'user_id', 'pais_id', 'created_at' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function comentario()
    {
        return $this->hasMany('App\Comentario');
    }


    public function pais()
    {
        return $this->hasOne('App\Pais');
    }


    //
    public function propuestas()
    {
        return $this->belongsToMany('App\Propuesta');
    }

}
