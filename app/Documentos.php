<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property null|string mime
 * @property int         size
 * @property mixed       propuesta_id
 * @property null|string name
 */
class Documentos extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "documentos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'propuesta_id'
    ];


    public function propuesta()
    {
        return $this->belongsTo('App\Propuesta');
    }

}
