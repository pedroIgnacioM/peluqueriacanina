<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $primaryKey = 'id';

    public function mascota(){
        return $this->hasMany('App\mascota');
    }
    public function reservaCita(){
        return $this->hasMany('App\reservaCita');
    }
    public function reservaProducto(){
        return $this->hasMany('App\reservaProducto');
    }
    public function corteFavorito(){
        return $this->hasMany('App\corteFavorito');
    }
    public function isAdmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
    