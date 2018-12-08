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
                                <div class="table-responsive"> 
                                        <table class="table table-bordered ">
                                         <tbody> 
                                                <tr>
                                                   <th><input class="btn btn-link active btn-block" type="button" value="<-----"></th> 
                                                   <th class="text-center">{{$mes}}</th> 
                                                   <th><input class="btn btn-link active btn-block" type="button" value="----->"></th> 
                                                   
                                                </tr> 
                                            </tbody>
                                        </table>

                                 <div class="table-responsive"> 
                                        <table class="table table-bordered ">
                                         
                                            <thead> 
                                                    <tr>
                                                    @foreach (array_combine($nombresDias, $dias) as $nombreDia => $dia)
                                                       <th class="text-center">{{$nombreDia}} {{$dia}}</th> 
                                                       
                                                    @endforeach
                                                    </tr> 
                                            </thead>
                                            <tbody> 
                                                    @foreach ($horariosLibres as $horariosDia)
                                                        @foreach ($horariosDia as $horario)
                                                        
                                                        <th class="text-center">{{$horario}}</th> 
                                                        
                                                        @endforeach
                                                    @endforeach

                                            </tbody>
                                        </table>
                                 </div>
                              
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
