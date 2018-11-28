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
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header text-center">Filtro</div>
                                        <div class="card-body">
                                                @csrf
                                                <label class="label">Orden</label>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="Por_precio" >
                                                                <input class="form-check-input" type="checkbox" value="Por_precio" name="Por_precio">
                                                                Por precio</label>
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="Orden_Alfabetico">
                                                                <input class="form-check-input" type="checkbox" value="Orden_Alfabetico" name="Orden_Alfabetico">
                                                                Orden Alfabetico</label>
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
                           @foreach($productos as $producto)
                           <div class="col-sm-4 ">
                                <div class="container-fluid ">  
                                    <div class="panel-body" >
                                        <div class="col-md-4">
                                            <div class="row">
                                                <img class="img-responsive" alt="" src="/productos/{{ $producto->imagen }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer"> 
                                        <div class="row justify-content-center">
                                            <div class="">
                                                <label class="label">{{$producto->nombre}}</label>
                                            </div>  
                                        </div> 
                                        <div class="row justify-content-center">
                                            <div class="col-sm-12">
                                                <p>{{$producto->descripcion}}</p>   
                                            </div>
                                        </div>
                                            <div class="row justify-content-center">
                                                <label class="label">${{$producto->precio}}</label>
                                            </div>                    
                                    </div>
                                </div>
                            </div>
                           @endforeach       
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection