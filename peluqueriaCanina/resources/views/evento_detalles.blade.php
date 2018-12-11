@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <div class="card-title text-capitalize"><h1>{{$evento->titulo}}</h1></div>
                                
                                <div class="row">
                                    <div class="col-md-7">
                                        <p id="txtDate">{{$evento->fecha}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <p>{{$evento->direccion}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <p>{{$evento->descripcion}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <p>{{$evento->estado}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container-fluid">
                                    <img class="imagenEvento" src="{{Storage::url($evento->imagen)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    
    //Cambio de formato de yy-mm-dd a dd-mm-yy
    var fechaActual= $("#txtDate").text();
    var d=new Date(fechaActual.split("/").reverse().join("-"));
    var dd=d.getDate()+1;
    var mm=d.getMonth()+1;
    var yy=d.getFullYear();
    var newdate=dd+"/"+mm+"/"+yy;
    $("#txtDate").text(newdate);
});
</script>

@endsection