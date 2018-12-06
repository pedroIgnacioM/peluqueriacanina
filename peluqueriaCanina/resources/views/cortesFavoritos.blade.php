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
                                                                <input class="form-check-input" type="checkbox" value="grande"  name="tamano">Grande</label>
                                                            </div>  
                                                        </div>
                                                       <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="mediano">
                                                                <input class="form-check-input" type="checkbox" value="mediano" name="tamano">Mediano</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pequeño">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" name="tamano">Pequeño</label>
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
                                                                <input class="form-check-input" type="checkbox" value="rubio" name="cabello">
                                                                Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                <input class="form-check-input" type="checkbox" value="castaño" name="cabello">
                                                                Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pelo_liso">
                                                                <input class="form-check-input" type="checkbox" value="pelo_liso" name="cabello" id="negro">
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
                                        <div class="col-sm-4">
                                            <div class="container-fluid" style="border-color: black!important;"> 
                                                <div class="row justify-content-center">  
                                                    <div class="img-container" style="background-image:url({{Storage::url($cortePelo->imagen)}});">
                                                        {{-- Imagen --}}
                                                        <a class="thumbnail fancybox" rel="ligthbox" href="#s">
                                                            <p>{{$cortePelo->descripcion}}</p>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">  
                                                    {{-- Botón Descargar --}}
                                                    <div class="col-md-2">
                                                        <a href="{{Storage::url($cortePelo->imagen)}}" download><span style="font-size: 20px; color: grey;">
                                                            <i class="fas fa-download"></i>
                                                        </span></a>                       
                                                    </div>
                                                    @auth
                                                        @if(Auth::user()->isDefault() || Auth::user()->isAdmin() )
                                                            {{-- Botón Comentar --}}
                                                            <div class="col-md-2">
                                                                <a href="#"><span style="font-size: 20px; color: grey;">
                                                                    <i class="fas fa-comment"></i>
                                                                </span></a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="#"><span style="font-size: 20px; color: grey;">
                                                                    <i class="fas fa-heart"></i>
                                                                </span></a>
                                                            </div>
                                                            {{-- Botón Eliminar --}}
                                                            <div class="col-md-2">
                                                                <a href="" class="botonModal" data-form="{{route('eliminarCorteModal',['id'=>$cortePelo->id])}}" data-toggle="modal" data-target="#modal-corte">
                                                                    <span style="font-size: 20px; color: grey;"><i class="fas fa-trash"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endauth  
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
<script>
// Modal
$(document).ready(function () {

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
});
</script>
@endsection