<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('id','DESC')->get();
        return view('catalogo',[
            'productos'=>$productos
        ]);
    }

    
    public function agregar(Request $request){

        $imagen = $request->file('imagen')->store('public/productos'); 
            Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen'=>$imagen,

        ]);
    
        return redirect()->route('catalogo')->with('success','Registro creado satisfactoriamente');
    }

    public function catalogoFiltro(Request $request){

        $alfabeticoCheck = $request->alfabeticoCheck;
        $precioCheck = $request->precioCheck;
        
        $ascendente = $request->ascendente;
        
        if(isset($precioCheck))
        {
            if(isset($ascendente))
            {
                $productos = Producto::orderBy('precio', 'asc')
                ->get();
            }
            else {
                $productos = Producto::orderBy('precio', 'desc')
                ->get();
            }
            
        }
        else if(isset($alfabeticoCheck))
        {
            if(isset($ascendente)){
                $productos = Producto::orderBy('nombre','asc')
                ->get();
            }
            else{
                $productos = Producto::orderBy('nombre','desc')
                ->get();
            }
        }
        else {
            return redirect()->route('catalogo');
        }

        
        return view('catalogo',[
            'productos'=>$productos,
            'alfabeticoCheck'=>$alfabeticoCheck,
            'precioCheck'=>$precioCheck,
            'ascendente'=>$ascendente,
            'desbloqueado'=>'verdadero'
        ]);
    }
}
