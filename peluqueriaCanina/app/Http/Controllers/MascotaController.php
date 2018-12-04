<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mascota;

class MascotaController extends Controller
{
    
    public function formularioAgregar(){
        
        return view('formularioAgregarMascota');
    }

    public function agregarMascota(Request $request){

        $user = Auth::user();
        if(!isset($user))
            abort(404);
        $imagenMascota = $request->file('imagenMascota')->store('public/mascotas'); 
            Mascota::create([
            'nombre' => $request->nombre,
            'raza' => $request->raza,
            'edad' => $request->edadMascota,
            'sexo' => $request->sexoMascota,
            'color' => $request->color,
            'user_id' =>$user->id,
            'imagenMascota'=>$imagenMascota,

        ]);

        return redirect()->route('perfil',['Usuario']);
    }
}
