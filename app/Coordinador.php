<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed enf_id
 * @property mixed user_id
 */
class Coordinador extends Model
{

    protected $table = "coordinador";

    protected $fillable = [ 'user_id', 'enf_id', 'update_at', 'created_at' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function enfasis()
    {
        return $this->belongsTo('App\Enfasis');
    }

}
