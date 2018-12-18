@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="card-title text-capitalize"><h1>Lista de Eventos</h1></div>
                        </div>
                    </div>
                    @foreach ($eventos as $evento)
                        <div class="row justify-content-center">
                            <div class="col-sm-11">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4 evento">
                                                <div class="row ">
                                                    <div class="col-md-7" style="margin: 0!important">
                                                        <label>Horario Seleccionado</label>
                                                        <label>Usuario creador</label>
                                                    </div>
                                                    <div class="col-md-5" style="margin: 0!important">
                                                        <label>: {{$evento->fecha}}</label>
                                                        <label>: {{$evento->user->nombres}} {{$evento->user->apellidos}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 evento">
                                                <h5 class="text-center text-capitalize"><b>{{$evento->titulo}}</b></h5>
                                                <label class="max-lines-eventos">{{$evento->descripcion}}</label>
                                                <a href="{{ route('evento_detalle',['id'=>$evento->id]) }}"><p class="text-center">Ver más</p></a>
                                            </div>
                                            <div class="col-md-2 evento">
                                                <div class='row justify-content-center '>
                                                    <img class="rounded-circle" src="{{Storage::url($evento->user->imagen)}}" alt="Imagen" width="100px" height="100px">
                                                </div>
                                                @auth
                                                    @if(Auth::user()->isAdmin())
                                                        <div class='row justify-content-center '>
                                                            <a href="{{ route('perfil',['id'=>$evento->user->id]) }}"><p class="text-center">Ver perfil</p></a>
                                                        </div>
                                                    @endif
                                                @endauth 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    

@endsection