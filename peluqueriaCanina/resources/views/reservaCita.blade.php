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
                                                
                                                </form>
                                                <form action="#">
                                                    <div class="form-group ">
                                                        <div class="col-8">
                                                            <label for="hora" >Hora :</label>
                                                            <input type="hora" class="form-control " id="hora">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-8">
                                                            <label for="dia">Dia:</label>
                                                            <input type="dia" class="form-control" id="dia">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-8">
                                                            <label for="mes">Mes:</label>
                                                            <input type="mes" class="form-control" id="mes">
                                                        </div>
                                                    </div>
                                                    @if(null!=($user = Auth::user()))
                                                        
                                                    {{-- @foreach ($mascotasUsuario as $mascota)
                                                            <select name="mascota" id="mascota">
                                                                    <option value=''>{{$mascota}}</option>
                                                                </select>
                                                    @endforeach --}}
                                                        <div class="col-8">
                                                                <label for="mascotas">Mascota:</label>
                                                                <select id="mascotas" class="custom-select  mb-4 form-control tipo ? ' is-invalid' : '' }}" name="mascotas" required autofocus>
                                                                    <option value="" selected disabled>Seleccionar</option>
                                                                    @for ($i = 0; $i < count($mascotasUsuario); $i++)
                                                                    <option value="mascota">{{$mascotasUsuario[$i]->nombre}}</option>
                                                                    @endfor
                                                                   
                                                                    
                                                                </select>
                                                        </div>
                                                        <div class="col-8">
                                                                <label for="tipo">Tipo de servicios:</label>
                                                                <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                                                    <option value="" selected disabled>Seleccionar</option>
                                                                    <option value="solo corte">Solo corte</option>
                                                                    <option value="solo baño">Solo baño</option>
                                                                    <option value="baño y corte">Baño + Corte</option>
                                                                </select>
                                                        </div>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if (null!=($user = Auth::user()))
                                                            <div class="form-group text-center ">
                                                                <button type="button" class="btn btn-primary btn-lg"> Aceptar </button>
                                                                <br>
                                                                <br>
                                                                <button type="button" class="btn btn-primary btn-lg">Cancelar</button>
                                                            </div>
                                                    @else
                                                            <div class="form-group text-center ">
                                                                <button type="button" class="btn btn-primary btn-lg"> Aceptar </button>
                                                                <br>
                                                                <br>
                                                                <button type="button" class="btn btn-primary btn-lg">Cancelar</button>
                                                            </div>          
                                                    @endif
                                                    
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
