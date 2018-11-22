<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaCita extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }
}
