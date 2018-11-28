@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#agregarCortePelo">+</button>
                            </div> 
                        </div>
                        <div class="col-md-10">

                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-2">

                            <div class="row justify-content-center">
                                <div class="col-sm-9">
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
                                                                <input class="form-check-input" type="checkbox" value="pelo_liso" name="cabello" id="negro">
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
                                                        <a class="thumbnail fancybox" rel="ligthbox" href="{{Storage::url($cortePelo->imagen)}}">
                                                            <img class="img-responsive" alt="{{$cortePelo->imagen}}" src="{{Storage::url($cortePelo->imagen)}}"/>
                                                            <p>{{$cortePelo->descripcion}}</p>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <div class="panel-footer"> 
                                                    <div class="row ">  
                                                        <div class="col-md-2">
                                                            <a src="{{Storage::url($cortePelo->imagen)}}" download="{{Storage::url($cortePelo->imagen)}}"><span style="font-size: 2em; color: grey;">
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
                                                                        <a href="#" data-toggle="modal" data-target="#create">
                                                                            <span style="font-size: 2em; color: grey;"><i class="fas fa-edit"></i></span>
                                                                        </a>
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
{{-- Modal del boton (+) --}}
<div class="modal fade" id="agregarCortePelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agregar Corte de pelo</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span> <i class="fas fa-times"></i></span>
                    </button> 
                </div>
                <form action="{{route('agregarCorte')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12">
                                {{-- Tipo --}}
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="tipo" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                            <option value="" selected disabled>Seleccionar</option>
                                            <optgroup label="Tipos de servicios">
                                            <option value="solo corte">Solo corte</option>
                                            <option value="baño y corte">Baño + Corte</option>
                                            <option value="solo baño">Solo baño</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Tamaño --}}
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="tamano" class="col-form-label text-md-right">{{ __('Tamaño') }}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="tamano" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tamano" required autofocus>
                                            <option value="" selected disabled>Seleccionar</option>
                                            <optgroup label="Tamaños de Perros">
                                            <option value="pequeño">Pequeño</option>
                                            <option value="mediano">Mediano</option>
                                            <option value="grande">Grande</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Tipo Cabello --}}
                                <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="cabello" class="col-form-label text-md-right">{{ __('Cabello') }}</label>
                                        </div>
                                        <div class="col-md-5">
                                            <select id="cabello" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="cabello" required autofocus>>
                                                <option value="" selected disabled>Seleccionar</option>
                                                <optgroup label="Tipos de Cabellos">
                                                <option value="1">Rubio</option>
                                                <option value="2">Castaño</option>
                                                <option value="3">Pelo liso</option>
                                            </select>
                                        </div>
                                </div>
                                {{-- Descripción --}}
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus></textarea>
                                    </div>
                                </div>
                                {{-- Imagen --}}
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="imagen" type="file" name="imagen">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- Modal Modificar Corte de pelo --}}
<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modificar Corte de Pelo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            <form method="POST" action="{{ action('CortePeloController@update', $cortePelo->id)}}"  role="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-12">
                            {{-- Tipo --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="tipo" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                        <optgroup label="Tipos de servicios">
                                        @if($cortePelo->tipo == 'solo corte')
                                            <option value="solo corte" selected>Solo corte</option>              
                                            <option value="baño y corte">Baño + Corte</option>
                                            <option value="solo baño">Solo baño</option>
                                        @elseif($cortePelo->tipo == 'baño y corte')     
                                            <option value="solo corte">Solo corte</option>              
                                            <option value="baño y corte"selected>Baño + Corte</option>
                                            <option value="solo baño">Solo baño</option>
                                        @elseif($cortePelo->tipo == 'solo baño')     
                                            <option value="solo corte">Solo corte</option>              
                                            <option value="baño y corte">Baño + Corte</option>
                                            <option value="solo baño" selected>Solo baño</option>
                                        @endif    
                                    </select>
                                </div>
                            </div>

                            {{-- Tamaño --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="tamano" class="col-form-label text-md-right">{{ __('Tamaño') }}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="tamano" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tamano" required autofocus>
                                            <optgroup label="Tamaños de Perros">
                                            @if($cortePelo->tamaño == 'grande')              
                                                <option value="pequeño">Pequeño</option>
                                                <option value="mediano">Mediano</option>
                                                <option value="grande" selected>Grande</option>
                                            @elseif($cortePelo->tamaño == 'mediano')     
                                                <option value="pequeño">Pequeño</option>
                                                <option value="mediano" selected>Mediano</option>
                                                <option value="grande">Grande</option>
                                            @elseif($cortePelo->tamaño == 'pequeno')     
                                                <option value="pequeño">Pequeño</option>
                                                <option value="mediano">Mediano</option>
                                                <option value="grande" selected>Grande</option>
                                            @endif    
                                        </select>
                                    </div>
                            </div>
                            {{-- Tipo Cabello --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="cabello" class="col-form-label text-md-right">{{ __('Cabello') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <select id="cabello" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="cabello" required autofocus>>
                                        <optgroup label="Tipos de Cabellos">
                                        @if($cortePelo->tipo_cabello_id == '1')              
                                            <option value="1" selected>Rubio</option>
                                            <option value="2">Castaño</option>
                                            <option value="3">Pelo liso</option>
                                        @elseif($cortePelo->tipo_cabello_id == '2')     
                                            <option value="1">Rubio</option>
                                            <option value="2" selected>Castaño</option>
                                            <option value="3">Pelo liso</option>
                                        @elseif($cortePelo->tipo_cabello_id == '3')
                                            <option value="1">Rubio</option>
                                            <option value="2">Castaño</option>
                                            <option value="3" selected>Pelo liso</option>
                                        @endif  
                                    </select>
                                </div>
                            </div>

                            {{-- Descripción --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus placeholder="descripcion">{{$cortePelo->descripcion}}</textarea>
                                    </div>
                            </div>

                            {{-- Imagen --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <input id="imagen" type="file" name="imagen" value="{{$cortePelo->imagen}}">
                                </div>
                            </div>    

                </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</div>





@endsection