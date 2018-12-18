@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
        
            <div class="card">
                <div class="card-header"> <h3>Donde Encontrarnos</h3> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-md-8">
                            <h4>Ubicación</h4>
                            <hr>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43299.552928706384!2d-71.60174238205062!3d-33.04053567425118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2fc6c888d7a2a712!2sPontificia+Universidad+Cat%C3%B3lica+de+Valpara%C3%ADso!5e0!3m2!1ses!2scl!4v1543087680929" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>   
                            <br>
                            <a href="https://goo.gl/maps/UqRJY9MVF5B2" target="__blank">Ampliar Mapa</a>
                        </div>

                        <div class ="col">

                            <div class="row">
                                <div class ="col">
                                <h4>Contacto</h4>
                                <p>
                                   <i class="fab fa-whatsapp"></i>  (+56) 912345678
                                </p>
                                </div>
                            </div>                            
                            <br>        
                            <div class="row">
                                <div class ="col">
                                    <h5>Encuentranos En:</h5>
                                    <p>
                                        <i class="fas fa-directions"></i>   Brasil 2950, Valparaíso, Región de Valparaíso
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="row">           
                                <div class ="col">
                                    <h4>Siguenos</h4>
                                    <p>
                                        <i class="fab fa-instagram"></i>    #PeluqueriaCanina
                                        <br>
                                         <i class="fab fa-facebook"></i>    PeluqueriaCanina
                                        </p> 
                                </div>
                            </div>
                            
                           <div class="row justify-content-end">    
                                @auth
                                    @if(Auth::user()->isAdmin())
                                    {{-- Botón Editar --}}
                                        <div class="col-md-2">
                                            <a href="" class="botonModal" data-form="{{route('editarContactoModal',['id'=>$contacto->id])}}" data-toggle="modal" data-target="#modal-contacto">
                                            <span><i class="fas fa-edit iconoGaleria" ></i></span></a>
                                        </div>
                                    @endif
                                @endauth  
                            </div>
                        </div>

                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection