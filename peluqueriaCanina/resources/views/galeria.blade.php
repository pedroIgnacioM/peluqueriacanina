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

                                            <form method="POST" action="{{ route('galeria') }}" enctype="multipart/form-data">

                                                <label class="label">Tamaño</label>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="grande" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Grande</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="mediano" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Mediano</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Pequeño</label>
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
                                                                <input class="form-check-input" type="checkbox" value="rubio" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Rubio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row ">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="castaño" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="pelo_liso" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">Pelo Liso</label>
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