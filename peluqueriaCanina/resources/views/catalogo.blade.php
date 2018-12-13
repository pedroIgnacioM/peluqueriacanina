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
                                                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#agregarProducto">Agregar Producto <i class="fas fa-plus"></i></button>
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
                                            <form action="{{ route('catalogoFiltro') }}" method="POST" >
                                                @csrf
                                                <label class="label">Orden</label>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="Por_precio" >
                                                                @if (isset($precioCheck))
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="precioCheck" id="checkPrecio" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="precioCheck" id="checkPrecio">
                                                                @endif
                                                                Por precio</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="Orden_Alfabetico">
                                                                @if (isset($alfabeticoCheck))
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="alfabeticoCheck" id="checkAlfabe" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="alfabeticoCheck" id="checkAlfabe">
                                                                @endif
                                                                Orden Alfabetico</label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="ascendente">
                                                                @if (isset($ascendente))
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="ascendente" checked>
                                                                @else
                                                                    <input class="form-check-input" type="checkbox" value="verdadero" name="ascendente" >
                                                                @endif
                                                                Ascendente</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                        @if (isset($desbloqueado))
                                                        <button id="btnFiltrar" type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                                                        @else
                                                        <button id="btnFiltrar" type="submit" class="btn btn-primary" disabled>{{ __('Buscar') }}</button>
                                                        @endif
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
                            @foreach($productos as $producto)
                            <div class="col-md-4">
                                <div class="container-fluid">  
                                    <div class="img-container" style="background-image:url({{Storage::url($producto->imagen)}});">
                                        <div>
                                            <a class="thumbnail fancybox" rel="ligthbox" href="{{Storage::url($producto->imagen)}}"> </a>                                           </a> 
                                        </div>
                                    </div>
                                
                                <div class="row justify-content-center">
                                    <div class="">
                                        <label class="label">{{$producto->nombre}}</label>
                                    </div>  
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <p>{{$producto->descripcion}}</p>   
                                    </div>                   
                                </div>
                                    <div class="row justify-content-center">
                                        <label class="label">${{$producto->precio}}</label>
                                    </div>   
                                </div> 
                                           
                            </div>
                            @endforeach       
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

{{-- Modal del boton Agregar Producto(+) --}}
<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            <form action="{{route('agregarProducto')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-12">
                            {{-- Nombre --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="nombre" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <input id="nombre" type="text" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="nombre" required autofocus>
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
                            {{-- Precio --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="precio" class="col-form-label text-md-right">{{ __('Precio') }}</label>
                                </div>
                                <div class="col-md-3">
                                    <input id="precio" type="text" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="precio" required autofocus>
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
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){ 
    
    $('#checkPrecio').on('change', function(){
        if( $(this).is(':checked') ) {
            if( $('#checkAlfabe').prop('checked') ) {
                $('#btnFiltrar').prop('disabled',true);
            }
            else
            {
                $('#btnFiltrar').prop('disabled',false);
            }
        }
        else{
            if( $('#checkAlfabe').prop('checked') ){
                $('#btnFiltrar').prop('disabled',false);
            }
            else{
                $('#btnFiltrar').prop('disabled',true);
            }
        }
    });


    $('#checkAlfabe').on('change', function(){
        if( $(this).is(':checked') ) {
            if( $('#checkPrecio').prop('checked') ) {
                $('#btnFiltrar').prop('disabled',true);
            }
            else
            {
                $('#btnFiltrar').prop('disabled',false);
            }
        }
        else{
            if( $('#checkPrecio').prop('checked') ) 
            {
                $('#btnFiltrar').prop('disabled',false);
            }
            else
            {
                $('#btnFiltrar').prop('disabled',true);
            }
        }
    });




});
</script>
@endsection