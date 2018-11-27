<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CortePelo extends Model
{
    protected $fillable = [
        'tipo','tamaño','descripcion','tipoCabello'
    ];

    public function corteFavorito(){
        return $this->belongsTo('App\corteFavorito');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }


}
