@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between" >
                        <div class="col-md-6">
                            <div class="card-title text-capitalize"><h1>Lista de Eventos</h1></div>
                        </div>
                        <div class="col-md-2">
                            {{-- Botón Agregar --}}
                            <a class="botonModalAgregarCorte" href="#" data-toggle="modal" data-form="{{route('agregarEventoModal')}}" data-target="#modal-agregar-corte">
                                <button class="btn btn-lg btn-primary">Agregar Evento <i class="fas fa-plus"></i></button>
                            </a>
                        </div> 
                    </div>
                    <div class="row justify-content-end">
                         
                    </div>
                    <br>
                    @foreach ($eventos as $evento)
                        <div class="row justify-content-center">
                            <div class="col-sm-11">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Horario Seleccionado: {{$evento->fecha}}</p>
                                                <p>Usuario creador: {{$evento->user->nombres}} {{$evento->user->apellidos}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-center text-capitalize">Evento: {{$evento->titulo}}</p>
                                                <p class="max-lines-eventos">{{$evento->descripcion}}</p>
                                                <a href="{{ route('evento_detalle',['id'=>$evento->id]) }}"><p class="text-center">Ver más</p></a>
                                            </div>
                                            <div class="col-md-2">
                                                <img class="rounded-circle" src="{{Storage::url($evento->user->imagen)}}" alt="Imagen" width="100px" height="100px">
                                                @auth
                                                    @if(Auth::user()->isAdmin())
                                                        <a href="{{ route('perfil',['id'=>$evento->user->id]) }}"><p class="text-center">Ver perfil</p></a>
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