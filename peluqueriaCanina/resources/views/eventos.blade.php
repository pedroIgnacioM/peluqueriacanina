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
                            <a class="botonModalAgregarEvento" href="#" data-toggle="modal" data-form="{{route('agregarEventoModal')}}" data-target="#modal-agregar-evento">
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
                                                @if (\Auth::user()->isAdmin() || \Auth::user()->id==$evento->user->id)
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <a class="botonModalEditarEvento" href="#" data-toggle="modal" data-form="{{route('editarEventoModal',['id'=>$evento->id])}}" data-target="#modal-editar-evento">
                                                                <input type="button" class="btn btn-warning" value="Editar">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a class="botonModalEliminarEvento" href="#" data-toggle="modal" data-form="{{route('eliminarEventoModal',['id'=>$evento->id])}}" data-target="#modal-eliminar-evento">
                                                                <input type="button" class="btn btn-danger" value="Eliminar">
                                                            </a>
                                                        </div>
                                                    </div>    
                                                @endif
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
<div class="modal" id="modal-agregar-evento"></div>
<div class="modal" id="modal-editar-evento"></div>
<div class="modal" id="modal-eliminar-evento"></div>

<script>
$(document).ready(function () {

    // Modal Agregar Evento
    $(".botonModalAgregarEvento").click(function (ev) { // for each edit contact url
        ev.preventDefault(); // prevent navigation
        var url = $(this).data("form"); // get the contact form url
        console.log(url);
        $("#modal-agregar-evento").load(url, function () { // load the url into the modal
            $(this).modal('show'); // display the modal on url load
        });
    });

    $('.agregar-evento-form').on('submit', function () {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            context: this,
            success: function (data, status) {
                $('#modal-agregar-evento').html(data);
            }
        });
    });


    // Modal Editar Evento
    $(".botonModalEditarEvento").click(function (ev) { // for each edit contact url
        ev.preventDefault(); // prevent navigation
        var url = $(this).data("form"); // get the contact form url
        console.log(url);
        $("#modal-editar-evento").load(url, function () { // load the url into the modal
            $(this).modal('show'); // display the modal on url load
        });
    });

    $('.editar-evento-form').on('submit', function () {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            context: this,
            success: function (data, status) {
                $('#modal-editar-evento').html(data);
            }
        });
    });

    // Modal Eliminar Evento
    $(".botonModalEliminarEvento").click(function (ev) { // for each edit contact url
        ev.preventDefault(); // prevent navigation
        var url = $(this).data("form"); // get the contact form url
        console.log(url);
        $("#modal-eliminar-evento").load(url, function () { // load the url into the modal
            $(this).modal('show'); // display the modal on url load
        });
    });

    $('.eliminar-evento-form').on('submit', function () {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            context: this,
            success: function (data, status) {
                $('#modal-eliminar-evento').html(data);
            }
        });
    });


});
</script>

@endsection