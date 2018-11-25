@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <a class="btn btn-info" href={{route('registraMascota')}}>Agregar Nueva Mascota</a>
                <a class="btn btn-info" href={{route('perfil',['Usuario'])}}>Perfil usuario</a>

            </div>
        </div>
    </div>
</div>
@endsection
