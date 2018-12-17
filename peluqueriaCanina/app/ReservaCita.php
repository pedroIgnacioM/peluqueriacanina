<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaCita extends Model
{
    protected $fillable = [
        'fecha','servicio','user_id','mascota_id'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }
}
