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
        return view('perfilUsuario',['nombresColumnas'=>$nombresColumnas,'titulos'=>$titulos,'usuario'=>$user]);
    }}
}
