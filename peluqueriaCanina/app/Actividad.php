<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividades";
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo('App\user');
    }
    protected $fillable = [
        'user_id','created_at',
    ];
}
