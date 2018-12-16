@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="card-title"><span><h2 class="text-capitalize"><a href="{{route('catalogo')}}">Catalogo</a> {{$producto->nombre}}</h2></span></div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <img class="img-fluid" src="{{Storage::url($producto->imagen)}}" alt="imagen producto">
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">{{$producto->nombre}}</h2>
                            <p class="text-justify">{{$producto->descripcion}}</p>
                            <p style="margin-left:50px">$ {{$producto->precio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection