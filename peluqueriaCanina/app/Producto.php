<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre','descripcion','precio','imagen',
    ];
    public function ReservaProducto(){
        return $this->belongsTo('App\ReservaProducto');
    }
}
