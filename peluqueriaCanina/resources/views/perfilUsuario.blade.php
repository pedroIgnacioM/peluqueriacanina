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
                                                        <p><a class="text" href="#" data-toggle="modal" data-target="#editarPerfilModal">Editar</a> 
                                                                <a class="text" data-toggle="modal" data-target="#subirImagenModal" href="#" style="margin-left: 180px;">Subir Foto</a></p>
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
                <br>
        </div>
</div>


<!-- Modal Subir Imagen -->
<div class="modal fade" id="subirImagenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Subir Imagen</h4>
                </div>
                <form action="{{route('subirImagenPerfil')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                        <div class="modal-body">
                                <div class="form-group row justify-content-md-center">
                                        <label for="imagen" class="col-md-2 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                        <div class="col-md-10">
                                                <input id="imagen" type="file" class="form-control" name="imagen">
                                        </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
                </div>
        </div>
</div>

<!-- Modal Editar Perfil -->
<div class="modal fade" id="editarPerfilModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Editar Perfil</h4>
                        </div>
                        <form action="{{route('editarPerfil')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                <div class="modal-body">
                                        <div class="form-group row justify-content-md-center">
                                                <div class="col-md-10">
                                                @foreach (array_combine($titulos, $nombresColumnas) as $titulo => $nombreColumna)
                                                <div class="form-group row">
                                                        <label for="{{$nombreColumna}}" class="col-md-2 col-form-label text-md-right">{{ __($nombreColumna) }}</label>
                                                        <div class="col-md-8">
                                                                <input id="{{$nombreColumna}}" type="text" class="form-control{{ $errors->has($nombreColumna) ? ' is-invalid' : '' }}" name="{{$nombreColumna}}" value="{{$usuario->$nombreColumna}}" required autofocus>
                                
                                                                @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                                @endif
                                                        </div>
                                                </div>
                                                @endforeach
                                                </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                        </form>
                        </div>
                </div>
        </div>

@endsection
