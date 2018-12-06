@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
        
            <div class="card">
                <div class="card-header"> <h3>¿Qué día y hora te va bien?</h3> </div>

                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-md-8">
                            <p>dia actual: {{$dia}}</p>
                            <p>mes actual: {{$mes}}</p>
                            <p>dias de la semana actual</p>
                            @foreach ($dias as $dia)
                            <p>{{$dia}}</p>
                                
                            @endforeach
                            <br>
                            @foreach ($horariosLibres as $horarioDia)
                                @foreach ($horarioDia as $horarioHora)
                                    <p>{{$horarioHora}}</p>
                                @endforeach
                                <br>
                            @endforeach
                            {{-- @foreach ($horariosLibres as $item)
                                <p>{{$item}}</p>
                            @endforeach --}}
                            
                        </div>
                        
                        <div class ="col">
                            <div class="card">
                                    <div class="card-header"> <h3>El horario seria:</h3> </div>
                    
                                    <div class="card-body">
                               
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection