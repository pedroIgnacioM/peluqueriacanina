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

        $user->imagen=$imagen;
        $user->save();

        return redirect()->route('nosotros',['Usuario']);
    }
}
