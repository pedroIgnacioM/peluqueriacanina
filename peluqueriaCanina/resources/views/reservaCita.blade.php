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
                                    </div>
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
                                                        {{-- @for ($i = 0,$k=0; $i < 7 && $k < count($horariosLibres[$i]); $i++,$k++)
                                                            @if (isset($horariosLibres[$i]))
                                                                <tr>
                                                                @for ($j = 0; $j < 7; $j++)
                                                                        @if (isset($horariosLibres[$j][$k]))
                                                                            <td class="text-center">{{$horariosLibres[$j][$k]}}</td> 
                                                                        @endif
                                                                        @endfor 
                                                                </tr> 
                                                            @endif
                                                        @endfor --}}
                                                        
                                                        @for ($i = 0; $i < 9; $i++)
                                                                <tr>
                                                                    @for ($j = 0; $j < 7; $j++)
                                                                        @if (isset($horariosLibres[$j][$i]))
                                                                            <td class="text-center">{{$horariosLibres[$j][$i]}}</td> 
                                                                        @else
                                                                        <td></td> 
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                        @endfor
                                                    
                                                    
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                
                                <br>
                                
                                
                            </div>
                                
                                    <div class ="col">
                                        <div class="card">
                                            <div class="card-header"> <h3>El horario seria:</h3> </div>
                                                <form action="">
                                                    {{-- solobaño --}}
                                                    <option value=""></option>
                                                    {{-- mascota delusuario --}}
                                                
                                                </form>
                                            <div class="card-body">
                                    
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
