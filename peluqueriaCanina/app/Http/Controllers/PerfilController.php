<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Actividad;

class PerfilController extends Controller
{
    public function index($nombre)
    {
        if($nombre=='Usuario'){
            
            $user=\Auth::user();
            $nombresColumnas=array('nombres','apellidos','email','telefono');
            $titulos=array('Nombres','Apellidos','Email','Telefono');
            $id=$user->id;
            $nombresColumnasMascotas=array('nombre','sexo','edad','color');
            $mascotasUsuario=\DB::table ('mascotas')
            ->select('mascotas.id','mascotas.nombre','mascotas.sexo','mascotas.edad','mascotas.color','mascotas.user_id','mascotas.imagenMascota')
            ->join('users','mascotas.user_id','=','users.id')
            ->where('mascotas.user_id',$id)
            ->get();
            
            return view('perfilUsuario',['nombresColumnas'=>$nombresColumnas,'titulos'=>$titulos,'usuario'=>$user,'nombresColumnasMascotas'=>$nombresColumnasMascotas,'mascotas'=>$mascotasUsuario]);

        }
 
    }


    public function subirImagen(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);
        $imagen = $request->file('imagen')->store('public/perfiles');

        $user->imagen=$imagen;
        $user->save();

        return redirect()->route('perfil',['Usuario']);
    }

    public function editarPerfil(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);

        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->telefono = $request->telefono;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('perfil',['Usuario']);
    }

    public function actividadesModal()
    {
        $actividades=Actividad::all();
        return view('modalActividades',[
            'actividades'=>$actividades
        ]);
    }
}
