<div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Eliminar Evento</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        
            <div class="modal-body">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-12">

                        {{-- Fecha --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="fecha" class="col-form-label text-md-right">{{ __('Fecha') }}</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{$evento->fecha}}</p>
                            </div>
                        </div>
                        {{-- Titulo --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="titulo" class="col-form-label text-md-right">{{ __('Titulo') }}</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{$evento->titulo}}</p>
                            </div>
                        </div>
                        {{-- Dirección --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="direccion" class="col-form-label text-md-right">{{ __('Dirección') }}</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{$evento->direccion}}</p>
                            </div>
                        </div>
                        {{-- Descripción --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{$evento->descripcion}}</p>
                            </div>
                        </div>
                        {{-- Imagen --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                            </div>
                            <div class="col-md-9">
                                <img class="img-fluid" src="{{Storage::url($evento->imagen)}}" alt="imagen">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form class="eliminar-evento-form" action="{{route('eliminarEvento',['id'=>$evento->id])}}" method="post">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
            </div>
        
    </div>
</div>