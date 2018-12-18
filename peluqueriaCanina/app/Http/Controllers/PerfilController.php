<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Actividad;
use App\ReservaCita;
use App\User;


class PerfilController extends Controller
{
    public function index($id)
    {

            $user = User::find($id);
            $userActual= \Auth::user();
            if(!isset($user))
                return redirect()->route('home');
            $actual=false;

            $nombresColumnas=array('nombres','apellidos','email','telefono');
            $titulos=array('Nombres','Apellidos','Email','Telefono');
            
            $nombresColumnasMascotas=array('nombre','sexo','edad','color');
            $mascotasUsuario=\DB::table ('mascotas')
            ->select('mascotas.id','mascotas.nombre','mascotas.sexo','mascotas.edad','mascotas.color','mascotas.user_id','mascotas.imagenMascota')
            ->join('users','mascotas.user_id','=','users.id')
            ->where('mascotas.user_id',$id)
            ->get();
            
            if($id==$userActual->id)
                $actual=true;
            else {
                if(!$userActual->isAdmin())
                    return redirect()->route('home');
            }

            return view('perfilUsuario',[
                'nombresColumnas'=>$nombresColumnas,
                'titulos'=>$titulos,'usuario'=>$user,
                'nombresColumnasMascotas'=>$nombresColumnasMascotas,
                'mascotas'=>$mascotasUsuario,
                'actual'=>$actual
            ]);
 
    }


    public function subirImagen(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);
        $imagen = $request->file('imagen')->store('public/perfiles');

        $user->imagen=$imagen;
        $user->save();

        return redirect()->route('perfil',[$user->id])->with('success','Imagen subida satisfactoriamente');
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

        return redirect()->route('perfil',[$user->id])->with('success','Registro editado satisfactoriamente');
    }

    public function actividadesModal()
    {
        $actividades=Actividad::all();
        return view('modales/modalActividades',[
            'actividades'=>$actividades
        ]);
        
    }
     public function citasModal()
    {
        $reserva_citas=ReservaCita::all();
        return view('modales/modalCitas',[
            'reserva_citas'=>$reserva_citas
        ]);
    }
}
