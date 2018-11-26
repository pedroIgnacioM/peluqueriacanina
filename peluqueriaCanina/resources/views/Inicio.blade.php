@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                        <h5>Ultimos Trabajos</h5>
                           <div class="row">
                                <div class="col-sm-6">
                                    <h1>fotos</h1>
                                </div>

                                <div class="col-md-6">
                                    <p>
                                        LA JOYA DEL PACIFICO
                                    <br>
                                    <br>
                                        Eres un arco iris de múltiples colores
                                        tu valparaíso puerto principal
                                        tus mujeres son blancas margaritas
                                        todas ellas arrancadas de tu mar
                                        Al mirarte de playa ancha lindo puerto
                                        allí se ven las naves al salir y al entrar
                                        el marino te canta esta canción
                                        yo sin ti no vivo puerto de mi amor
                                        Del cerro los placeres yo me pase al barón
                                        me vine al cordillera en busca de tu amor
                                        te fuiste al cerro alegre y yo siempre detrás


                                    </p>
                                </div>

                           </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="">Reserva Aquí</a>
                                    <i class="fas fa-calendar-alt"></i>
                                    <br>
                                    <b>Horarios de atención</b>
                                    <p> 
                                        Lunes a Viernes de 9:00 am hasta 17:00 pm 
                                        Sabados de 9:00 am hasta 13:00 pm
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h5>¿Buscas un Juguete para tu mascota?</h5>
                                    <a href="">Ver Precios</a>
                                </div>
                            </div>
                        </div>

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
</div>
@endsection