@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
        
            <div class="card">
                <div class="card-header"> <h3>  ¿Quienes Somos?    </h3> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class=row>
                        <div class="col-md-9">
                            <div class=row>
                                <div class="col-sm-9">
                                    <h5>¿Como inicio el negocio?</h5>
                                    <p>
                                        Brillante resplandor hay aquí
                                        cuando vas corriendo por la ciudad
                                        para descansar después de un gran día de práctica
                                        y no sé por que razón, no lo sé
                                        yo siento esta atracción por ti
                                        nuestras miradas se cruzaron sin control.

                                        No te irás nunca ya, te amaré
                                        loco estoy por tu amor, gritaré
                                        el mundo sabrá que viviré loco por ti...
                                        Romper esta barrera sin dudarlo me separa de tu amor,
                                        que todos sepan que me gustas
                                        mañana el sol brillará.
                                        A todos demostremos que no
                                        hay nada que pudiera separarnos de
                                        sólo pienso en ti, lo gritare y
                                        por ti estoy loco de amor... 
                                    </p>    
                                </div>
                            </div>
                            
                            <div class=row>
                                <div class="col-sm-9">
                                    <h5>Sobre mi</h5>
                                    <p>
                                        Tu sonrisa tan resplandeciente
                                        A mi corazón deja encantado
                                        Ven toma mi mano para huir de esta terrible oscuridad

                                        En el instante en que te volví a encontrar
                                        Mi mente trajo a mí aquel hermoso lugar
                                        Que cuando era niño fue tan valioso para mí
                                        Quiero saber si acaso tú conmigo quieres bailar
                                        Si me das tu mano te llevaré

                                        Por un camino cubierto de luz y oscuridad
                                        Tal vez sigues pensando en él
                                        No puedo yo saberlo pero sé y entiendo
                                        Que amor necesitas tú
                                        Y el valor para pelear en mi lo hallarás

                                        Mi corazón encantado vibra
                                        Por el polvo de esperanza y magia
                                        Del universo que ambicionan todos poseer
                                        Voy amarte para toda la vida
                                        No me importa si aun no te intereso
                                        Ven toma mi mano para huir de esta infinita oscuridad
                                    </p>   
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <h5>Imagen</h5>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection