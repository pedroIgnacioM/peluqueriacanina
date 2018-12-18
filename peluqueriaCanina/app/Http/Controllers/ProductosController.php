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

    public function editar(Request $request, $id){

        $elemento = Producto::find($id);
        if(!isset($elemento))
            return redirect()->route('catalogo');

            
        if($request->file('imagen')!=null)
        {
            $imagen = $request->file('imagen')->store('public/productos'); 
            $elemento->imagen = $imagen;
        }
        
        $elemento->nombre = $request->nombre;
        $elemento->precio = $request->precio;
        $elemento->descripcion = $request->descripcion;
        $elemento->save();

        return redirect()->route('catalogo')->with('success','Registro creado satisfactoriamente');
    }

    public function eliminar(Request $request, $id){

        $elemento = Producto::find($id);
        if(!isset($elemento))
            return redirect()->route('catalogo');

        $elemento->delete();

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

    public function detalles($id)
    {
        $producto=Producto::find($id);
        return view('detalle_producto',[
            'producto'=>$producto
        ]);
    }

    public function eliminarProductoModal($id)
    {
        $elemento=Producto::find($id);
        return view('modales/modalEliminarProducto',[
            'elemento'=>$elemento
        ]);
    }

    public function editarProductoModal($id)
    {
        $elemento=Producto::find($id);
        return view('modales/modalEditarProducto',[
            'elemento'=>$elemento
        ]);
    }
}
