<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model  implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'id','cc', 'nombre', 'email', 'telefono','profesion', 'universidad','password', 'rol','imagen',
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
    public function trabajo_grado(){
        return $this->hasMany('App\Trabajo_grado');
        
    }

    public function scopeSearch($query,$criterio){
        return $query->where('nombre','LIKE',"%$criterio%")->orWhere('cc', 'LIKE', "%$criterio%");
    }
    public function coordinador(){
        return $this->hasOne('App\Coordinador');
    }
    public function jurado(){
        return $this->hasOne('App\Jurado');
    }


}
