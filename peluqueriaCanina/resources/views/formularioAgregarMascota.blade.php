@extends('layouts.app')

@section('content')


    <div class="container card">
    <br>
    <div class="card-title"><h1>Registro Mascota</h1></div>
    
    <form action="{{route('insertarMascota')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
                <label for="nombre" class="col-md-2 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-5">
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
            </div>
        </div>

        <div class="form-group row">
                <label for="raza" class="col-md-2 col-form-label text-md-right">{{ __('Raza') }}</label>

            <div class="col-md-5">
                    <input id="raza" type="text" class="form-control" name="raza" value="{{ old('raza') }}" required>
                </div>
        </div>

        <div class="form-group row">
                <label for="edad" class="col-md-2 col-form-label text-md-right">{{ __('Edad') }}</label>

            <div class="col-md-5">
                    <input id="edad" type="text" class="form-control" name="edadMascota" value="{{ old('edad') }}" required>
                </div>
        </div>
        <div class="form-group row">
                <label for="sexoMascota" class="col-md-2 col-form-label text-md-right">{{ __('Sexo') }}</label>
            <div class="col-md-5">
                <select id="sexoMascota" name="sexoMascota" class="custom-select">

                        <option selected value="">Selecciona...</option>
                        <option>Hembra</option>
                        <option>Macho</option>
                </select>   
            </div>
        </div>
        <div class="form-group row">
                <label for="color" class="col-md-2 col-form-label text-md-right">{{ __('Color') }}</label>

            <div class="col-md-5">
                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="imagenMascota" class="col-md-2 col-form-label text-md-right">{{ __('Imagen') }}</label>
            <div class="col-md-5">
                    <input id="imagenMascota" type="file" class="form-control" name="imagenMascota">

            </div>
        </div>
        <div class="row justify-content-end ">
            <div class="col-md-6">
                    <a href="{{route('perfil',['Usuario'])}} " class="btn btn-secondary btn-lg">Cancelar</a>
            </div>
            <div class="col-md-6">

                <input class="btn btn-primary btn-lg" type="submit" value="Agregar">
            </div>
        </div>
        </form>
        
        
</div>

@endsection