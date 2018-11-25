@extends('layouts.app')

@section('content')
<div class="container">
        <div class="justify-content-center">
                <div class="card">
                    <div class="card-body">
                            <div class="card-title"><h1>Perfil Usuario</h1></div>

        <table class="table table-hover">
            {{ csrf_field() }}
                @foreach (array_combine($titulos, $nombresColumnas) as $titulo => $nombreColumna)
                        <a class="text">{{$titulo}}:{{$usuario->$nombreColumna}}</a><br>
                
                @endforeach

       
            </div>

            </div>

        </div>
    </div>

@endsection
