<div class="modal-dialog modal-dialog2">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modificar Corte de Pelo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            <form class="producto-form" method="POST" action="{{ route('editarProducto', ['id'=>$elemento->id])}}" enctype="multipart/form-data"  role="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-12">
                            
                            {{-- Nombre --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="nombre" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="nombre" class="form-control tipo ? ' is-invalid' : '' }}" name="nombre" required autofocus placeholder="nombre" value="{{$elemento->nombre}}">
                                    </div>
                            </div>

                            {{-- Descripción --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus placeholder="descripcion">{{$elemento->descripcion}}</textarea>
                                    </div>
                            </div>

                            {{-- Precio --}}
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="precio" class="col-form-label text-md-right">{{ __('Precio') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="precio" class="form-control tipo ? ' is-invalid' : '' }}" name="precio" required autofocus placeholder="precio" value="{{$elemento->precio}}">
                                    </div>
                            </div>

                            {{-- Imagen --}}
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <input id="imagen" type="file" name="imagen" value="{{$elemento->imagen}}">
                                </div>
                            </div>    
                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>