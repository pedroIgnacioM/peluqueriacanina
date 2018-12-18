<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacto');
    }

    public function editarContacto(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);

        $nosotros->numero = $request->numero;
        $contacto->direccion = $request->direccion;
        $contacto->facebook = $request->facebook;
        $contacto->instagram = $request->instagram;

        $user->save();

        return redirect()->route('contacto',['Usuario'])->with('success','Registro editado satisfactoriamente');
    }

    public function editar(Request $request, $id){

        $elemento = contacto::find($id);
        if(!isset($elemento))
            return redirect()->route('contacto');
        
        $elemento->numero = $request->numero;
        $elemento->direccion = $request->direccion;
        $elemento->facebook = $request->facebook;
        $elemento->instagram = $request->instagram;
        $elemento->save();

        return redirect()->route('contacto')->with('success','Registro editado satisfactoriamente');
    }
}
