@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-body">
                        <div class="card-title"><h1>Registro Usuario</h1></div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nickname" class="col-md-2 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-5">
                                <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}" required>

                                @if ($errors->has('nickname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rut" class="col-md-2 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-5">
                                <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required>
                                @if ($errors->has('rut'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
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
                                <label for="ciudad" class="col-md-2 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-2">
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" required>
                            </div>

                            <label for="direccion" class="col-md-1 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-2">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                                <label for="edad" class="col-md-2 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-5">
                                    <input id="edad" type="text" class="form-control" name="edad" value="{{ old('edad') }}" required>
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="sexo" class="col-md-2 col-form-label text-md-right">{{ __('Sexo') }}</label>
                                <div class="col-md-5">
                                    <select id="sexo" name="sexo" class="custom-select">

                                            <option selected value="">Selecciona...</option>
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                            {{-- porque #inclusion XD--}}
                                            <option>Otro</option>     
                                    </select>
                                </div>                              
                        </div>

                        <div class="form-group row">
                                
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                {{-- <button type="submit" href={{ route('registraMascota') }}class="btn btn-primary">
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
