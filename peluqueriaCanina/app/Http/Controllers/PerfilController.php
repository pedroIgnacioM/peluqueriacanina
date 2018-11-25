<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index($nombre)
    {
    if($nombre=='Usuario'){
        
        $user=\Auth::user();
        $nombresColumnas=array('name','email','nickname','rut','telefono','ciudad','direccion','edad','sexo');
        $titulos=array('Nombre','Correo ','Nickname','Rut','Telefono','Ciudad','Direccion','Edad','Sexo');
        $id=$user->id;
        $nombresColumnasMascotas=array('nombre','sexo','edad','color');
        $mascotasUsuario=\DB::table ('mascotas')
        ->select('mascotas.id','mascotas.nombre','mascotas.sexo','mascotas.edad','mascotas.color','mascotas.user_id')
        ->join('users','mascotas.user_id','=','users.id')
        ->where('mascotas.user_id',$id)
        ->get();
        
        return view('perfilUsuario',['nombresColumnas'=>$nombresColumnas,'titulos'=>$titulos,'usuario'=>$user,'nombresColumnasMascotas'=>$nombresColumnasMascotas,'mascotas'=>$mascotasUsuario]);

    }}
}
