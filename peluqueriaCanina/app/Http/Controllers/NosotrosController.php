<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function index()
    {
        return view('nosotros');
    }

    public function subirImagen(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);
        $imagen = $request->file('imagen')->store('public/Nosotros');

        $nosotros->imagen=$imagen;
        $nosotros->save();

        return redirect()->route('nosotros',['Usuario']);
    }

    public function editarNosotros(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);

        $nosotros->titulo1 = $request->titulo1;
        $nosotros->descripcion1 = $request->descripcion1;
        $nosotros->titulo2 = $request->titulo2;
        $nosotros->descripcion2 = $request->descripcion2;

        $user->save();

        return redirect()->route('nosotros',['Usuario']);
    }
}
