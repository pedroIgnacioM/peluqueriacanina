<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaCitaController extends Controller
{
    public function index()
    {
        return view('reservaCita');
    }
}
