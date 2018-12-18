<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	protected $fillable = [
        'id','descripcion'
    ];

    public function cortePelo(){
        return $this->belongsTo('App\CortePelo');
    }
}
