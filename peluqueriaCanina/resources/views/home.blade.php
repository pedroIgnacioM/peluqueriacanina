@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        
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
                                                    <img src="{{Storage::url($corte->imagen)}}" class="d-block w-60">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($corte->imagen)}}" class="d-block w-60">
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
                                            <a href="">Reserva Aquí</a>
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
                                        <a href="">Ver Precios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr id="vertical">
                        <div class ="col">
                            <h5>Anuncios de Usuarios</h5>        
                            
                            <div class="row">
                                <div class ="col">
                                    <h5>Titulo Anuncio 1</h5>
                                    <p>
                                    <i class="fas fa-image"></i>   numero 1
                                    </p>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class ="col">
                                    <h5>Titulo Anuncio 2</h5>
                                    <p>
                                    <i class="fas fa-image"></i>   numero 2
                                    </p>
                                </div>
                            </div>

                        </div>   
                    </div> 
                </div>

            </div>
        
    </div>
</div>
@endsection
