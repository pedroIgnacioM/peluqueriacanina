<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CortePelo extends Model
{
    public function corteFavorito(){
        return $this->belongsTo('App\corteFavorito');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }
    public function cabello(){
        return $this->belongsTo('App\Tipo_Cabello');
    }
}
