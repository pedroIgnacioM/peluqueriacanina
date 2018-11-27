@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-md-2">

                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>Perros</option>
                                    </select>
                                </div> 
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header text-center">Filtro</div>
                                        <div class="card-body">

                                            <form action="{{ route('galeriaFiltro') }}" method="POST" >
                                                @csrf
                                                <label class="label">Tamaño</label>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="tamano" >
                                                                <input class="form-check-input" type="checkbox" value="grande" name="tamano">
                                                                Grande</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="mediano">
                                                                <input class="form-check-input" type="checkbox" value="mediano" name="tamano">
                                                                Mediano</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pequeño">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" name="tamano">
                                                                Pequeño</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                                 <label class="label">Cabello</label>
                                                 <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                         <div class="row  ">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                <input class="form-check-input" type="checkbox" value="rubio" name="cabello">
                                                                Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="cabello">
                                                                <input class="form-check-input" type="checkbox" value="castaño" name="cabello">
                                                                Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pelo_liso">
                                                                <input class="form-check-input" type="checkbox" value="pelo_liso" name="pelo_liso" id="pelo_liso">
                                                                Pelo Liso</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-10">
                            <div class="row ">
                                @if($cortePelos->count())
                                    @foreach($cortePelos as $cortePelo)
                                        <div class="col-sm-4 ">
                                            <div class="container-fluid ">  
                                                <div class="img-container">
                                                    <div class="panel-body" >
                                                        <a class="thumbnail fancybox" rel="ligthbox" href="/cortePelo/{{ $cortePelo->imagen}}">
                                                            <img class="img-responsive" alt="" src="/cortePelo/{{ $cortePelo->imagen }}"/>
                                                            <p>{{$cortePelo->descripcion}}</p>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <div class="panel-footer"> 
                                                    <div class="row ">  
                                                        <div class="col-md-2">
                                                            <a href="/cortePelo/{{ $cortePelo->imagen}}" download="/cortePelo/{{ $cortePelo->imagen}}"><span style="font-size: 2em; color: grey;">
                                                                <i class="fas fa-download"></i>
                                                            </span></a>                       
                                                        </div>
                                                        @auth
                                                            @if(Auth::user()->isDefault() || Auth::user()->isAdmin() )
                                                                <div class="col-md-2">
                                                                    <a href=""><span style="font-size: 2em; color: grey;">
                                                                        <i class="fas fa-comment"></i>
                                                                    </span></a>
                                                                </div>
                                                            @endif 
                                                            @if(Auth::user()->isAdmin())
                                                                <div class="col-md-2">
                                                                    <form action="{{ action('CortePeloController@destroy', $cortePelo->id)}}" method="POST">
                                                                        <input type="hidden" name="_method" value="delete">
                                                                        {!! csrf_field() !!}
                                                                        <a href=""><span style="font-size: 2em; color: grey;">
                                                                           <i class="fas fa-trash"></i>
                                                                        </span></a>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <form action="{{ action('CortePeloController@edit', $cortePelo->id)}}" method="POST">
                                                                        <input type="hidden" name="_method" value="delete">
                                                                        {!! csrf_field() !!}
                                                                        <a href=""><span style="font-size: 2em; color: grey;">
                                                                           <i class="fas fa-trash"></i>
                                                                        </span></a>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        @endauth  
                                                    </div>                                  
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif  
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection