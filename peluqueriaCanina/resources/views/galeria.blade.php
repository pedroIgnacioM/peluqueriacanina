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
                                                                <input class="form-check-input" type="checkbox" value="grande" id="chechgrande">
                                                                <label class="form-check-label" for="defaultCheck1">Grande'</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="mediano" id="checkMediano">
                                                                <label class="form-check-label" for="defaultCheck1">Mediano</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="pequeño" id="checkPequeño">
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
                                                                <input class="form-check-input" type="checkbox" value="rubio" id="checkRubio">
                                                                <label class="form-check-label" for="defaultCheck1">Rubio</label>
                                                            </div>
                                                        </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="castaño" id="checkCastaño">
                                                                <label class="form-check-label" for="defaultCheck1">Castaño</label>
                                                            </div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="pelo_liso" id="checkPeloLiso">
                                                                <label class="form-check-label" for="defaultCheck1">Pelo Liso</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row justify-content-center">  
                                                    <div class="col-sm-8">
                                                        <button type="submit" id='buscar'class="btn btn-primary">{{ __('Buscar') }}</button>
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
                                <?php
                                if(!isset($_POST["buscar"])){

                                    if (!isset($_POST['checkgrande'])) {
                                        $arrays[] = $_POST['checkgrande'];
                                    }
                                    if (!isset($_POST["checkMediano"])) {
                                        $arrays[] = $_POST["checkMediano"];
                                    }
                                    if (!isset($_POST["checkPequeño"])) {
                                        $arrays[] = $_POST["checkPequeño"];
                                    }
                                    if (!isset($_POST["checkRubio"])) {
                                        $arrays[] = $_POST["checkRubio"];
                                    }
                                    if (!isset($_POST["checkCastaño"])) {
                                        $arrays[] = $_POST["checkCastaño"];
                                    }
                                    if (!isset($_POST["checkPeloLiso"])) {
                                        $arrays[] = $_POST["checkPeloLiso"];
                                    }

                                    if($cortePelos->count()){
                                        foreach($cortePelos as $cortePelo){
                                            foreach($arrays as $array){
                                                if($array == $cortePelo->tamaño || $array == $cortePelo->tipoCabello){ ?>
                                                    <div class="col-sm-4 ">
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
                                                                <div class="col-md-3">
                                                                    <a href="/cortePelo/{{ $cortePelo->imagen}}" download="/cortePelo/{{ $cortePelo->imagen}}"><span style="font-size: 2em; color: grey;"><i class="fas fa-download"></i></span></a>                       
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href=""><span style="font-size: 2em; color: grey;"><i class="fas fa-comment"></i></span></a>
                                                                </div>   
                                                            </div>                                  
                                                        </div>
                                                    </div> <?php
                                                }
                                            } 
                                        }
                                    }
                                }else{
                                    if($cortePelos->count()){
                                        foreach($cortePelos as $cortePelo){ ?>
                                            <div class="col-sm-4 ">
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
                                                        <div class="col-md-3">
                                                            <a href="/cortePelo/{{ $cortePelo->imagen}}" download="/cortePelo/{{ $cortePelo->imagen}}"><span style="font-size: 2em; color: grey;"><i class="fas fa-download"></i></span></a>                       
                                                        </div>
                                                        <div class="col-md-3">
                                                             <a href=""><span style="font-size: 2em; color: grey;"><i class="fas fa-comment"></i></span></a>
                                                        </div>   
                                                    </div>                                                                    
                                                </div>
                                            </div> <?php
                                        }
                                    } 
                                }  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection