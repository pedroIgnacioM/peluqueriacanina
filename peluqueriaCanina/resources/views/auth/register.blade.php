@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-body">
                        <div class="card-title"><h1>Registro Usuario</h1></div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nombres" class="col-md-2 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-5">
                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}" required autofocus>

                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-2 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-5">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required>

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telefono" class="col-md-2 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-5">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                                
                            <label for="correo" class="col-md-2 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-5">
                                <input id="correo" type="text" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" value="{{old('correo') }}" required>

                                @if ($errors->has('correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="imagen" class="col-md-2 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                <div class="col-md-5">
                                        <input id="imagen" type="file" class="form-control" name="imagen">
                                </div>
                            </div>
                        <h1>Registro Mascota</h1>

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
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Aceptar') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Cancelar') }}
                                </button>
                                {{-- <button type="submit" href="{{ route('registraMascota') }}"class="btn btn-primary">
                                        {{ __('Agregar Nueva Mascota') }}
                                </button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
