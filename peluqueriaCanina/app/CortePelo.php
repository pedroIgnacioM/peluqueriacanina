<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CortePelo extends Model
{
    protected $fillable = [
        'tipo','tamaño','descripcion','imagen','tipo_cabello_id','id_comentario','mascota_id'
    ];

    public function corteFavorito(){
        return $this->belongsTo('App\corteFavorito');
    }
    public function mascota(){
        return $this->belongsTo('App\mascota');
    }
    public function cabello(){
        return $this->belongsTo('App\Tipo_Cabello');
    }
    public function comentarios(){
        return $this->hasOne('App\Comentarios');
    }
}
