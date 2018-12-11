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
                                                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#agregarCortePelo">Agregar Imagen <i class="fas fa-plus"></i></button>
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
                                                                <input class="form-check-input" type="checkbox" value="grande"  name="tamanoG">Grande</label>
                                                            </div>  
                                                        </div>
                                                       <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="mediano">
                                                                <input class="form-check-input" type="checkbox" value="mediano" name="tamanoM">Mediano</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pequeño">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" name="tamanoP">Pequeño</label>
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
                                                                <input class="form-check-input" type="checkbox" value="rubio" name="cabelloR">
                                                                Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                <input class="form-check-input" type="checkbox" value="castaño" name="cabelloC">
                                                                Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pelo_liso">
                                                                <input class="form-check-input" type="checkbox" value="negro" name="cabelloN" id="negro">
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

                        <div class="col-md-10">
                            <div class="row">
                                @if($cortePelos->count())
                                    @foreach($cortePelos as $cortePelo)
                                        <div class="col-sm-4 conFoto">
                                            <div class="container-fluid foto"> 
                                                <div class="row justify-content-center">  
                                                    <div class="img-container" id="imagenRef" style="background-image:url({{Storage::url($cortePelo->imagen)}});">
                                                        {{-- Imagen --}}
                                                        <a href="{{Storage::url($cortePelo->imagen)}}" >
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
                                                                <a href="#"><span><i class="fas fa-comment iconoGaleria"></i></span></a>
                                                            </div>

                                                            {{-- Boton Favorito --}}
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

{{-- Modal del boton (+) --}}
<div class="modal fade" id="agregarCortePelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agregar Corte de pelo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            <form action="{{route('agregarCorte')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-12">
                            {{-- Tipo --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="tipo" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                        <option value="" selected disabled>Seleccionar</option>
                                        <optgroup label="Tipos de servicios">
                                        <option value="solo corte">Solo corte</option>
                                        <option value="baño y corte">Baño + Corte</option>
                                        <option value="solo baño">Solo baño</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Tamaño --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="tamano" class="col-form-label text-md-right">{{ __('Tamaño') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <select id="tamano" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tamano" required autofocus>
                                        <option value="" selected disabled>Seleccionar</option>
                                        <optgroup label="Tamaños de Perros">
                                        <option value="pequeño">Pequeño</option>
                                        <option value="mediano">Mediano</option>
                                        <option value="grande">Grande</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Tipo Cabello --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="cabello" class="col-form-label text-md-right">{{ __('Cabello') }}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="cabello" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="cabello" required autofocus>>
                                            <option value="" selected disabled>Seleccionar</option>
                                            <optgroup label="Tipos de Cabellos">
                                            <option value="1">Rubio</option>
                                            <option value="2">Castaño</option>
                                            <option value="3">Pelo liso</option>
                                        </select>
                                    </div>
                            </div>
                            {{-- Descripción --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus></textarea>
                                </div>
                            </div>
                            {{-- Imagen --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <input id="imagen" type="file" name="imagen" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
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
<div class="modal" id="modal-corte"></div>
<div class="modal" id="modal-corteFavorito"></div>

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
    });
</script>
@endsection