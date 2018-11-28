<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::orderBy('id','DESC')->paginate(9);
        return view('catalogo')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *|
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function productoFiltro(Request $request){
        if (!isset($request->tamano) && !isset($request->cabello)) {
            $cortePelos = CortePelo::orderBy('id','DESC')->paginate(9);
        }
        else
        {
            if(isset($request->tamano) && isset($request->cabello))
            {
                $cortePelos = CortePelo::orderBy('id','DESC')
                ->join('tipo_cabello','tipo_cabello.id','=','corte_pelos.tipo_cabello_id')
                ->Where('corte_pelos.tamaño','=',$request->tamano)
                ->orWhere('tipo_cabello.nombre','=',$request->cabello)
                ->select('corte_pelos.*')
                ->paginate(7);
                 
            }
            else
            {
                if(isset($request->tamano))
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.id','=','corte_pelos.tipo_cabello_id')
                    ->Where('corte_pelos.tamaño','=',$request->tamano)
                    ->select('corte_pelos.*')
                    ->paginate(7);
                }
                else
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.id','=','corte_pelos.tipo_cabello_id')
                    ->Where('tipo_cabello.nombre',$request->cabello)
                    ->select('corte_pelos.*')
                    ->paginate(7);
                }
            }
        }
        return view('galeria')->with('cortePelos',$cortePelos);
    }
}
