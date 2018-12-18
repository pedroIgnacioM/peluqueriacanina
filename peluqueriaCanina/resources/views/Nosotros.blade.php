@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <div class="card-title text-capitalize"><h1>¿Quienes Somos?</h1></div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif  
                                <div class="row">
                                    <div class="col-md-7">
                                        <div><h5>{{$nosotros->titulo1}}</h5></div>
                                        <p>{{$nosotros->descripcion1}}</p>
                                        <p>holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-8">
                                        <div><h5>{{$nosotros->titulo2}}</h5></div>
                                        <p>{{$nosotros->descripcion1}}</p>
                                    </div>
                                </div>
    
                            </div>
                            <div class="col-md-6">
                                <div class="container-fluid">
                                    <img class="img-thumbnail" src="{{Storage::url($nosotros->imagen)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection