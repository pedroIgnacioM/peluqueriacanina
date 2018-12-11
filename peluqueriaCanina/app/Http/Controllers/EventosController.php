<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class EventosController extends Controller
{
    public function index()
    {

        return view('eventos');
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
