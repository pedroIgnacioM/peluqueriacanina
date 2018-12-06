<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaCita;


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
        
        //numeros de los dias de la semana actual
        $diasSemana= [];
        foreach (range(0,6) as $numero) {
            $diasSemana[$numero]=$diaLunes;
            $diaLunes++;    
        }
        //Se obtiene las horas disponibles
        $mesNumero = strftime('%m');
        $horariosDisponibles = $this->horariosDisponibles($diasSemana,$mesNumero);

        return view('reservaCita',[
            'dias'=>$diasSemana,
            'mes'=>$mes,
            'dia'=>$diaActual,
            'horariosLibres'=>$horariosDisponibles
        ]);
    }

    private function horariosDisponibles($dias,$mes)
    {
        $i=0;
        $lunesSabado=['9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'];
        $domingo=['9:00','10:00','11:00','12:00','13:00'];
        
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
}
