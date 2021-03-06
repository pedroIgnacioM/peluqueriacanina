@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            @if (session('success'))
                <div class="alert alert-success">
                        {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header"> <h3>¿Qué día y hora te va bien?</h3> </div>

                <div class="card-body">
                   
                        <div class="row">
                            <div class="col-md-8">
                                    <div class="table-responsive"> 
                                            <table class="table table-bordered ">
                                                <thead> 
                                                    <tr>
                                                        <th colspan="2">
                                                            <form action="{{route('customFecha',[$semana-1])}}" method="GET">
                                                                <input style="font-size:30px; text-align:center" class="btn btn-link active btn-block" type="submit" value="<-----">
                                                            </form>
                                                        </th> 
                                                        <th colspan="3" style="font-size:30px; text-align:center"><span id="mes" class="text-capitalize">{{$mes}}</span></th> 
                                                        <th colspan="2">
                                                        <form action="{{route('customFecha',[$semana+1])}}" method="GET">
                                                            <input style="font-size:30px; text-align:center" class="btn btn-link active btn-block" type="submit" value="----->"> 
                                                        </form>
                                                        </th>
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
                                                                        <td class="text-center" id="elementoTabla"><a href="#">{{$horariosLibres[$j][$i]}}</a></td> 
                                                                    @endif
                                                                @else
                                                                    <td class="text-center table-active"></td> 
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
                                            <form action="{{ route('crearCita')}}"  method="POST">
                                                @csrf
                                                <div class="form-group ">

                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="hora">Hora</label>
                                                            </div>
                                                                <div class="col-md-7">
                                                                    <input type="text" class="form-control " name="horaF" id="horaF" value="" disabled>
                                                                    <input type="text" class="form-control " name="hora" id="horaForm" value="" hidden>
                                                                </div>
                                                        </div>
                                                        
                                                    <br>

                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="dia">Día</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control " name="diaF" id="diaF" disabled value="">
                                                                <input type="text" class="form-control " name="dia" id="diaForm" hidden value="">
                                                            </div>
                                                        </div>
                                                    <br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="mes">Mes</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control " name="mesF" id="mesF" disabled value="">
                                                                <input type="text" class="form-control " name="mes" id="mesForm" hidden value="">

                                                            </div>
                                                        </div>
                                                    <br>
                                                    @if(null!=($user = Auth::user()))
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="mascotas">Mascota</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <select id="mascotas" class="custom-select  mb-4 form-control tipo ? ' is-invalid' : '' }}" name="mascotas" required autofocus disabled>
                                                                    <option value="" selected disabled>Seleccionar</option>
                                                                    @for ($i = 0; $i < count($mascotasUsuario); $i++)
                                                                    <option value="{{$mascotasUsuario[$i]->nombre}}">{{$mascotasUsuario[$i]->nombre}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center">
                                                            <div class="col-md-4">
                                                                <label for="tipo">Tipo de servicios</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus disabled>
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
                                                    <button type="submit" class="btn btn-primary btn-reservacion" id="botonAceptar" disabled><span class="AgrandarLetra">Aceptar</span></button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn btn-primary btn-reservacion" id="botonCancelar" disabled><span class="AgrandarLetra">Cancelar</span></button>
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
<div class="modal" id="modal-corteFavorito"></div>

@if (session('error'))
<div class="modal" id="modal-error" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">{{ session('error') }}</h4>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('login')}}"><button class="btn btn-primary btn-reservacion btn-block"><span class="AgrandarLetra">Iniciar Sesión</span></button></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('register')}}"><button class="btn btn-primary btn-reservacion btn-block"><span class="AgrandarLetra">Registrarse</span></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#modal-error').modal('show');
});
</script>
@endif

<script>


$(document).ready(function () {

    //Selección de una hora en la tabla
    $('#elementoTabla a').click(function(e) {
        e.preventDefault();
        var hora = $(this).text();
        var mes = $('#mes').text();
        var mesNum = "{{$mesNum}}";

        var indice = $(this).parent().index();
        var regex = /(\d+)/g;
        var diaAux = $("tr th")[indice+3].innerHTML;
        var dia = diaAux.match(regex);
        var mesAlternativo= "{{$mesAlternativo}}";
        if(dia<7)
        {
            if(mesAlternativo!=null)
            mes=mesAlternativo;
        }
        //datos que se ven
        $("#diaF").attr('value',dia);
        $("#horaF").attr('value',hora);
        $("#mesF").attr('value',mes);

        //datos que se mandan
        $("#diaForm").attr('value',dia);
        $("#horaForm").attr('value',hora);
        $("#mesForm").attr('value',mesNum);
    
        $("#tipo").attr('disabled',false);
        $("#mascotas").attr('disabled',false);
        $("#botonAceptar").attr('disabled',false);
        $("#botonCancelar").attr('disabled',false);
    });

    $("#botonCancelar").click(function(e){
        $("#diaF").attr('value',"");
        $("#horaF").attr('value',"");
        $("#mesF").attr('value',"");
        $("#tipo").attr('disabled',true);
        $("#mascotas").attr('disabled',true);
        $("#tipo").val('');
        $("#mascotas").val('');
        
        $("#botonAceptar").attr('disabled',true);
        $("#botonCancelar").attr('disabled',true);
    });

});
</script>
@endsection
