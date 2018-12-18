@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row justify-content-center">
                                        @auth
                                            @if(Auth::user()->isAdmin())
                                                {{-- Botón Agregar --}}
                                                <a class="botonModalAgregarCorte" href="#" data-toggle="modal" data-form="{{route('agregarCorteModal')}}" data-target="#modal-agregar-corte">
                                                    <button class="btn btn-lg btn-primary">Agregar Imagen <i class="fas fa-plus"></i></button>
                                                </a>
                                            @endif
                                        @endauth
                                    </div>
                                </div> 
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header text-center">Filtro</div>
                                        <div class="card-body">
                                            <form action="{{ route('galeriaFiltro') }}" method="POST" >
                                                @csrf
                                                <label class="label text-center">Tamaño</label>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                         <div class="row  ">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="tamano" >
                                                                @if (isset($tamanoG))
                                                                    <input class="form-check-input" type="checkbox" value="grande"  name="tamanoG" checked>Grande</label>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="grande"  name="tamanoG">Grande</label>
                                                                @endif
                                                            </div>  
                                                        </div>
                                                       <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="mediano">
                                                                @if (isset($tamanoM))
                                                                    <input class="form-check-input" type="checkbox" value="mediano" name="tamanoM" checked>Mediano</label>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="mediano" name="tamanoM">Mediano</label>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pequeño">
                                                                @if (isset($tamanoP))
                                                                    <input class="form-check-input" type="checkbox" value="pequeño" name="tamanoP" checked>Pequeño</label>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="pequeño" name="tamanoP">Pequeño</label>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <label class="label">Cabello</label>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                         <div class="row  ">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                @if (isset($cabelloR))
                                                                    <input class="form-check-input" type="checkbox" value="rubio" name="cabelloR" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="rubio" name="cabelloR">
                                                                @endif
                                                                Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                @if (isset($cabelloC))
                                                                    <input class="form-check-input" type="checkbox" value="castaño" name="cabelloC" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="castaño" name="cabelloC">
                                                                @endif
                                                                Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pelo_liso">
                                                                @if (isset($cabelloN))
                                                                    <input class="form-check-input" type="checkbox" value="negro" name="cabelloN" id="negro" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="negro" name="cabelloN" id="negro">
                                                                @endif
                                                                Negro</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-10 ">
                            <div class="row justify-content-end">
                                <div class="col-sm-1 icon-right">
                                    <a href="{{ route('ordenAscendente') }}"><i class="fas fa-long-arrow-alt-up " ></i></a>
                                    <a href="{{ route('ordenDescendente') }}"><i class="fas fa-long-arrow-alt-down " ></i></a>  
                                </div>
                            </div>
                            
                            <div class="row">
                                @if($cortePelos->count())
                                    @foreach($cortePelos as $cortePelo)
                                        <div class="col-sm-4 conFoto">
                                            <div class="container-fluid foto"> 
                                                <div class="row justify-content-center">  
                                                    <div class="img-container" id="imagenRef" style="background-image:url({{Storage::url($cortePelo->imagen)}});">
                                                        {{-- Imagen --}}
                                                        <a class="hipervinculo-foto" href="{{Storage::url($cortePelo->imagen)}}" >
                                                            <div class="thumbnail fancybox" rel="ligthbox" href="#"></div> 
                                                            <p>{{$cortePelo->descripcion}}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">  
                                                    {{-- Botón Descargar --}}
                                                    <div class="col-md-2">
                                                        <a href="{{Storage::url($cortePelo->imagen)}}" download><span><i class="fas fa-download iconoGaleria"></i></span></a>
                                                    </div>
                                                    @auth
                                                        @if(Auth::user()->isDefault() || Auth::user()->isAdmin() )
                                                            {{-- Botón Comentar --}}
                                                            <div class="col-md-2">
                                                                <a href="#" class="botonModalComentario" data-toggle="modal" data-form="{{route('verComentarioModal',['id'=>$cortePelo->id])}}"  data-target="#modal-comentario" ><span><i class="fas fa-comment iconoGaleria" ></i></span></a>
                                                            </div>

                                                            {{-- Boton favorito --}}
                                                            <?php $cont = 0; ?> 
                                                            @foreach($corteFavoritos as $corteFavorito)
                                                                @if($corteFavorito->corte_pelos_id == $cortePelo->id)
                                                                    <div class="col-md-2">
                                                                        <a href="#" class="botonModalFavorito" data-toggle="modal" data-form="{{route('agregarCorteFavoritoModal',['id'=>$cortePelo->id])}}"  data-target="#modal-corteFavorito"><span><i class="fas fa-heart favorito"></i></span></a>
                                                                    </div>
                                                                    <?php $cont= $cont +1;?>
                                                                @endif
                                                            @endforeach
                                                            @if ($cont == 0)
                                                                <div class="col-md-2">
                                                                    <a href="#" class="botonModalFavorito" data-toggle="modal" data-form="{{route('agregarCorteFavoritoModal',['id'=>$cortePelo->id])}}"  data-target="#modal-corteFavorito" ><span><i class="fas fa-heart iconoGaleria" ></i></span></a>
                                                                </div>
                                                            @endif

                                                        @endif 
                                                        @if(Auth::user()->isAdmin())
                                                            {{-- Botón Eliminar --}}
                                                            <div class="col-md-2">
                                                                <a href="" class="botonModal" data-toggle="modal" data-form="{{route('eliminarCorteModal',['id'=>$cortePelo->id])}}"  data-target="#modal-corte"><span><i class="fas fa-trash iconoGaleria"></i></span></a>
                                                            </div>
                                                            {{-- Botón Editar --}}
                                                            <div class="col-md-2">
                                                                <a href="" class="botonModal" data-form="{{route('editarCorteModal',['id'=>$cortePelo->id])}}" data-toggle="modal" data-target="#modal-corte">
                                                                <span><i class="fas fa-edit iconoGaleria" ></i></span></a>
                                                            </div>
                                                        @endif
                                                     @endauth  
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif  
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalImagen">
    <div class="ventana">
        <div class="boton-cerrar">X</div>
            <img class="imagenModal" id="imagenAMostrar" src="" alt="imagen" width="600px">
        </div>
    </div>
</div>

<div class="modal" id="modal-agregar-corte"></div>
<div class="modal" id="modal-corte"></div>
<div class="modal" id="modal-corteFavorito"></div>
<div class="modal" id="modal-comentario"></div>

<script>

    $(document).ready(function () {

        $("#imagenRef a").click(function(e){
            e.preventDefault();
            var referencia = $(this).attr('href');
            $('#imagenAMostrar').attr('src',referencia);
            $('#modalImagen').modal('show');
        });

        $(".boton-cerrar").click(function(){
            $("#modalImagen").modal('hide');
        });

         // Modal
        $(".botonModal").click(function (ev) { // for each edit contact url
            ev.preventDefault(); // prevent navigation
            var url = $(this).data("form"); // get the contact form url
            console.log(url);
            $("#modal-corte").load(url, function () { // load the url into the modal
                $(this).modal('show'); // display the modal on url load
            });
        });

        $('.corte-form').on('submit', function () {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                context: this,
                success: function (data, status) {
                    $('#modal-corte').html(data);
                }
            });
        });

        // Modal Agregar Corte de Pelo
        $(".botonModalAgregarCorte").click(function (ev) { // for each edit contact url
            ev.preventDefault(); // prevent navigation
            var url = $(this).data("form"); // get the contact form url
            console.log(url);
            $("#modal-agregar-corte").load(url, function () { // load the url into the modal
                $(this).modal('show'); // display the modal on url load
            });
        });

        $('.agregar-corte-form').on('submit', function () {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                context: this,
                success: function (data, status) {
                    $('#modal-agregar-corte').html(data);
                }
            });
        });
        
        // Modal Favorito
        $(".botonModalFavorito").click(function (ev) { // for each edit contact url
            ev.preventDefault(); // prevent navigation
            var url = $(this).data("form"); // get the contact form url
            console.log(url);
            $("#modal-corteFavorito").load(url, function () { // load the url into the modal
                $(this).modal('show'); // display the modal on url load
            });
        });

        $('.corteFavorito-form').on('submit', function () {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                context: this,
                success: function (data, status) {
                    $('#modal-corteFavorito').html(data);
                }
            });
        });

         // Modal Comentarios
        $(".botonModalComentario").click(function (ev) { // for each edit contact url
            ev.preventDefault(); // prevent navigation
            var url = $(this).data("form"); // get the contact form url
            console.log(url);
            $("#modal-comentario").load(url, function () { // load the url into the modal
                $(this).modal('show'); // display the modal on url load
            });
        });
        $('.comentario-form').on('submit', function () {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                context: this,
                success: function (data, status) {
                    $('#modal-comentario').html(data);
                }
            });
        });
        $('#modal-corte').on('hidden.bs.modal', function (e) {
	        $(this).find('.modal-content').empty();
	    });
        $('#modal-comentario').on('hidden.bs.modal', function (e) {
	        $(this).find('.modal-content').empty();
	    });
         $('#modal-corteFavorito').on('hidden.bs.modal', function (e) {
            $(this).find('.modal-content').empty();
        });
    });
</script>
@endsection