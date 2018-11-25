<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $fillable = [
        'nombre','raza','edad','sexo','color','user_id','imagen',
    ];
    public function user(){
        return $this->belongsTo('App\user');
    }
    public function reservaCita(){
        return $this->hasMany('App\reservaCita');
    }
    public function cortePelo(){
        return $this->hasMany('App\cortePelo');
    }
}
