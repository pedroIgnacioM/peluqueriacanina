<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\ReservaCita;
use DateTime;

class ReservaCitaController extends Controller
{
    public function index()
    {
        //Datos de la fecha actual
        setlocale(LC_ALL,"es_CL.UTF-8","es_CL","esp"); 
        $diaActual = strftime("%e"); 
        $diaSemana = strftime('%u');
        $mes = strftime('%B');
        $diaLunes = strftime('%d') - $diaSemana+1;
        $mesAlternativo=null;
        
        //numeros de los dias de la semana actual
        $diasSemana= [];
        foreach (range(0,6) as $numero) {
            $diasSemana[$numero]=$diaLunes;
            $diaLunes++;    
        }
        //Se obtiene las horas disponibles
        $mesNumero = strftime('%m');
        $horariosDisponibles = $this->horariosDisponibles($diasSemana,$mesNumero);
        $nombreDias=array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
        $user = \Auth::user();
        if(null!=$user)
        $id_usuario=$user->id;
        else
        $id_usuario=null;
        $mascotasUsuario=\DB::table ('mascotas')
        ->select('mascotas.nombre','mascotas.user_id')
        ->join('users','mascotas.user_id','=','users.id')
        ->where('mascotas.user_id',$id_usuario)
        ->get();
        $nombreMes=array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        
        return view('reservaCita',[
            'dias'=>$diasSemana,
            'mes'=>$mes,
            'diaActual'=>$diaActual,
            'diasem'=>$diaSemana,
            'horariosLibres'=>$horariosDisponibles,
            'nombresDias'=>$nombreDias,
            'nombreMes'=>$nombreMes,
            'mascotasUsuario'=>$mascotasUsuario,
            'semana'=>0,
            'mesAlternativo'=>$mesAlternativo,
            'mesNum'=>$mesNumero           
         
        ]);
    }

    public function indexCustom($semana)
    {
        if($semana>5 || $semana<1)
            return redirect()->route('reservaCita');
        
        //Datos de la fecha
        setlocale(LC_ALL,"es_CL.UTF-8","es_CL","esp");
        $fechaAux = date("d-m-Y"); 
        $fechaFinal = date("d-m-Y",strtotime($fechaAux."+ ".$semana." week"));
        $mes = strftime("%B",strtotime($fechaFinal));
        $mesNumero = strftime("%m",strtotime($fechaFinal));
        $mesAlternativo=null;

        //Se obtiene el dia lunes de la semana
        $diaSemanaActual= date("l",strtotime($fechaFinal));
        if($diaSemanaActual=="Monday")
        {
            $diaLunes = date("d", strtotime($fechaFinal));
        }
        else{
            $diaLunes = date("d", strtotime($fechaFinal."last Monday"));
        }

        //numeros de los dias de la semana actual
        $fecha = new DateTime();
        $fecha->modify('last day of this month');
        $ultimoDiaMes = $fecha->format('d');
        $diasSemana= [];
        if($diaLunes+7>$ultimoDiaMes)
            $mesAlternativo = strftime("%B", strtotime("+1 month". $fechaFinal));

        foreach (range(0,6) as $numero) {
            $diasSemana[$numero]=$diaLunes;
            $diaLunes++;
            if($diaLunes>$ultimoDiaMes)
                $diaLunes=1;
            
                
        }

        //Se obtiene las horas disponibles
        $horariosDisponibles = $this->horariosDisponibles($diasSemana,$mesNumero);
        $nombreDias=array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
        $user = \Auth::user();
        if(null!=$user)
        $id_usuario=$user->id;
        else
        $id_usuario=null;
        $mascotasUsuario=\DB::table ('mascotas')
        ->select('mascotas.nombre','mascotas.user_id')
        ->join('users','mascotas.user_id','=','users.id')
        ->where('mascotas.user_id',$id_usuario)
        ->get();
        $nombreMes=array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        
        return view('reservaCita',[
            'dias'=>$diasSemana,
            'mes'=>$mes,
            'diaActual'=>null,
            'diasem'=>null,
            'horariosLibres'=>$horariosDisponibles,
            'nombresDias'=>$nombreDias,
            'nombreMes'=>$nombreMes,
            'mascotasUsuario'=>$mascotasUsuario,
            'semana'=>$semana,
            'mesAlternativo'=>$mesAlternativo,
            'mesNum'=>$mesNumero           
        ]);
    }

    private function horariosDisponibles($dias,$mes)
    {
        $i=0;
        $lunesSabado=['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'];
        $domingo=['09:00','10:00','11:00','12:00','13:00'];
        
        //Se recorren los dias de la semana recibida
        foreach ($dias as $dia) {
            $reservas[$i] = ReservaCita::whereMonth('fecha',$mes)
                                        ->whereDay('fecha',$dia)
                                        ->get();

            $j=0;
            $horasOcupadas=null;
            //Se obtiene un array solo con las horas ocupadas                            
            foreach ($reservas[$i] as $reserva) {
                $horasOcupadas[$j]=date("H:i", strtotime($reserva->fecha));
                $j++;
            }
            //Se obtiene un array con las horas reservables dependiendo el dia
            if($i=='6')
                $horarios[$i]=$domingo;
            else
                $horarios[$i]=$lunesSabado;
            
            //Elimina las horas reservadas de las horas reservables
            if($horasOcupadas)
                $horariosDisponibles[$i]=array_diff($horarios[$i],$horasOcupadas);
            else
                $horariosDisponibles[$i]=$horarios[$i];
            $i++;
        }
        return $horariosDisponibles;
    }
    public function crear(Request $request)
    {
        $user = \Auth::user();
        if($user==null)
            return redirect()->route('reservaCita')->with('error','Debe iniciar sesión para reservar una cita');
        $anno=strftime('%Y');
        $id_usuario=$user->id;
        $mesNumero=$request->mes;
        $nombremascota=$request->mascotas;
        $fecha=$anno . '-' . $mesNumero . '-' . $request->dia . ' ' . $request->hora;
        $mascota=\DB::table ('mascotas')
        ->select('mascotas.id','mascotas.nombre','mascotas.user_id')
        ->join('users','mascotas.user_id','=','users.id')
        ->where('mascotas.user_id',$id_usuario)
        ->where('mascotas.nombre',$nombremascota)
        ->first();
        $tipoServicio=$request->tipo;
        $id_mascota=$mascota->id;
        $fechaConFormato = date("Y-m-d H:i", strtotime($fecha));
        ReservaCita::create([
            'fecha' => $fechaConFormato,
            'servicio' => $tipoServicio,
            'user_id' => $id_usuario,
            'mascota_id' => $id_mascota,

        ]);
        return redirect()->route('reservaCita')->with('success','Cita reservada satisfactoriamente');
        
    }
}
