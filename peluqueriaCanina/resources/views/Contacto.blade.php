@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Donde Encontrarnos </div>

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
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43299.552928706384!2d-71.60174238205062!3d-33.04053567425118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2fc6c888d7a2a712!2sPontificia+Universidad+Cat%C3%B3lica+de+Valpara%C3%ADso!5e0!3m2!1ses!2scl!4v1543087680929">Ampliar Mapa</a>
                        </div>

                        <div class ="col">
                            <h4>Contacto</h4>
                                <p>
                                   <i class="fab fa-whatsapp"></i> numero +5691234567
                                </p>
                                    
                            <div class="row">
                                <div class ="col">
                                    <h5>Encuentranos En:</h5>
                                    <p>
                                        <i class="fas fa-directions"></i>   Tu Poto, en la esquina
                                    </p>
                                </div>
                            </div>

                            <div class="row">           
                                <div class ="col">
                                    <h4>Siguenos</h4>
                                    <p>
                                        <i class="fab fa-instagram"></i>    #PeluqueriaCanina
                                        <br>
                                         <i class="fab fa-facebook"></i> PeluqueriaCanina
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
</div>
@endsection