@extends('layouts.app')

@section('content')
<div class="container">
                <div class="card">
                    <div class="card-body">

                            <div class="card-title"><h1>Perfil Usuario</h1></div>
                            
                                            <div class="row ">
                                                <div class="col-md-4">
                                                        <div class="card">
                                                                <div class="card-body">                            
                                                                    <div class="card-title"><h1>Imangen Perfil Usuario</h1></div>

                                               
                                                                    </div>
                                                                </div>
                                                        </div>
                                                <div class="col-md-8">
                                                        <div class="card">
                                                                <div class="card-body">                            
                                                                    <div class="card-title"><h1>Datos Usuario</h1></div>

                                                                  
                                                                    {{ csrf_field() }}
                                                                    @foreach (array_combine($titulos, $nombresColumnas) as $titulo => $nombreColumna)
                                                                            <b >{{$titulo}}</b>:<a class="text">{{$usuario->$nombreColumna}}</a><br>
                                                                    
                                                                    @endforeach
                                                                    </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        
                                            </div>
                                            <div class="row ">
                                                    <div class="col-md-12">
                                                            <div class="card">
                                                                    <div class="card-body">                            
                                                                        <div class="card-title"><h1>Mascotas</h1></div>
    
                                                                        <table class="table">
                                                                                {{ csrf_field() }}
                                                                            <tr>
                                                                              <th>Nombre</th>
                                                                              <th>Sexo</th>
                                                                              <th>Edad</th>
                                                                              <th>Color</th>
                                                                            </tr>
                                                                            @foreach ($mascotas as $mascota)
                                                                            <tr>
                                                                            @foreach ($nombresColumnasMascotas as $nombreColumnaMascota)
                                                        
                                                                            <td>{{$mascota->$nombreColumnaMascota}}</td>
                                                                            @endforeach
                                                                            <td><a class="text" href="#">Ver Ficha</a></td>
                                                                             
                                                                            @endforeach
                                                                            </tr>
                                                                        </table>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        
                                                    </div>
                                            </div>

                        </div>
                 </div>
</div>
@endsection
