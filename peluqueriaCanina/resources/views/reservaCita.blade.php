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
                                                <thead> 
                                                    <tr>
                                                        <th colspan="2"><input style="font-size:30px; text-align:center" class="btn btn-link active btn-block" type="button" value="<-----"></th> 
                                                        <th colspan="3" style="font-size:30px; text-align:center"><span class="text-capitalize">{{$mes}}</span></th> 
                                                        <th colspan="2"><input style="font-size:30px; text-align:center" class="btn btn-link active btn-block" type="button" value="----->"></th> 
                                                    </tr> 
                                                    <tr>
                                                        @foreach (array_combine($nombresDias, $dias) as $nombreDia => $dia)
                                                            @if ($dia<=$diaActual)
                                                                <th class="text-center table-active">{{$nombreDia}} {{$dia}}</th> 
                                                            @else
                                                                <th class="text-center">{{$nombreDia}} {{$dia}}</th> 
                                                            @endif
                                                        @endforeach
                                                    </tr> 
                                                </thead>
                                                <tbody> 
                                                    @for ($i = 0; $i < 9; $i++)
                                                        <tr>
                                                            @for ($j = 0; $j < 7; $j++)
                                                                @if (isset($horariosLibres[$j][$i]))
                                                                    @if ($j < $diasem)
                                                                        <td class="text-center table-active"></td> 
                                                                    @else
                                                                        <td class="text-center"><a href="#">{{$horariosLibres[$j][$i]}}</a></td> 
                                                                    @endif
                                                                @else
                                                                    <td class="text-center"></td> 
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
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="card-title"> <h2>El horario seria:</h2> </div>
                                    </div>
                                        <div class="row justify-content-center">
                                            <form action="#">
                                                <div class="form-group ">

                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <label for="hora">Hora</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control " name="hora" id="hora" disabled value="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <label for="dia">Día</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control " name="dia" id="dia" disabled value="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-4">
                                                            <label for="mes">Mes</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control " name="mes" id="mes" disabled value="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    @if(null!=($user = Auth::user()))
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="mascotas">Mascota</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <select id="mascotas" class="custom-select  mb-4 form-control tipo ? ' is-invalid' : '' }}" name="mascotas" required autofocus>
                                                                    <option value="" selected disabled>Seleccionar</option>
                                                                    @for ($i = 0; $i < count($mascotasUsuario); $i++)
                                                                    <option value="mascota">{{$mascotasUsuario[$i]->nombre}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="tipo">Tipo de servicios</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                                                    <option value="" selected disabled>Seleccionar</option>
                                                                    <option value="solo corte">Solo corte</option>
                                                                    <option value="solo baño">Solo baño</option>
                                                                    <option value="baño y corte">Baño + Corte</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="form-group text-center ">
                                                    <button type="button" class="btn btn-primary btn-reservacion" disabled><span class="AgrandarLetra">Aceptar</span></button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn btn-primary btn-reservacion"><span class="AgrandarLetra">Cancelar</span></button>
                                                </div>
                                                
                                            </form>
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
