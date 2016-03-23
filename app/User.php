<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'cc', 'nombre', 'email', 'telefono','profesion', 'universidad','password', 'rol','imagen',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function propuestas()
    {
        return $this->hasMany('App\Propuesta');
    }
    public function tesis(){
        return $this->hasMany('App\Tesis');
        
    }
}
