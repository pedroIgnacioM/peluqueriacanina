<div class="modal-dialog modal-dialog2">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Modificar Información</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <form class="nosotros-form" method="POST" action="{{ route('editarNosotros', ['id'=>$nosotros->id])}}" enctype="multipart/form-data"  role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-12">
                        
                        {{-- titulo1 --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="titulo1" class="col-form-label text-md-right">{{ __('titulo1') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="titulo1" class="form-control tipo ? ' is-invalid' : '' }}" name="titulo1" required autofocus placeholder="titulo1" value="{{$nosotros->titulo1}}">
                                </div>
                        </div>

                        {{-- Descripción --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="descripcion1" class="col-form-label text-md-right">{{ __('descripcion1') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="descripcion1" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion1" required autofocus placeholder="descripcion2">{{$nosotros->descripcion1}}</textarea>
                                </div>
                        </div>
                        {{-- titulo2 --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="titulo2" class="col-form-label text-md-right">{{ __('titulo2') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="titulo2" class="form-control tipo ? ' is-invalid' : '' }}" name="titulo2" required autofocus placeholder="titulo2" value="{{$nosotros->titulo2}}">
                                </div>
                        </div>

                        {{-- Descripción --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="descripcion2" class="col-form-label text-md-right">{{ __('descripcion2') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="descripcion2" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion2" required autofocus placeholder="descripcion2">{{$nosotros->descripcion2}}</textarea>
                                </div>
                        </div>


                        {{-- Imagen --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input id="imagen" type="file" name="imagen" value="{{$nosotros->imagen}}">
                            </div>
                        </div>    
            </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</div>