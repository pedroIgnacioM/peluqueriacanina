@extends('layouts.app')

@section('content')
<div class="container">
                <div class="card">
                    <div class="card-body">

                            <div class="card-title"><h1>Perfil Mascota</h1></div>
                            
                                            {{-- <div class="row ">
                                                <div class="col-md-4">
                                                        <div class="card">
                                                                <div class="card-body">                            

                                                                
                                                                    <img src="{{Storage::url($usuario->imagen)}}" alt="avatar" class="img-thumbnail" width="300">
                                                                    <p><a class="text" href="#">Editar</a> <a class="text" href="#" style="margin-left: 180px;">Subir Foto</a></p>
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
                                        
                                            </div> --}}
                                            <div class="row ">
                                                    <div class="col-md-12">
                                                            <div class="card">
                                                                    <div class="card-body">                            
                                                                        
                                                                    </div>
                                                            </div>
                                                        
                                                    </div>
                                            </div>

                        </div>
                 </div>
</div>
@endsection
