<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function cortePelo(){
        return $this->belongsTo('App\CortePelo');
    }
}
