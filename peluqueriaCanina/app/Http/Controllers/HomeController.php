<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cortePelo;
use App\Producto;
use App\Anuncio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cortes = CortePelo::orderBy('id','DESC')->paginate(3);
        $productos = Producto::orderBy('id','DESC')->paginate(2);
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(2);
        return view('home',[
            'cortes'=>$cortes,
            'productos'=>$productos,
            'anuncios'=>$anuncios
        ]);
    }
}
