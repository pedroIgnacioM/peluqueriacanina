@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-2">

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
                                                                <label class="form-check-label" for="grande" >
                                                                <input class="form-check-input" type="checkbox" value="grande" name="grande" id="grande">
                                                                Grande</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="mediano">
                                                                <input class="form-check-input" type="checkbox" value="mediano" name="mediano" id="mediano">
                                                                Mediano</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pequeño">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" name="pequeño" id="pequeño">
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
                                                                <label class="form-check-label" for="rubio">
                                                                <input class="form-check-input" type="checkbox" value="rubio" name="rubio" id="rubio">
                                                                Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row ">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="castaño">
                                                                <input class="form-check-input" type="checkbox" value="castaño" name="castaño" id="castaño">
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

                        <div class="col-10">
                            <div class="row justify-content-center">
                                @if($cortePelos->count())
                                    @foreach($cortePelos as $cortePelo)
                                    <figure class="col-4 img-fluid">

                                        <a href="#">
                                            <img class="img-fluid d-block img-thumbnail" src="{{Storage::url($cortePelo->imagen)}}" alt="{{$cortePelo->descripcion}}"/>
                                            {{-- <p>{{$cortePelo->descripcion}}</p> --}}
                                        </a> 
                                        
                                        <div class="row justify-content-around">
                                                <div class="col-2">

                                                    <a href="{{Storage::url($cortePelo->imagen)}}" download="{{Storage::url($cortePelo->imagen)}}"><span style="font-size: 2em; color: grey;">
                                                        <i class="fas fa-download"></i>
                                                    </span></a>                       
                                                </div>
                                                <div class="col-2">

                                                    <a href="#"><span style="font-size: 2em; color: grey;">
                                                            <i class="fas fa-file"></i>
                                                        </span></a>
                                                </div>
                                                <div class="col-2">

                                                    <a href="#"><span style="font-size: 2em; color: grey;">
                                                        <i class="fas fa-comment "></i>
                                                    </span></a>
                                                </div>
                                            
                                            </div>

                                    </figure>
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