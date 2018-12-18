@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-9">
                            <h5>Ultimos Trabajos</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        
                                        <div class="carousel-inner">
                                            @foreach ($cortes as $corte)
                                            @if($loop->first)
                                                <div class="carousel-item active">
                                                    <img src="{{Storage::url($corte->imagen)}}" class="d-block w-60" width="150" height="230">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($corte->imagen)}}" class="d-block w-60" width="150" height="230">
                                                </div>
                                            @endif
                                                
                                            @endforeach
                                        </div>
                                        
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    
                                    <h5>Descripción</h5>
                                    <p>
                                    Mantenemos a los perros en buenas condiciones, ofrecemos cortes de pelo, 
                                    cortes las uñas y tratamientos antiparasitarios.
                                    </p>
                                </div>
                           </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Referenecia a Reserva -->
                                            <a href="{{ route('reservaCita') }}">Reserva Aquí</a>
                                            <i class="fas fa-calendar-alt"></i>
                                            <br>
                                            <b>Horarios de atención</b>
                                            <p> 
                                                Lunes a Viernes de 9:00 am hasta 17:00 pm
                                                <br> 
                                                Sabados de 9:00 am hasta 13:00 pm
                                            </p>
                                        </div>    
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row justify-content-center">
                                        <h5>¿Buscas un Juguete para tu mascota?</h5>
                                    </div>
                                    
                                    <div class="row">
                                        @foreach ($productos as $producto)
                                            <div class="col-md-6">
                                                <img class="img-fluid" src="{{Storage::url($producto->imagen)}}">
                                            </div>
                                        @endforeach
                                        <br>
                                        <!-- Aca falta la referencia a productos-->
                                    </div>
                                    <div class="row justify-content-center">
                                        <a href="{{ route('catalogo') }}">Ver Precios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class ="col-md-3 bordeado-izquierdo">
                            <div class="row justify-content-end">
                                <div class="col-md-8">
                                    <h4>Eventos</h4>        
                                </div>
                            </div>
                            <br>
                            @foreach ($anuncios as $anuncio)
                            <div class="container ">
                                <a href="{{ route('evento_detalle',['id'=>$anuncio->id]) }}">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 text-capitalize">
                                        <h5>{{$anuncio->titulo}}</h5>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <img src="{{Storage::url($anuncio->imagen)}}" alt="imagen_evento" width="120px" height="120px">
                                    </div>
                                </div>
                                </a>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <p class="max-lines">{{$anuncio->descripcion}}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <p class="max-lines">{{$anuncio->fecha}}</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            
                            @endforeach
                                
                        </div>
                          
                    </div> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
