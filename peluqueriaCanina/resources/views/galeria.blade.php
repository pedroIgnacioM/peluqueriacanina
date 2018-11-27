@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-sm-2">

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

                        <div class="col-sm-10">
                            <div class='row galeria'>
                                @if($cortePelos->count())
                                    @foreach($cortePelos as $cortePelo)
                                        <div class="col-sm-4 ">
                                            <div class="container-fluid ">  
                                                <div class="img-container">
                                                    <div class="panel-body justify-content-center imagen">
                                                        <a class="thumbnail fancybox" rel="ligthbox" href="/cortePelo/{{ $cortePelo->imagen}}">
                                                            <img class="img-responsive" alt="" src="/cortePelo/{{ $cortePelo->imagen }}" width="300" />
                                                            <p>{{$cortePelo->descripcion}}</p>
                                                        </a> 
                                                    </div>
                                                 </div>
                                                <div class="panel-footer"> 
                                                    <div class="row justify-content-center">  
                                                        <div class="col-md-4">
                                                            <a href="/cortePelo/{{ $cortePelo->imagen}}" download="/cortePelo/{{ $cortePelo->imagen}}"><span style="font-size: 2em; color: grey;">
                                                                <i class="fas fa-download"></i>
                                                            </span></a>                       
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href=""><span style="font-size: 2em; color: grey;">
                                                                <i class="fas fa-comment"></i>
                                                            </span></a>
                                                        </div>   
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