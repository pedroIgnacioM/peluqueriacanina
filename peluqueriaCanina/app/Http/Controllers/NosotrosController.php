<?php

namespace App\Http\Controllers;
use App\Nosotros;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function index()
    {

        $nosotros=Nosotros::first();
        return view('nosotros',['nosotros'=>$nosotros]);
    }

    public function subirImagen(Request $request)
    {
        $user = \Auth::user();
        if(!isset($user))
            abort(404);
        $imagen = $request->file('imagen')->store('public/');

        $nosotros->imagen=$imagen;
        $nosotros->save();

        return redirect()->route('nosotros');
    }
    
      
      
     
    public function editar(Request $request,$id)
    {
        $nosotros = Nosotros::find($id);
        if($request->file('imagen')!=null)
        {
            $imagen = $request->file('imagen')->store('public/nosotros'); 
            $nosotros->imagen = $imagen;
        }

        $nosotros->titulo1 = $request->titulo1;
        $nosotros->descripcion1 = $request->descripcion1;
        $nosotros->titulo2 = $request->titulo2;
        $nosotros->descripcion2 = $request->descripcion2;

        $nosotros->save();

        return redirect()->route('nosotros')->with('success','Registro editado satisfactoriamente');
    }
    public function editarNosotrosModal($id)
    {
        $nosotros=Nosotros::find($id);
        return view('modales/modalEditarNosotros',[
            'nosotros'=>$nosotros
        ]);
    }
}
