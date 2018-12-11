<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\CortePelo;
use App\CorteFavorito;


class CorteFavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cortePelos = CortePelo::orderBy('id','DESC')
                ->join('corte_favoritos','corte_favoritos.corte_pelos_id','=','corte_pelos.id')
                ->Where('corte_favoritos.user_id','=', \Auth::user()->id)
                ->select('corte_pelos.*')
                ->paginate(12);
                
        return view('cortesFavoritos')->with('cortePelos',$cortePelos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        CorteFavorito::create([
            'user_id' => Auth::user()->id,
            'corte_pelos_id' => $id
        ]);
    
        return redirect()->route('cortesFavoritos')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CorteFavorito::create([
            'user_id' => Auth::user()->id,
            'corte_pelos_id' => $id
        ]);
    
        return redirect()->route('cortesFavoritos')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CorteFavorito::create([
            'user_id' => Auth::user()->id,
            'corte_pelos_id' => $id
        ]);
    
        return redirect()->route('cortesFavoritos')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function eliminarCorteModal($id)
    {
        $elemento=CortePelo::find($id);
        return view('modalEliminarCorteFavorito',[
            'elemento'=>$elemento
        ]);
    }

    public function eliminarCorte(Request $request , $id)
    {
        $corteFavorito = CorteFavorito::orderBy('id','DESC')
                ->Where([
                    ['corte_favoritos.user_id','=', \Auth::user()->id],
                    ['corte_favoritos.corte_pelos_id','=', $id]])
                ->select('corte_favoritos.*');

        if(!isset($corteFavorito))
            return redirect()->route('galeria');

        $corteFavorito->delete();

        return redirect()->route('cortesFavoritos')->with('success','Registro creado satisfactoriamente');
    }
    
    public function corteFavoritoFiltro(Request $request){
        
        
        $id_usuario=\Auth::user()->id;
        
        if (!isset($request->tamano) && !isset($request->cabello)) {

            $cortePelos = CortePelo::orderBy('id','DESC')
                ->join('corte_favoritos','corte_favoritos.corte_pelos_id','=','corte_pelos.id')
                ->Where('corte_favoritos.user_id','=', $id_usuario)
                ->select('corte_pelos.*')
                ->paginate(12);
                
        }
        
        else
        {
            if(isset($request->tamano) && isset($request->cabello))
            {
                $cortePelos = CortePelo::orderBy('id','DESC')
                ->join('corte_favoritos','corte_favoritos.corte_pelos_id','=','corte_pelos.id')
                ->join('tipo_cabello','corte_pelos.tipo_cabello_id','=','tipo_cabello.id')
                ->Where([['corte_favoritos.user_id','=', $id_usuario],
                        ['corte_pelos.tamaño','=',$request->tamano],
                        ['tipo_cabello.nombre','=',$request->cabello]])
                ->select('corte_pelos.*')
                ->get();
                 
            }
            else
            {
                if(isset($request->tamano))
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('corte_favoritos','corte_favoritos.corte_pelos_id','=','corte_pelos.id')
                    ->join('tipo_cabello','corte_pelos.tipo_cabello_id','=','tipo_cabello.id')
                    ->Where([['corte_favoritos.user_id','=', $id_usuario],
                            ['corte_pelos.tamaño','=',$request->tamano]])
                    ->select('corte_pelos.*')
                    ->get();
                  
                }
                else
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('corte_favoritos','corte_favoritos.corte_pelos_id','=','corte_pelos.id')
                    ->join('tipo_cabello','corte_pelos.tipo_cabello_id','=','tipo_cabello.id')
                    ->Where([['corte_favoritos.user_id','=', $id_usuario],
                            ['tipo_cabello.nombre','=',$request->cabello]])
                    ->select('corte_pelos.*')
                    ->get();
                }
            }
        }
        return view('cortesFavoritos')->with('cortePelos',$cortePelos);
    }
}
