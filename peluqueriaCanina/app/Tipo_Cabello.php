<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cabello extends Model
{
	 protected $fillable = [
        'nombre'
    ];

    public function cortePelo(){
        return $this->hasMany('App\CortePelo');
    }
}
