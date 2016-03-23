<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'file','mime','size','pro_id'
    ];
    
    public function propuesta(){
       return $this->belongsTo('App\Propuesta');
   }
}
