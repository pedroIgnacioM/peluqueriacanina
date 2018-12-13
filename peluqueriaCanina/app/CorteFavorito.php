<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorteFavorito extends Model
{
    protected $primaryKey = 'id';

     protected $fillable = [
        'id','corte_pelos_id', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function cortePelo(){
        return $this->hasMany('App\cortePelo');
    }
}
