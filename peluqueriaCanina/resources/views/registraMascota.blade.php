@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-body">
                        <div class="card-title"><h1>Registro Mascota</h1></div>
                    <form method="POST" action="{{ route('registraMascota') }}">
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
                                <label for="sexo" class="col-md-2 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-5">
                                <select id="sexo" name="sexo" class="custom-select">

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
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Aceptar') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Cancelar') }}
                                </button>
    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
