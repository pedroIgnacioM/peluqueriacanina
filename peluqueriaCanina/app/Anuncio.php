<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    const ACTIVADO_TYPE = 'activado';
    const DESACTIVADO_TYPE = 'desactivado';

    protected $fillable = [
        'fecha','descripcion','direccion','estado','titulo','imagen','user_id',
    ];
    public function user(){
        return $this->belongsTo('App\user');
    }
    public function isActivado()    {        
        return $this->estado === self::ACTIVADO_TYPE;    
    }
     public function isDesactivado()    {        
        return $this->estado === self::DESACTIVADO_TYPE;    
    }
}
