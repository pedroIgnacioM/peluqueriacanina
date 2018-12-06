<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CortePelo;
use App\User;

class CortePeloController extends Controller
{

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
        $this->validate($request,[ 'tipo'=>'required', 'tamano'=>'required', 'descripcion'=>'required' , 'imagen' =>'required', 'tipo_cabello_id' =>'required']);
        CortePelo::create($request->all());
        return redirect()->route('galeria')->with('success','Registro creado satisfactoriamente');
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
        $cortePelo = CortePelo::find($id);
        return view('galeria')->with('cortePelo',$cortePelo);
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
        $this->validate($request,[ 'tipo'=>'required', 'tamano'=>'required', 'descripcion'=>'required' , 'imagen' =>'required', 'tipo_cabello_id' =>'required']);
        CortePelo::find($id)->update($request->all());
        return redirect()->route('galeria')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CortePelo::find($id)->delete();
        return redirect()->wiew('galeria')->with('success','Registro eliminado satisfactoriamente');
    }

    public function index(){
 
        $cortePelos = CortePelo::orderBy('id','DESC')->paginate(12);
        return view('galeria')->with('cortePelos',$cortePelos);
    }

    public function galeriaFiltro(Request $request){
        if (!isset($request->tamano) && !isset($request->cabello)) {
            $cortePelos = CortePelo::orderBy('id','DESC')->paginate(12);
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
                ->paginate(12);
                 
            }
            else
            {
                if(isset($request->tamano))
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.id','=','corte_pelos.tipo_cabello_id')
                    ->Where('corte_pelos.tamaño','=',$request->tamano)
                    ->select('corte_pelos.*')
                    ->paginate(12);
                }
                else
                {
                    $cortePelos = CortePelo::orderBy('id','DESC')
                    ->join('tipo_cabello','tipo_cabello.id','=','corte_pelos.tipo_cabello_id')
                    ->Where('tipo_cabello.nombre',$request->cabello)
                    ->select('corte_pelos.*')
                    ->paginate(12);
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

    public function eliminarCorteModal($id)
    {
        $elemento=CortePelo::find($id);
        return view('modalEliminarCorte',[
            'elemento'=>$elemento
        ]);
    }
    public function editarCorteModal($id)
    {
        $elemento=CortePelo::find($id);
        return view('modalEditarCorte',[
            'elemento'=>$elemento
        ]);
    }

    //--------------------------------------------Funciones provisorias--------------------------------------------

    public function agregarCorte(Request $request)
    {

        $imagen = $request->file('imagen')->store('public/cortePelo'); 
            CortePelo::create([
            'tipo' => $request->tipo,
            'tamaño' => $request->tamano,
            'descripcion' => $request->descripcion,
            'tipo_cabello_id'=>$request->cabello,
            'imagen'=>$imagen,

        ]);
    
        return redirect()->route('galeria')->with('success','Registro creado satisfactoriamente');
    }

    public function editarCorte(Request $request, $id)
    {
        $elemento = CortePelo::find($id);
        if(!isset($elemento))
            return redirect()->route('galeria');

        $imagen = $request->file('imagen');
        if(isset($imagen))
        {
            $elemento->imagen = $imagen;
            $imagen = $request->file('imagen')->store('public/cortePelo'); 
        }
        
        $elemento->tipo = $request->tipo;
        $elemento->tamaño = $request->tamano;
        $elemento->descripcion = $request->descripcion;
        $elemento->tipo_cabello_id = $request->cabello;
        
        $elemento->save();

        return redirect()->route('galeria')->with('success','Registro creado satisfactoriamente');
    }
    
    public function eliminarCorte(Request $request , $id)
    {
        $elemento = CortePelo::find($id);
        if(!isset($elemento))
            return redirect()->route('galeria');

        $elemento->delete();

        return redirect()->route('galeria')->with('success','Registro creado satisfactoriamente');
    }
    



}
    