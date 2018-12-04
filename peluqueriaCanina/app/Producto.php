<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function ReservaProducto(){
        return $this->belongsTo('App\ReservaProducto');
    }
}
