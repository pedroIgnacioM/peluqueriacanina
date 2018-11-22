<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
