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
        $productos = Producto::orderBy('id','DESC')->paginate(9);
        return view('catalogo')->with('productos',$productos);
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

 
        if(isset($request->Por_precio))
        {
            $productos = Producto::orderBy('precio', 'asc')
            ->paginate(9);
        }
        else if(isset($request->Orden_Alfabetico))
        {
            $productos = Producto::orderBy('nombre','asc')
            ->paginate(9);
        }
        
        return view('catalogo')->with('productos',$productos);
    }
}
