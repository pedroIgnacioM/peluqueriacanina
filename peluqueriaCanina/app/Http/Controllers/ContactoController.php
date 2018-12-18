<?php

namespace App\Http\Controllers;
use App\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contacto=Contacto::first();
        return view('contacto',['contacto'=>$contacto]);
    }

    public function editarContacto(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);

        $contacto->numero = $request->numero;
        $contacto->direccion = $request->direccion;
        $contacto->facebook = $request->facebook;
        $contacto->instagram = $request->instagram;

        $user->save();

        return redirect()->route('contacto',['Usuario']);
    }

    public function editar(Request $request, $id){

        $contacto = Contacto::find($id);
        
        $contacto->numero = $request->numero;
        $contacto->direccion = $request->direccion;
        $contacto->facebook = $request->facebook;
        $contacto->instagram = $request->instagram;
        
        $contacto->save();

        return redirect()->route('contacto');
    }

    public function editarContactoModal($id)
    {
        $contacto=Contacto::find($id);
        return view('modalEditarContacto',[
            'contacto'=>$contacto
        ]);
    }
}
