@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
                <div class="card-body">
                        <div class="card-title"><h1>Perfil Usuario</h1></div>
                        <div class="row ">
                                <div class="col-md-4">
                                        <div class="card">
                                                <div class="card-body">                            
                                                        <img src="{{Storage::url($usuario->imagen)}}" alt="avatar" class="img-thumbnail" width="300">
                                                        <p><a class="text" href="#">Editar</a> <a class="text" href="#" style="margin-left: 180px;">Subir Foto</a></p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-8">
                                        <div class="card">
                                                <div class="card-body">                            
                                                        <div class="card-title"><h1>Datos Usuario</h1></div>
                                                        {{ csrf_field() }}
                                                        @foreach (array_combine($titulos, $nombresColumnas) as $titulo => $nombreColumna)
                                                                <b >{{$titulo}}</b>:<a class="text">{{$usuario->$nombreColumna}}</a><br>
                                                        @endforeach
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="row justify-content-md-center">
                        <div class="col-md-11">
                                <div class="card">
                                        <div class="card-body">                            
                                                <div class="card-title"><h1>Mascotas</h1></div>
                                                <table class="table table-bordered">
                                                        {{ csrf_field() }}
                                                        <tr>
                                                                <th>Nombre</th>
                                                                <th>Sexo</th>
                                                                <th>Edad</th>
                                                                <th>Color</th>
                                                                <th></th>
                                                        </tr>
                                                        @foreach ($mascotas as $mascota)
                                                                <tr>
                                                                @foreach ($nombresColumnasMascotas as $nombreColumnaMascota)
                                                                
                                                                <td>{{$mascota->$nombreColumnaMascota}}</td>
                                                                @endforeach
                                                                <td class="text-center"><img src="{{Storage::url($mascota->imagenMascota)}}" alt="avatarMascota" class="img-thumbnail" width="60"></td>
                                                        @endforeach
                                                </tr>
                                                        <tr>
                                                                <td colspan="5"><a href="{{route('agregarMascota') }}">agregar...</a></td>
                                                        </tr>
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection
