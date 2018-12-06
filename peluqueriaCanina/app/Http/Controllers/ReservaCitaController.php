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
        // $horariosDisponibles = $this->horariosDisponibles($dias,$mes);

        return view('reservaCita',[
            'dias'=>$diasSemana,
            'mes'=>$mes,
            'dia'=>$diaActual,
        ]);
    }

    // private function horariosDisponibles($dias,$mes)
    // {
    //     $i=0;
    //     foreach ($dias as $dia) {
    //         $reservas[$i] = ReservaCita::where('')
    //                                     ->get();

    //         $i++;
    //     }
    // }
}
