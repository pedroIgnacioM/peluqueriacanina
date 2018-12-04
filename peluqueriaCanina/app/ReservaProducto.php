<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaProducto extends Model
{
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function producto(){
        return $this->belongsTo('App\producto');
    }
}
