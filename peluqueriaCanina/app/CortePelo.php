<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CortePelo extends Model
{
    protected $fillable = [
        'tipo','tamaño','descripcion','imagen','tipo_cabello_id'
    ];

    public function corteFavorito(){
        return $this->belongsTo('App\corteFavorito');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }


}
