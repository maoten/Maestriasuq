<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class JuradoTrabajogrado extends Model
{

    protected $table = "jurado_trabajogrado";

    protected $fillable = [ 'trabajogrado_id', 'jurado_id' ];


    public function jurado()
    {
        return $this->belongsTo('App\Jurado');
    }


    public function trabajogrado()
    {
        return $this->belongsTo('App\Trabajogrado');
    }
}
