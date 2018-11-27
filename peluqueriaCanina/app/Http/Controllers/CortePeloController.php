<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CortePelo;
use App\User;

class CortePeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
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

    public function index_default(){
 
        $cortePelos = CortePelo::orderBy('id','DESC')->paginate(9);
        return view('galeria')->with('cortePelos',$cortePelos);
    }

    public function galeriaFiltro(Request $request){
        if (!isset($request->tamano) && !isset($request->cabello)) {
            $cortePelos = CortePelo::orderBy('id','DESC')->paginate(9);
        }
        else
        {
            if(isset($request->tamano) && isset($request->cabello))
            {
                $cortePelos = CortePelo::orderBy('id','DESC')
                ->join('tipo_cabello','tipo_cabello.corte_pelo_id','=','corte_pelos.id')
                ->Where('tipo_cabello.nombre',$request->tamano)
                ->orWhere('tipo_cabello.nombre',$request->cabello)
                ->select('corte_pelos.*')
                ->paginate(9);
                 
            }
            else
            {
                if(isset($request->tamano))
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.corte_pelo_id','=','corte_pelos.id')
                    ->Where('tipo_cabello.nombre',$request->tamano)
                    ->select('corte_pelos.*')
                    ->paginate(9);
                }
                else
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.corte_pelo_id','=','corte_pelos.id')
                    ->Where('tipo_cabello.nombre',$request->cabello)
                    ->select('corte_pelos.*')
                    ->paginate(9);
                }
            }
        }
        return view('galeria')->with('cortePelos',$cortePelos);
    }

    protected function downloadFile($src){
         if(is_file($src)){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src).PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        } else{
            return false;
        }
    }
}
    