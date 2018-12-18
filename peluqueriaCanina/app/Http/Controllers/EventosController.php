<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\User;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = Anuncio::orderBy('id','DESC')->paginate(9);
        $admin = User::where('email','admin@gmail.com')->first();
        return view('eventos',[
            'eventos'=>$eventos,
        ]);
    }

    public function detalles($id)
    {   
        $evento = Anuncio::find($id);
        if(!isset($evento))
            return redirect()->route('home');


        return view('evento_detalles',[
            'evento'=>$evento
        ]);
    }
}
