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

    public function agregarModal(){
        return view('modales/modalAgregarEvento');
    }

    public function eliminarModal($id)
    {
        $evento=Anuncio::find($id);
        return view('modales/modalEliminarEvento',[
            'evento'=>$evento,
        ]);
    }

    public function editarModal($id)
    {
        $evento=Anuncio::find($id);
        return view('modales/modalEditarEvento',[
            'evento'=>$evento,
        ]);
    }

    public function agregar(Request $request){
        $usuario = \Auth::user()->id;
        $imagen = $request->file('imagen')->store('public/cortePelo'); 

        Anuncio::create([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'titulo'=>$request->titulo,
            'imagen'=>$imagen,
            'user_id'=>$usuario,
        ]);

        return redirect()->route('eventos')->with('success','Registro creado satisfactoriamente');
    }

    public function editar(Request $request,$id){

        $anuncio = Anuncio::find($id);
        if(!isset($anuncio))
            return redirect()->route('galeria');

            
        if($request->file('imagen')!=null)
        {
            $imagen = $request->file('imagen')->store('public/cortePelo'); 
            $anuncio->imagen = $imagen;
        }
        
        $anuncio->fecha = $request->fecha;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->direccion = $request->direccion;
        $anuncio->titulo = $request->titulo;

        $anuncio->save();

        return redirect()->route('eventos')->with('success','Registro editado satisfactoriamente');
    }

    public function eliminar(Request $request,$id){
        
        $anuncio = Anuncio::find($id);
        if(!isset($anuncio))
            return redirect()->route('galeria');

        $anuncio->delete();

        return redirect()->route('eventos')->with('success','Registro eliminado satisfactoriamente');
    }
}
