@extends('layouts.app')

@section('content')

@if(Auth::user()->isAdmin() && $actual)
<div class="container-fluid row justify-content-md-center">
@else
<div class="container-fluid row justify-content-md-center">
@endif
    @if(Auth::user()->isAdmin() && $actual)
        <div class="col-md-2">
                <div class="card">
                        <div class="card-body">
                                <div class="row justify-content-md-center">
                                        <div class="card-title"><h2>Opciones</h2></div>
                                </div>
                                <div class="row justify-content-md-center">
                                        <div class="col-md-10">
                                                <a href="" class="botonModal" data-form="{{route('actividadesModal')}}" data-toggle="modal" data-target="#modal-actividades">
                                                        <button class="btn btn-primary btn-block">Lista Actividades</button>
                                                </a>
                                        </div>
                                </div>
                                <br>
                                <div class="row justify-content-md-center">
                                        <div class="col-md-10">
                                                <a href="" class="botonModalCita" data-form="{{route('citasModal')}}" data-toggle="modal" data-target="#modal-citas">
                                                        <button class="btn btn-primary btn-block">Lista Citas</button>
                                                </a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        @endif
        @if(Auth::user()->isAdmin() && $actual)
        <div class="card col-md-8">
        @else
        <div class="card">
        @endif
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="card-title"><h1>Perfil Usuario</h1></div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center ">
                                <div class="col-md-4">
                                        <div class="card">
                                                <div class="card-body">  
                                                     <div class='row justify-content-center '>
                                                        <div class="col-sm-12">
                                                            <img src="{{Storage::url($usuario->imagen)}}" alt="avatar" class="img-thumbnail rounded-circle">
                                                        </div>
                                                    </div>  
                                                    @if ($actual)
                                                        <div class='row'>
                                                            <div class="col-sm-12">
                                                                <div class='row justify-content-center'>
                                                                    <div class="col-sm-6 row justify-content-center">
                                                                        <a class="text" href="#" data-toggle="modal" data-target="#editarPerfilModal"><i class="fas fa-edit iconoGaleria"></i></a> 
                                                                    </div>
                                                                    <div class="col-sm-6 row justify-content-center">
                                                                        <a class="text" data-toggle="modal" data-target="#subirImagenModal" href="#"><i class="fas fa-camera iconoGaleria"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    @endif
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-7">
                                        <div class="card">
                                                <div class="card-body">                            
                                                        <div class="card-title"><h2>Datos Usuario</h2></div>
                                                        {{ csrf_field() }}
                                                        @foreach (array_combine($titulos, $nombresColumnas) as $titulo => $nombreColumna)
                                                            <div class="row">
                                                                <div class="col-md-3 nombreTitulo ">

                                                                    <b >{{$titulo}}</b>
                                                                </div>
                                                                <div class="col-md-9 nombreRespuesta">
                                                                   : <a class="text">{{$usuario->$nombreColumna}}</a><br>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

            <div class="card-body">
                <div class="row justify-content-md-center">
                        <div class="col-md-11">
                                <div class="card">
                                        <div class="card-body">                            
                                                <div class="card-title"><h2>Mascotas</h2></div>
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
                                                @if ($actual)
                                                        <tr>
                                                                <td colspan="5"><a href="{{route('agregarMascota') }}">agregar...</a></td>
                                                        </tr>
                                                @endif
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
                <br>
        </div>
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
<div class="modal" id="modal-actividades"></div>
<div class="modal" id="modal-citas"></div>

 <script>
// Modal
$(document).ready(function () {

$(".botonModal").click(function (ev) { // for each edit contact url
    ev.preventDefault(); // prevent navigation
    var url = $(this).data("form"); // get the contact form url
    console.log(url);
    $("#modal-actividades").load(url, function () { // load the url into the modal
        $(this).modal('show'); // display the modal on url load
    });
});

$(".botonModalCita").click(function (ev) { // for each edit contact url
    ev.preventDefault(); // prevent navigation
    var url = $(this).data("form"); // get the contact form url
    console.log(url);
    $("#modal-citas").load(url, function () { // load the url into the modal
        $(this).modal('show'); // display the modal on url load
    });
});
});


</script>

@endsection
